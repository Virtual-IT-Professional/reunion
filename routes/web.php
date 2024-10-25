<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register/student',[
    FrontEnd::class,
    'studentRegister'
]);

Route::post('/register/student/confirm',[
    'uses'  => 'FrontEnd@studentRegister',
    'as'    => 'studentRegister'
]);

Route::get('/register/geust',[
    'uses'  => 'FrontEnd@studentRegister',
    'as'    => 'studentRegister'
]);

Route::post('/register/guest/confirm',[
    'uses'  => 'FrontEnd@studentRegister',
    'as'    => 'studentRegister'
]);

Route::get('/register/admin',[
    'uses'  => 'FrontEnd@studentRegister',
    'as'    => 'studentRegister'
]);

// Route::get('/',[
//     'uses'  => ,
//     'as'    => 
// ]);

// Route::get('/',[
//     'uses'  => ,
//     'as'    => 
// ]);