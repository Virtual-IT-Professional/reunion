<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd;
use App\Http\Controllers\AdminPanel;

Route::get('/', function () {
    return view('front.home');
});

Route::get('/register/student',[
    FrontEnd::class,
    'studentRegister'
])->name('studentRegister');

Route::post('/register/student/confirm',[
    FrontEnd::class,
    'saveStudent'
])->name('saveStudent');

// Route::get('/register/geust',[
//     'uses'  => 'FrontEnd@studentRegister',
//     'as'    => 'studentRegister'
// ]);

// Route::get('/register/admin',[
//     'uses'  => 'FrontEnd@studentRegister',
//     'as'    => 'studentRegister'
// ]);

Route::get('/backoffice/modarator/home',[
    AdminPanel::class,
    'home'
])->name('modaratorHome');

// Route::get('/',[
//     'uses'  => ,
//     'as'    => 
// ]);