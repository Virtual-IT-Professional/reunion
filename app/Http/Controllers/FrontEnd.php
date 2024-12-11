<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentRegister;
use App\Models\geustRegister;
use App\Models\adminPanel;
use Hash;
use Session;

class FrontEnd extends Controller
{
    public function index(){
        return view('front.home');
    }
    
    public function studentRegister(){
        return view('front.studentRegister');
    }
    
    public function studentRegisterBypass(){
        return view('front.studentRegisterBypass');
    }
    
    public function adminLogin(){
        if(Session::has('modarator') || Session::has('superAdmin')):
            return redirect(route('adminHome'));
        else:
            return view('front.adminSignin');
        endif;
    }

    public function confirmAdminLogin(Request $requ){
        $chk = adminPanel::where(['emailAddress'=>$requ->emailAddress])->first();
        if(!empty($chk)):
            $chkPass = Hash::check($requ->password,$chk->password);
            if($chkPass):
                // return $chk->adminType;
                $requ->session()->regenerate();
                if($chk->adminType == 'Admin'):
                    $requ->session()->put('superAdmin', $chk->id);
                endif;
                if($chk->adminType == 'Modarator'):
                    $requ->session()->put('modarator', $chk->id);
                endif;
                return redirect(route('adminHome'));
            else:
                return back()->with('error','Sorry! Wrong password provide');
            endif;
        else:
            return back()->with('error','Sorry! No admin rule found with your query');
        endif;
    }
    
    public function adminSignup(){
        return view('front.adminSignup');
    }
    
    public function thankyou(){
        return view('front.thankYouPage');
    }

    public function confirmAdminSignup(Request $requ){
        $chk = adminPanel::where(['emailAddress'=>$requ->emailAddress])->first();
        if(!empty($chk)):
            return back()->with('error','Sorry! Admin profile already exist');
        else:
            if($requ->password != $requ->confirmPass):
                return back()->with('error','Password does not match correctly');
            endif;
            $admin = new adminPanel();
            $admin->adminName       = $requ->fullName;
            $admin->emailAddress    = $requ->emailAddress;
            $admin->department      = $requ->dept;
            $admin->shift           = $requ->shift;
            $admin->adminType       = $requ->adminRule;
            $admin->batchSession    = $requ->batch;
            $hashPass = Hash::make($requ->password);
            $admin->password        = $hashPass;
            if($admin->save()):
                return back()->with('success','Profile created successfully');
            else:
                return back()->with('error','Profile created failed');
            endif;
        endif;
    }

    public function saveStudent(Request $requ){
        $chk = studentRegister::where(['phone'=>$requ->phone,'emailAddress'=>$requ->mailAddress,'status'=>'PendingVerify'])->first();
        if(!empty($chk)):
            return back()->with('error','You already have a pending data. Please wait till verify it');
        endif;

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
        $student->status = 'PendingVerify';
        request()->validate([
            'file' => 'mimes:jpeg,png,jpg,gif,svg|max:300',
        ]);
        if(!empty($requ->avatar)):
            $imageName = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('upload/student'), $imageName);
            $student->avatar = $imageName;
        endif;
        if($student->save()):
            if($requ->totalMember>0):
                $guestlength = count($requ->guestName);
                for ($i = 0; $i < $guestlength; $i++) {
                    $guest = new geustRegister();
                    $guest->guestName = $requ->guestName[$i];
                    $guest->guestRelation = $requ->guestRelation[$i];
                    $guest->linkStudent = $student->id;
                    if(!empty($requ->guestAge[$i])):
                        $guest->guestAge = $requ->guestAge[$i];
                    endif;
                    $guest->save();
                }
            endif;
            return redirect(route('thankyou'))->with('success','Thanks! Your details submitted successfully. Please wait till verify by admin panel. You will received a confirmation mail/message to your email/phone');
        else:
            return back()->with('error','Sorry! There was an error. Please try later');
        endif;
    }
    
    public function geustRegister(){
        return view('front.home');
    }
    
    public function donation(){
        return view('front.home');
    }
    
    public function contact(){
        return view('front.home');
    }

    public function logout(){
        Session()->invalidate();
        Session()->regenerateToken();
        Session()->flush();

        return redirect(route('adminLogin'))->with('error','Logout successful');
    }
}
