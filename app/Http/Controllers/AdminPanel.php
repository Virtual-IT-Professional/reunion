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
}
