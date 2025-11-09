<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentRegister;
use App\Models\geustRegister;
use App\Models\adminPanel;
use App\Models\TeamMember;
use Hash;
use Session;

class FrontEnd extends Controller
{
    public function index(){
        $team = TeamMember::where('active',true)->orderBy('ordering','ASC')->get();
        return view('front.home',[ 'team'=>$team ]);
    }
    
    public function studentRegister(){
        $open = optional(\App\Models\SiteSetting::first())->registration_open ?? true;
        if(!$open){
            return redirect(url('/'))
                ->with('error','Registration is currently closed. Please check back later.');
        }
        return view('front.studentRegister');
    }
    
    public function studentRegisterBypass(){
        $open = optional(\App\Models\SiteSetting::first())->registration_open ?? true;
        if(!$open){
            return redirect(url('/'))
                ->with('error','Registration is currently closed. Please check back later.');
        }
        return view('front.studentRegisterBypass');
    }
    
    public function adminLogin(){
        // If no admin exists yet, redirect to first-time setup for super admin creation
        if(adminPanel::count() === 0){
            return redirect(route('adminSignup'))->with('success','Create the first Super Admin account');
        }

        if(Session::has('modarator') || Session::has('superAdmin')){
            return redirect(route('adminHome'));
        }
        return view('front.adminSignin');
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
    
    public function adminSignup(Request $requ){
        $isFirst = adminPanel::count() === 0; // true if no admin accounts exist yet

        // Allow access if first setup OR super admin already logged in
        if(!$isFirst && !Session::has('superAdmin')){
            return redirect(route('adminLogin'))->with('error','Only Super Admin can create new admin accounts');
        }

        return view('front.adminSignup',["isFirst"=>$isFirst]);
    }
    
    public function thankyou(){
        return view('front.thankYouPage');
    }

    public function confirmAdminSignup(Request $requ){
        $isFirst = adminPanel::count() === 0;

        // If not first setup, require an authenticated super admin
        if(!$isFirst && !Session::has('superAdmin')){
            return redirect(route('adminLogin'))->with('error','Unauthorized action');
        }

        // Basic validation
        $requ->validate([
            'fullName'      => 'required|string|min:3',
            'emailAddress'  => 'required|email',
            'password'      => 'required|min:6',
            'confirmPass'   => 'required|same:password',
        ]);

        $existing = adminPanel::where('emailAddress',$requ->emailAddress)->first();
        if($existing){
            return back()->with('error','Sorry! Admin profile already exists');
        }

        $admin = new adminPanel();
        $admin->adminName       = $requ->fullName;
        $admin->emailAddress    = $requ->emailAddress;
        $admin->department      = $requ->dept;
        $admin->shift           = $requ->shift;
        // Force first account to be Super Admin (Admin)
        $admin->adminType       = $isFirst ? 'Admin' : $requ->adminRule;
        $admin->batchSession    = $requ->batch;
        $admin->password        = Hash::make($requ->password);

        if($admin->save()){
            // Auto login the first super admin
            if($isFirst){
                $requ->session()->regenerate();
                $requ->session()->put('superAdmin',$admin->id);
                return redirect(route('adminHome'))->with('success','Super Admin account created successfully');
            }
            return back()->with('success','Admin profile created successfully');
        }
        return back()->with('error','Profile creation failed');
    }

    public function saveStudent(Request $requ){
        $open = optional(\App\Models\SiteSetting::first())->registration_open ?? true;
        if(!$open){
            return back()->with('error','Registration is currently closed.');
        }
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
