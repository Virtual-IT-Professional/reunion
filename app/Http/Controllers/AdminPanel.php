<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentRegister;
use App\Mail\RegisterVerify;
use App\Mail\inviteSent;
use App\Models\geustRegister;
use Middleware;
use Mail;
use File;
use Hash;
use App\Models\TeamMember;
use App\Models\SiteSetting;
use App\Models\ClientLogo;
use Illuminate\Support\Facades\Cache;

class AdminPanel extends Controller
{
    public function home(){
        return view('admin.home');
    }

    public function ticket(){
        return view('admin.ticket');
    }

    public function pendingList(){
        $pendingList = studentRegister::where(['status'=>'PendingVerify'])->orderBy('id','DESC')->get();
        return view('admin.pendingList',['pendingList'=>$pendingList]);
    }

    public function viewPerticipate($id){
        $student = studentRegister::find($id);
        return view('admin.viewPerticipate',['student'=>$student]);
    }

    public function verifiedList(){
        $verifiedList = studentRegister::where(['status'=>'Verified'])->orderBy('id','DESC')->get();
        return view('admin.verifiedList',['verifiedList'=>$verifiedList]);
    }

    public function rejectedList(){
        $rejectedList = studentRegister::where(['status'=>'Rejected'])->orderBy('id','DESC')->get();
        return view('admin.rejectedList',['rejectedList'=>$rejectedList]);
    }

    public function acceptRegister($id){
        $student = studentRegister::find($id);
        if(!empty($student)):
            $student->status = 'Verified';
            if($student->save()):
                $updateGuest = geustRegister::where(['linkStudent'=>$id])->update(['status' => 'Verified']);
                $email = $student->emailAddress;
         
                $body = [
                    'name'=>$student->studentName,
                    'logo'=>asset('public/admin/velzon/html/default/assets/images/logo.png'),
                    'url_a'=>'https://www.cpireunion.com/',
                ];
         
                Mail::to($email)->send(new RegisterVerify($body));
                return back()->with('success','Data updated successfully');
            else:
                return back()->with('error','There was an error. Please try later');
            endif;
        else:
            return back()->with('error','Sorry! no data found with your query');
        endif;
    }

    public function inviteSent(){
        $student = studentRegister::where(['status'=>'Verified'])->get();
        if(!empty($student)):
            
            // Dispatch job to send emails
            ini_set('max_execution_time', 45000);
            $email = [];

            foreach ($student as $std):
                $email = $std->emailAddress;
         
                $body = [
                    'name'=>$std->studentName,
                    'id'=>$std->id,
                    'department'=>$std->department,
                    'shift'=>$std->shift,
                    'logo'=>asset('public/admin/velzon/html/default/assets/images/logo.png'),
                    'url_a'=>'https://www.cpireunion.com/',
                ];
                // $mail = explode(', ',$email);
                Mail::to($email)->send(new inviteSent($body));
            endforeach;
            return back()->with('success','Success! mail sending successfully');
        else:
            return back()->with('error','Sorry! no data found with your query');
        endif;
    }

    public function rejectRegister($id){
        $student = studentRegister::find($id);
        if(!empty($student)):
            $student->status = 'Rejected';
            if($student->save()):
                return back()->with('success','Data updated successfully');
            else:
                return back()->with('error','There was an error. Please try later');
            endif;
        else:
            return back()->with('error','Sorry! no data found with your query');
        endif;
    }    

    public function returnPending($id){
        $student = studentRegister::find($id);
        if(!empty($student)):
            $student->status = 'PendingVerify';
            if($student->save()):
                return back()->with('success','Data updated successfully');
            else:
                return back()->with('error','There was an error. Please try later');
            endif;
        else:
            return back()->with('error','Sorry! no data found with your query');
        endif;
    }    

    public function delAvatar($id){
        $student = studentRegister::find($id);
        if(!empty($student)):
            $avatar = public_path('upload/student/').'/'.$student->avatar;
            if (File::exists($avatar)) {
                File::delete($avatar);
            }
            $student->avatar = '';
            if($student->save()):
                return back()->with('success','Avatar deleted successfully');
            else:
                return back()->with('error','There was an error. Please try later');
            endif;
        else:
            return back()->with('error','Sorry! no data found with your query');
        endif;
    }    

