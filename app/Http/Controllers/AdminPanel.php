<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentRegister;
use App\Mail\RegisterVerify;
use App\Models\geustRegister;
use Middleware;
use Mail;
use File;

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
}
