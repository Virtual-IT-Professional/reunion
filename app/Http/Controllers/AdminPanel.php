<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentRegister;
use App\Mail\RegisterVerify;
use Middleware;
use Mail;

class AdminPanel extends Controller
{
    public function home(){
        return view('admin.home');
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
                $email = $student->emailAddress;
         
                $body = [
                    'name'=>$student->studentName,
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
}
