<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEnd extends Controller
{
    public function index(){
        return view('front.home');
    }
    
    public function studentRegister(){
        return view('front.studentRegister');
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
