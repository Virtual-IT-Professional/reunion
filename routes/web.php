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

Route::get('/thankyou',[
    FrontEnd::class,
    'thankyou'
])->name('thankyou');

Route::post('/register/student/confirm',[
    FrontEnd::class,
    'saveStudent'
])->name('saveStudent');

Route::get('/control/login',[
    FrontEnd::class,
    'adminLogin'
])->name('adminLogin');

Route::post('/control/login/confirm',[
    FrontEnd::class,
    'confirmAdminLogin'
])->name('confirmAdminLogin');

Route::get('/superControl/admin/register',[
    FrontEnd::class,
    'adminSignup'
])->name('adminSignup');

Route::post('/superControl/admin/register/confirm',[
    FrontEnd::class,
    'confirmAdminSignup'
])->name('confirmAdminSignup');

Route::get('/logout',[
    FrontEnd::class,
    'logout'
])->name('logout');

// Route::get('/register/geust',[
//     'uses'  => 'FrontEnd@studentRegister',
//     'as'    => 'studentRegister'
// ]);

// Route::get('/register/admin',[
//     'uses'  => 'FrontEnd@studentRegister',
//     'as'    => 'studentRegister'
// ]);

// Admin panel routes details
Route::middleware(['modarator','superAdmin'])->group(function(){
    Route::get('/backoffice/admin/home',[
        AdminPanel::class,
        'home'
    ])->name('adminHome');


    Route::get('/backoffice/admin/pendingStudent',[
        AdminPanel::class,
        'pendingList'
    ])->name('pendingList');

    Route::get('/backoffice/admin/register/verified',[
        AdminPanel::class,
        'verifiedList'
    ])->name('verifiedList');

    Route::get('/backoffice/admin/register/rejected',[
        AdminPanel::class,
        'rejectedList'
    ])->name('rejectedList');

    Route::get('/backoffice/admin/register/accept/{id}',[
        AdminPanel::class,
        'acceptRegister'
    ])->name('acceptRegister');

    Route::get('/backoffice/admin/student/view/{id}',[
        AdminPanel::class,
        'viewPerticipate'
    ])->name('viewPerticipate');

    Route::get('/backoffice/admin/student/edit/{id}',[
        AdminPanel::class,
        'editPerticipate'
    ])->name('editPerticipate');

    Route::post('/backoffice/admin/student/update',[
        AdminPanel::class,
        'updatePerticipate'
    ])->name('updatePerticipate');

    Route::get('/backoffice/admin/student/guest/edit/{id}',[
        AdminPanel::class,
        'editGuest'
    ])->name('editGuest');

    Route::post('/backoffice/admin/student/guest/update',[
        AdminPanel::class,
        'updateGuest'
    ])->name('updateGuest');

    Route::post('/backoffice/admin/student/avatar/update',[
        AdminPanel::class,
        'updateAvatar'
    ])->name('updateAvatar');

    Route::get('/backoffice/admin/student/avatar/del/{id}',[
        AdminPanel::class,
        'delAvatar'
    ])->name('delAvatar');

    Route::get('/backoffice/admin/register/reject/{id}',[
        AdminPanel::class,
        'rejectRegister'
    ])->name('rejectRegister');
});