    public function editPerticipate($id){
        $student = studentRegister::find($id);
        return view('admin.editPerticipate',['student'=>$student]);
    }

    public function editGuest($id){
        $student = studentRegister::find($id);
        return view('admin.editGuest',['student'=>$student]);
    }

    public function updatePerticipate(Request $requ){
        $student = studentRegister::find($requ->perticipateId);
        if(empty($student)):
            return back()->with('error','Sorry! No data found with your query');
        endif;

        $student->studentName           = $requ->fullName;
        $student->department            = $requ->dept;
        $student->shift                 = $requ->shift;
        $student->phone                 = $requ->phoneNumber;
        $student->emailAddress          = $requ->email;
        $student->tShirtSize            = $requ->tShirtSize;
        $student->blGroup               = $requ->blGroup;
        $student->currentAddress        = $requ->currentAddress;
        $student->professionDetails     = $requ->professionalDetails;
        $student->experience            = $requ->experience;
        $student->paymentBy             = $requ->payType;
        $student->paymentId             = $requ->payId;
        $student->gender                = $requ->gender;
        $student->paymentAmount         = $requ->payAmount;
        $student->status                = $requ->status;
        
        if($student->save()):
            return back()->with('success','Details updated successfully');
        else:
            return back()->with('error','Sorry! There was an error. Please try later');
        endif;
    }

    public function updateGuest(Request $requ){
        $student = studentRegister::find($requ->perticipateId);
        if(empty($student)):
            return back()->with('error','Sorry! No data found with your query');
        endif;

        if($requ->totalMember>0):
            $guestList = geustRegister::where(['linkStudent'=>$requ->perticipateId])->delete();
            $guestlength = count($requ->guestName);
            for ($i = 0; $i < $guestlength; $i++) {
                $guest = new geustRegister();
                $guest->guestName       = $requ->guestName[$i];
                $guest->guestRelation   = $requ->guestRelation[$i];
                $guest->linkStudent     = $student->id;
                $guest->status          = "Verified";
                if(!empty($requ->guestAge[$i])):
                    $guest->guestAge = $requ->guestAge[$i];
                endif;
                $guest->save();
            }
        endif;
        $student->totalAttend           = $requ->totalMember;
        $student->paymentBy             = $requ->payType;
        $student->paymentId             = $requ->payId;
        $student->paymentAmount         = $requ->payAmount;
        if($student->save()):
            return back()->with('success','Details updated successfully');
        else:
            return back()->with('error','Sorry! There was an error. Please try later');
        endif;
    }

