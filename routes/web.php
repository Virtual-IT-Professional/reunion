<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd;

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

// Route::get('/',[
//     'uses'  => ,
//     'as'    => 
// ]);

// Route::get('/',[
//     'uses'  => ,
//     'as'    => 
// ]);