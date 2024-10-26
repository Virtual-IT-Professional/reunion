<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentRegister;

class FrontEnd extends Controller
{
    public function index(){
        return view('front.home');
    }
    
    public function studentRegister(){
        return view('front.studentRegister');
    }

    public function saveStudent(Request $requ){
        $chk = studentRegister::where(['phone'=>$requ->phone,'emailAddress'=>$requ->mailAddress,'status'=>'PendingVerify'])->first();
        if(!empty($chk)):
            return back()->with('error','You already have a pending data. Please wait till verify it');
        endif;

        $student = new studentRegister();
        $student->studentName = $requ->stdName;
        $student->department = $requ->dept;
        $student->shift = $requ->shift;
        $student->phone = $requ->phone;
        $student->emailAddress = $requ->mailAddress;
        $student->tShirtSize = $requ->tShirtSize;
        $student->blGroup = $requ->blGroup;
        $student->totalAttend = $requ->totalMember;
        $student->familyMemberDetails = $requ->familyDetails;
        $student->currentAddress = $requ->currentAddress;
        $student->professionDetails = $requ->professionDetails;
        $student->paymentBy = $requ->payType;
        $student->paymentId = $requ->payId;
        $student->paymentAmount = $requ->payAmount;
        $student->status = 'PendingVerify';
        if($student->save()):
            return back()->with('success','Thanks! Your details submitted successfully. Please wait till verify by admin panel. You will received a confirmation mail/message to your email/phone');
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
}