    public function updateAvatar(Request $requ){
        $student = studentRegister::find($requ->perticipateId);
        if(empty($student)):
            return back()->with('error','Sorry! No data found');
        endif;
        request()->validate([
            'file' => 'mimes:jpeg,png,jpg,gif,svg|max:300',
        ]);
        if(!empty($requ->avatar)):
            $imageName = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('upload/student'), $imageName);
            $student->avatar = $imageName;
        endif;
        if($student->save()):
            return back()->with('success','Success! Avatar updated successfully');
        else:
            return back()->with('error','Sorry! There was an error. Please try later');
        endif;
    }

    /* ===================== Admin Profile Section ===================== */
    private function currentAdminId(){
        if(Session()->has('superAdmin')){ return Session()->get('superAdmin'); }
        if(Session()->has('modarator')){ return Session()->get('modarator'); }
        return null;
    }

    private function currentAdmin(){
        $id = $this->currentAdminId();
        return $id ? \App\Models\adminPanel::find($id) : null;
    }

    public function profile(){
        $admin = $this->currentAdmin();
        if(!$admin){
            return redirect(route('adminLogin'))->with('error','Session expired');
        }
        return view('admin.profile',[ 'admin' => $admin ]);
    }

    public function updateProfile(Request $requ){
        $admin = $this->currentAdmin();
        if(!$admin){
            return redirect(route('adminLogin'))->with('error','Session expired');
        }
        $requ->validate([
            'adminName'     => 'required|string|min:3',
            'department'    => 'nullable|string',
            'shift'         => 'nullable|string',
            'phone'         => 'nullable|string|max:30',
            'batchSession'  => 'nullable|string|max:30',
        ]);
        $admin->adminName     = $requ->adminName;
        $admin->department    = $requ->department;
        $admin->shift         = $requ->shift;
        $admin->phone         = $requ->phone;
        $admin->batchSession  = $requ->batchSession;
        if($admin->save()){
            return back()->with('success','Profile updated successfully');
        }
        return back()->with('error','Update failed');
    }

    public function updatePassword(Request $requ){
        $admin = $this->currentAdmin();
        if(!$admin){
            return redirect(route('adminLogin'))->with('error','Session expired');
        }
        $requ->validate([
            'current_password'  => 'required',
            'new_password'      => 'required|min:6|different:current_password',
            'confirm_password'  => 'required|same:new_password',
        ]);
        if(!Hash::check($requ->current_password,$admin->password)){
            return back()->with('error','Current password is incorrect');
        }
        $admin->password = Hash::make($requ->new_password);
        if($admin->save()){
            return back()->with('success','Password changed successfully');
        }
        return back()->with('error','Password update failed');
    }

    public function updateAdminAvatar(Request $requ){
        $admin = $this->currentAdmin();
        if(!$admin){
            return redirect(route('adminLogin'))->with('error','Session expired');
        }
        $requ->validate([
            'avatar' => 'required|mimes:jpeg,png,jpg,gif,svg|max:300',
        ]);
        if($requ->hasFile('avatar')){
            // Delete old avatar if exists
            if(!empty($admin->avatar)){
                $old = public_path('upload/admin').'/'.$admin->avatar;
                if(File::exists($old)){
                    File::delete($old);
                }
            }
            $imageName = time().'.'.$requ->file('avatar')->getClientOriginalExtension();
            $requ->file('avatar')->move(public_path('upload/admin'), $imageName);
            $admin->avatar = $imageName;
            if($admin->save()){
                return back()->with('success','Avatar updated successfully');
            }
            return back()->with('error','Failed to save avatar');
        }
        return back()->with('error','No file uploaded');
    }

    /* ===================== Team Management ===================== */
    public function team(){
        $members = TeamMember::orderBy('ordering','ASC')->get();
        return view('admin.team',[ 'members'=>$members ]);
    }

    public function teamStore(Request $requ){
        $requ->validate([
            'name' => 'required|string|min:2',
            'ordering' => 'nullable|integer',
            'avatar' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:500'
        ]);
        $tm = new TeamMember();
        $tm->name = $requ->name;
        $tm->role = $requ->role;
        $tm->department = $requ->department;
        $tm->facebook = $requ->facebook;
        $tm->twitter = $requ->twitter;
        $tm->google = $requ->google;
        $tm->instagram = $requ->instagram;
        $tm->ordering = $requ->ordering ?? 0;
        $tm->active = $requ->active ? true : false;
        if($requ->hasFile('avatar')){
            $imageName = time().'_team.'.$requ->file('avatar')->getClientOriginalExtension();
            $requ->file('avatar')->move(public_path('upload/team'), $imageName);
            $tm->avatar = $imageName;
        }
        if($tm->save()){
            return back()->with('success','Team member added');
        }
        return back()->with('error','Create failed');
    }

    public function teamUpdate(Request $requ){
        $requ->validate([
            'id' => 'required|exists:team_members,id',
            'name' => 'required|string|min:2',
            'avatar' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:500'
        ]);
        $tm = TeamMember::find($requ->id);
        $tm->name = $requ->name;
        $tm->role = $requ->role;
        $tm->department = $requ->department;
        $tm->facebook = $requ->facebook;
        $tm->twitter = $requ->twitter;
        $tm->google = $requ->google;
        $tm->instagram = $requ->instagram;
        $tm->ordering = $requ->ordering ?? 0;
        $tm->active = $requ->active ? true : false;
        if($requ->hasFile('avatar')){
            if(!empty($tm->avatar)){
                $old = public_path('upload/team').'/'.$tm->avatar;
                if(File::exists($old)) File::delete($old);
            }
            $imageName = time().'_team.'.$requ->file('avatar')->getClientOriginalExtension();
            $requ->file('avatar')->move(public_path('upload/team'), $imageName);
            $tm->avatar = $imageName;
        }
        if($tm->save()){
            return back()->with('success','Team member updated');
        }
        return back()->with('error','Update failed');
    }

    public function teamDelete($id){
        $tm = TeamMember::find($id);
        if(!$tm){ return back()->with('error','Not found'); }
        if(!empty($tm->avatar)){
            $old = public_path('upload/team').'/'.$tm->avatar;
            if(File::exists($old)) File::delete($old);
        }
        if($tm->delete()){
            return back()->with('success','Member deleted');
        }
        return back()->with('error','Delete failed');
    }

    /* ===================== Site Settings ===================== */
    public function settings(){
        $settings = SiteSetting::first();
        return view('admin.settings',[ 'settings' => $settings ]);
    }

    public function updateSettings(Request $requ){
        $settings = SiteSetting::first() ?: new SiteSetting();
        // Build validation rules with conditional dimensions (skip for SVG)
        $heroRule = ['nullable','image','mimes:png,jpg,jpeg,svg','max:2048'];
        if($requ->hasFile('hero_image') && strtolower($requ->file('hero_image')->getClientOriginalExtension()) !== 'svg'){
            $heroRule[] = 'dimensions:min_width=1200,min_height=600';
        }
        $parallaxRule = ['nullable','image','mimes:png,jpg,jpeg,svg','max:2048'];
        if($requ->hasFile('parallax_image') && strtolower($requ->file('parallax_image')->getClientOriginalExtension()) !== 'svg'){
            $parallaxRule[] = 'dimensions:min_width=1200,min_height=600';
        }

        $requ->validate([
            'site_name'     => 'nullable|string|max:150',
            'tagline'       => 'nullable|string|max:200',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string|max:50',
            'facebook'      => 'nullable|url',
            'twitter'       => 'nullable|url',
            'instagram'     => 'nullable|url',
            'youtube'       => 'nullable|url',
            'event_date'    => 'nullable|date',
            'logo'          => 'nullable|mimes:png,jpg,jpeg,svg|max:500',
            'favicon'       => 'nullable|mimes:png,ico,jpg,jpeg|max:200',
            'hero_image'    => $heroRule,
            'parallax_image'=> $parallaxRule,
            'parallax_video_url' => 'nullable|url',
            'about_title' => 'nullable|string|max:150',
            'about_subtitle' => 'nullable|string|max:200',
            'about_paragraph_1' => 'nullable|string',
            'about_paragraph_2' => 'nullable|string',
            'clients_enabled' => 'nullable|boolean',
        ]);

        $settings->site_name      = $requ->site_name;
        $settings->tagline        = $requ->tagline;
        $settings->contact_email  = $requ->contact_email;
        $settings->contact_phone  = $requ->contact_phone;
        $settings->address        = $requ->address;
        $settings->facebook       = $requ->facebook;
        $settings->twitter        = $requ->twitter;
        $settings->instagram      = $requ->instagram;
        $settings->youtube        = $requ->youtube;
        $settings->hero_title     = $requ->hero_title;
        $settings->hero_subtitle  = $requ->hero_subtitle;
        $settings->event_date     = $requ->event_date;
    $settings->registration_open = $requ->has('registration_open');
    $settings->venue          = $requ->venue;
    $settings->participate_fee= $requ->participate_fee;
    $settings->guest_fee      = $requ->guest_fee;
    $settings->bkash_number   = $requ->bkash_number;
    $settings->nagad_number   = $requ->nagad_number;
    $settings->payment_reference = $requ->payment_reference;
    $settings->emergency_phone= $requ->emergency_phone;
    $settings->parallax_video_url = $requ->parallax_video_url;
    $settings->about_title = $requ->about_title;
    $settings->about_subtitle = $requ->about_subtitle;
    // sanitize about paragraphs allowing basic formatting
    $allowed = '<b><strong><i><em><br><p><ul><ol><li><a>';
    $settings->about_paragraph_1 = strip_tags($requ->about_paragraph_1 ?? '', $allowed);
    $settings->about_paragraph_2 = strip_tags($requ->about_paragraph_2 ?? '', $allowed);
    $settings->clients_enabled = $requ->has('clients_enabled');

        // ensure upload dir
        $uploadPath = public_path('upload/site');
        if(!File::exists($uploadPath)){
            File::makeDirectory($uploadPath,0755,true);
        }

        // helpers for file replace
        $handleUpload = function($field) use ($requ, $settings, $uploadPath){
            if($requ->hasFile($field)){
                $old = $settings->$field ? $uploadPath.'/'.$settings->$field : null;
                if($old && File::exists($old)) File::delete($old);
                $name = $field.'_'.time().'.'.$requ->file($field)->getClientOriginalExtension();
                $requ->file($field)->move($uploadPath,$name);
                $settings->$field = $name;
            }
        };

        $handleUpload('logo');
        $handleUpload('favicon');
    $handleUpload('hero_image');
    $handleUpload('parallax_image');

        if($settings->save()){
            // clear cached settings
            Cache::forget('site_settings');
            return back()->with('success','Settings updated successfully');
        }
        return back()->with('error','Update failed');
    }

    /* ===================== Clients / Sponsors ===================== */
    public function clients()
    {
        $clients = ClientLogo::orderBy('ordering','ASC')->get();
        return view('admin.clients',[ 'clients' => $clients ]);
    }

    public function clientStore(Request $requ)
    {
        $requ->validate([
            'name' => 'required|string|min:2',
            'url' => 'nullable|url',
            'ordering' => 'nullable|integer',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|dimensions:min_width=200,min_height=100|max:1024',
        ]);

        $uploadPath = public_path('upload/clients');
        if(!\File::exists($uploadPath)){ \File::makeDirectory($uploadPath,0755,true); }

        $logo = new ClientLogo();
        $logo->name = $requ->name;
        $logo->url = $requ->url;
        $logo->ordering = $requ->ordering ?? 0;
        $logo->active = $requ->active ? true : false;
        if($requ->hasFile('image')){
            $name = 'client_'.time().'.'.$requ->file('image')->getClientOriginalExtension();
            $requ->file('image')->move($uploadPath,$name);
            $logo->image = $name;
        }
        if($logo->save()){
            return back()->with('success','Client added');
        }
        return back()->with('error','Create failed');
    }

    public function clientUpdate(Request $requ)
    {
        $requ->validate([
            'id' => 'required|exists:client_logos,id',
            'name' => 'required|string|min:2',
            'url' => 'nullable|url',
            'ordering' => 'nullable|integer',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|dimensions:min_width=200,min_height=100|max:1024',
        ]);
        $logo = ClientLogo::find($requ->id);
        $logo->name = $requ->name;
        $logo->url = $requ->url;
        $logo->ordering = $requ->ordering ?? 0;
        $logo->active = $requ->active ? true : false;
        $uploadPath = public_path('upload/clients');
        if(!\File::exists($uploadPath)){ \File::makeDirectory($uploadPath,0755,true); }
        if($requ->hasFile('image')){
            if(!empty($logo->image)){
                $old = $uploadPath.'/'.$logo->image;
                if(\File::exists($old)) \File::delete($old);
            }
            $name = 'client_'.time().'.'.$requ->file('image')->getClientOriginalExtension();
            $requ->file('image')->move($uploadPath,$name);
            $logo->image = $name;
        }
        if($logo->save()){
            return back()->with('success','Client updated');
        }
        return back()->with('error','Update failed');
    }

    public function clientDelete($id)
    {
        $logo = ClientLogo::find($id);
        if(!$logo){ return back()->with('error','Not found'); }
        $uploadPath = public_path('upload/clients');
        if(!empty($logo->image)){
            $old = $uploadPath.'/'.$logo->image;
            if(\File::exists($old)) \File::delete($old);
        }
        if($logo->delete()){
            return back()->with('success','Client deleted');
        }
        return back()->with('error','Delete failed');
    }

    public function clientToggle($id)
    {
        $logo = ClientLogo::find($id);
        if(!$logo){ return back()->with('error','Not found'); }
        $logo->active = !$logo->active;
        if($logo->save()){
            return back()->with('success','Status changed');
        }
        return back()->with('error','Operation failed');
    }

    /* ===================== Admin Create Student ===================== */
    public function createStudent(){
        return view('admin.createStudent');
    }

    public function storeStudent(Request $requ){
        // Prevent duplicates by phone/email if still pending
        $chk = studentRegister::where([
            'phone' => $requ->phone,
            'emailAddress' => $requ->mailAddress,
        ])->whereIn('status',[ 'PendingVerify','Verified' ])->first();
        if(!empty($chk)){
            return back()->with('error','A registration already exists for this phone/email');
        }

        $requ->validate([
            'stdName'       => 'required|string|min:3',
            'dept'          => 'required|string',
            'shift'         => 'required|string',
            'phone'         => 'required|string',
            'mailAddress'   => 'required|email',
            'gender'        => 'required|string',
            'blGroup'       => 'required|string',
            'tShirtSize'    => 'required|string',
            'currentAddress'=> 'required|string',
            'payAmount'     => 'nullable|numeric',
            'payType'       => 'nullable|string',
            'payId'         => 'nullable|string',
            'avatar'        => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:300',
        ]);

        $student = new studentRegister();
        $student->studentName           = $requ->stdName;
        $student->department            = $requ->dept;
        $student->shift                 = $requ->shift;
        $student->phone                 = $requ->phone;
        $student->emailAddress          = $requ->mailAddress;
        $student->tShirtSize            = $requ->tShirtSize;
        $student->blGroup               = $requ->blGroup;
        $student->totalAttend           = $requ->totalMember;
        $student->currentAddress        = $requ->currentAddress;
        $student->professionDetails     = $requ->professionDetails;
        $student->experience            = $requ->experience;
        $student->paymentBy             = $requ->payType;
        $student->paymentId             = $requ->payId;
        $student->gender                = $requ->gender;
        $student->paymentAmount         = $requ->payAmount;
        $student->status                = $requ->status ?? 'PendingVerify';

        if($requ->hasFile('avatar')){
            $imageName = time().'.'.$requ->file('avatar')->getClientOriginalExtension();
            $requ->file('avatar')->move(public_path('upload/student'), $imageName);
            $student->avatar = $imageName;
        }

        if($student->save()){
            if(($requ->totalMember ?? 0) > 0 && is_array($requ->guestName)){
                $guestlength = count($requ->guestName);
                for ($i = 0; $i < $guestlength; $i++) {
                    $guest = new geustRegister();
                    $guest->guestName = $requ->guestName[$i] ?? null;
                    $guest->guestRelation = $requ->guestRelation[$i] ?? null;
                    $guest->linkStudent = $student->id;
                    if(!empty($requ->guestAge[$i] ?? null)){
                        $guest->guestAge = $requ->guestAge[$i];
                    }
                    $guest->status = $student->status === 'Verified' ? 'Verified' : 'PendingVerify';
                    $guest->save();
                }
            }
            return redirect()->route('viewPerticipate',['id'=>$student->id])->with('success','Student created successfully');
        }
        return back()->with('error','Create failed');
    }

    /* ===================== ID Card Management ===================== */
    public function idCards(){
        $students = studentRegister::orderBy('id','DESC')->get();
        return view('admin.idcards',[ 'students' => $students ]);
    }

    private function generateCardNumber(studentRegister $student): string
    {
        $year = date('Y');
        return 'CPI-R-'.$year.'-'.str_pad($student->id,5,'0',STR_PAD_LEFT);
    }

    public function issueIdCard(Request $requ, $id){
        $student = studentRegister::find($id);
        if(!$student){ return back()->with('error','Student not found'); }
        $student->id_card_number = $requ->id_card_number ?: $this->generateCardNumber($student);
        $student->id_card_status = 'Issued';
        $student->id_card_issued_at = now();
        if($student->save()){
            return back()->with('success','ID Card issued');
        }
        return back()->with('error','Issue failed');
    }

    public function markIdCardPrinted($id){
        $student = studentRegister::find($id);
        if(!$student){ return back()->with('error','Student not found'); }
        $student->id_card_status = 'Printed';
        $student->id_card_printed_at = now();
        if($student->save()){
            return back()->with('success','Marked as printed');
        }
        return back()->with('error','Update failed');
    }

    public function printIdCard($id){
        $student = studentRegister::find($id);
        if(!$student){ return back()->with('error','Student not found'); }
        if(empty($student->id_card_number)){
            // Auto-issue a number for print convenience
            $student->id_card_number = $this->generateCardNumber($student);
            $student->id_card_status = 'Issued';
            $student->id_card_issued_at = now();
            $student->save();
        }
        return view('admin.idcard_print',[ 'student' => $student ]);
    }

    /* ===================== CSV Import ===================== */
    public function importForm(){
        return view('admin.importStudents');
    }

    public function importProcess(Request $requ){
        $requ->validate([
            'csv' => 'required|file|mimes:csv,txt|max:5120',
            'mode' => 'nullable|in:create,upsert',
            'default_status' => 'nullable|in:PendingVerify,Verified,Rejected',
            'guest_behavior' => 'nullable|in:ignore,replace,append'
        ]);
        $mode = $requ->mode ?? 'upsert';
        $defaultStatus = $requ->default_status ?? 'PendingVerify';
        $guestBehavior = $requ->guest_behavior ?? 'replace';
        $path = $requ->file('csv')->getRealPath();

        $handle = fopen($path,'r');
        if(!$handle){
            return back()->with('error','Unable to read the CSV file');
        }
        $created = 0; $updated = 0; $skipped = 0; $log = [];

        $header = fgetcsv($handle,0,',');
        if(!$header){ fclose($handle); return back()->with('error','CSV header missing'); }
        // Normalize headers
        $normalize = function($h){
            $h = preg_replace('/^\xEF\xBB\xBF/','',$h); // strip BOM
            return strtolower(trim($h));
        };
        $header = array_map($normalize,$header);

        // Map synonyms to model fields
        $mapKey = function($key){
            switch($key){
                case 'name': case 'studentname': return 'studentName';
                case 'dept': case 'department': return 'department';
                case 'shift': return 'shift';
                case 'phone': case 'mobile': return 'phone';
                case 'email': case 'emailaddress': return 'emailAddress';
                case 'gender': return 'gender';
                case 'blood': case 'bloodgroup': case 'blgroup': return 'blGroup';
                case 'tshirt': case 'tshirtsize': return 'tShirtSize';
                case 'address': case 'currentaddress': return 'currentAddress';
                case 'profession': case 'professiondetails': return 'professionDetails';
                case 'experience': return 'experience';
                case 'guestcount': case 'totalattend': return 'totalAttend';
                case 'paymentby': case 'paytype': return 'paymentBy';
                case 'paymentid': case 'payid': case 'txn': case 'txnid': return 'paymentId';
                case 'amount': case 'paymentamount': case 'payamount': return 'paymentAmount';
                case 'status': return 'status';
                case 'roll': case 'rollno': return 'rollNo';
                default: return null;
            }
        };
        $fieldKeys = array_map($mapKey,$header);

        while(($row = fgetcsv($handle,0,',')) !== false){
            if(count($row) === 1 && trim($row[0]) === ''){ continue; }
            $data = [];
            $raw = [];
            foreach($row as $i => $value){
                $key = $fieldKeys[$i] ?? null;
                if(!$key){ continue; }
                $data[$key] = is_string($value) ? trim($value) : $value;
                // also store raw normalized header -> value for guest parsing
                $rawKey = $header[$i] ?? null;
                if($rawKey !== null){ $raw[$rawKey] = is_string($value) ? trim($value) : $value; }
            }
            // Minimal validation
            if(empty($data['studentName']) || empty($data['department']) || empty($data['shift'])){
                $skipped++; $log[] = 'Skipped: missing required fields (name/dept/shift)'; continue;
            }
            // Normalize status
            $status = $data['status'] ?? $defaultStatus;
            if(!in_array($status,['PendingVerify','Verified','Rejected'])){ $status = $defaultStatus; }

            // Find existing by email or phone
            $existing = null;
            if(!empty($data['emailAddress'])){
                $existing = studentRegister::where('emailAddress',$data['emailAddress'])->first();
            }
            if(!$existing && !empty($data['phone'])){
                $existing = studentRegister::where('phone',$data['phone'])->first();
            }

            // Collect guests from raw columns: guest_{n}_name, guest_{n}_relation, guest_{n}_age
            $guests = [];
            foreach($raw as $rk => $rv){
                if(preg_match('/^guest[_]?(\d+)_(name|relation|age)$/', $rk, $m)){
                    $idx = intval($m[1]); $attr = $m[2];
                    if(!isset($guests[$idx])){ $guests[$idx] = ['guestName'=>null,'guestRelation'=>null,'guestAge'=>null]; }
                    if($attr === 'name'){ $guests[$idx]['guestName'] = $rv; }
                    elseif($attr === 'relation'){ $guests[$idx]['guestRelation'] = $rv; }
                    elseif($attr === 'age'){ $guests[$idx]['guestAge'] = is_numeric($rv) ? intval($rv) : null; }
                }
            }
            // sanitize guests: remove empty name
            $guests = array_values(array_filter($guests,function($g){ return !empty($g['guestName']); }));

            if($existing){
                if($mode === 'create'){
                    $skipped++; $log[] = 'Skipped existing: '.$existing->emailAddress; continue;
                }
                // Update
                $existing->studentName       = $data['studentName'] ?? $existing->studentName;
                $existing->department        = $data['department'] ?? $existing->department;
                $existing->shift             = $data['shift'] ?? $existing->shift;
                $existing->phone             = $data['phone'] ?? $existing->phone;
                $existing->emailAddress      = $data['emailAddress'] ?? $existing->emailAddress;
                $existing->gender            = $data['gender'] ?? $existing->gender;
                $existing->blGroup           = $data['blGroup'] ?? $existing->blGroup;
                $existing->tShirtSize        = $data['tShirtSize'] ?? $existing->tShirtSize;
                $existing->currentAddress    = $data['currentAddress'] ?? $existing->currentAddress;
                $existing->professionDetails = $data['professionDetails'] ?? $existing->professionDetails;
                $existing->experience        = $data['experience'] ?? $existing->experience;
                $existing->totalAttend       = $data['totalAttend'] ?? $existing->totalAttend;
                $existing->paymentBy         = $data['paymentBy'] ?? $existing->paymentBy;
                $existing->paymentId         = $data['paymentId'] ?? $existing->paymentId;
                $existing->paymentAmount     = $data['paymentAmount'] ?? $existing->paymentAmount;
                $existing->rollNo            = $data['rollNo'] ?? $existing->rollNo;
                $existing->status            = $status;
                if($existing->save()){
                    // handle guests according to behavior
                    if(!empty($guests)){
                        if($guestBehavior === 'replace'){
                            geustRegister::where(['linkStudent'=>$existing->id])->delete();
                        }
                        if($guestBehavior !== 'ignore'){
                            foreach($guests as $g){
                                $guest = new geustRegister();
                                $guest->guestName = $g['guestName'] ?? null;
                                $guest->guestRelation = $g['guestRelation'] ?? null;
                                $guest->guestAge = $g['guestAge'] ?? null;
                                $guest->linkStudent = $existing->id;
                                $guest->status = $status;
                                $guest->save();
                            }
                        }
                    }
                    $updated++;
                } else { $skipped++; $log[] = 'Failed to update: '.$existing->emailAddress; }
            } else {
                // Create
                $student = new studentRegister();
                $student->studentName           = $data['studentName'] ?? null;
                $student->department            = $data['department'] ?? null;
                $student->shift                 = $data['shift'] ?? null;
                $student->phone                 = $data['phone'] ?? null;
                $student->emailAddress          = $data['emailAddress'] ?? null;
                $student->gender                = $data['gender'] ?? null;
                $student->blGroup               = $data['blGroup'] ?? null;
                $student->tShirtSize            = $data['tShirtSize'] ?? null;
                $student->currentAddress        = $data['currentAddress'] ?? null;
                $student->professionDetails     = $data['professionDetails'] ?? null;
                $student->experience            = $data['experience'] ?? null;
                $student->totalAttend           = $data['totalAttend'] ?? null;
                $student->paymentBy             = $data['paymentBy'] ?? null;
                $student->paymentId             = $data['paymentId'] ?? null;
                $student->paymentAmount         = $data['paymentAmount'] ?? null;
                $student->rollNo                = $data['rollNo'] ?? null;
                $student->status                = $status;
                if($student->save()){
                    // create guests if present
                    if(!empty($guests)){
                        foreach($guests as $g){
                            $guest = new geustRegister();
                            $guest->guestName = $g['guestName'] ?? null;
                            $guest->guestRelation = $g['guestRelation'] ?? null;
                            $guest->guestAge = $g['guestAge'] ?? null;
                            $guest->linkStudent = $student->id;
                            $guest->status = $status;
                            $guest->save();
                        }
                        $student->totalAttend = count($guests);
                        $student->save();
                    }
                    $created++;
                } else { $skipped++; $log[] = 'Failed to create: '.($data['emailAddress'] ?? $data['phone'] ?? 'unknown'); }
            }
        }
        fclose($handle);

        return back()->with('success',"Imported: $created, Updated: $updated, Skipped: $skipped")
                     ->with('importLog',$log);
    }
}
