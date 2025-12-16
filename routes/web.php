<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd;
use App\Http\Controllers\AdminPanel;

Route::get('/', [
    FrontEnd::class,
    'index'
])->name('home');

Route::get('/register/student',[
    FrontEnd::class,
    'studentRegister'
])->name('studentRegister');

Route::get('/bypass/register/student/back',[
    FrontEnd::class,
    'studentRegisterBypass'
])->name('studentRegisterBypass');

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


    Route::get('/backoffice/ticket',[
        AdminPanel::class,
        'ticket'
    ])->name('ticket');


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

    Route::get('/backoffice/admin/sent/invite',[
        AdminPanel::class,
        'inviteSent'
    ])->name('inviteSent');

    Route::get('/backoffice/admin/register/return/pending/{id}',[
        AdminPanel::class,
        'returnPending'
    ])->name('returnPending');

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

    // Admin create student registration
    Route::get('/backoffice/admin/student/create',[
        AdminPanel::class,
        'createStudent'
    ])->name('adminCreateStudent');
    Route::post('/backoffice/admin/student/store',[
        AdminPanel::class,
        'storeStudent'
    ])->name('adminStoreStudent');

    // ID Card management
    Route::get('/backoffice/admin/idcards',[
        AdminPanel::class,
        'idCards'
    ])->name('adminIdCards');
    Route::post('/backoffice/admin/idcards/issue/{id}',[
        AdminPanel::class,
        'issueIdCard'
    ])->name('issueIdCard');
    Route::get('/backoffice/admin/idcards/print/{id}',[
        AdminPanel::class,
        'printIdCard'
    ])->name('printIdCard');
    Route::post('/backoffice/admin/idcards/mark-printed/{id}',[
        AdminPanel::class,
        'markIdCardPrinted'
    ])->name('markIdCardPrinted');

    // CSV import for registrations
    Route::get('/backoffice/admin/student/import',[
        AdminPanel::class,
        'importForm'
    ])->name('adminImportStudents');
    Route::post('/backoffice/admin/student/import',[
        AdminPanel::class,
        'importProcess'
    ])->name('adminImportStudentsProcess');

    // Admin profile routes
    Route::get('/backoffice/admin/profile',[
        AdminPanel::class,
        'profile'
    ])->name('adminProfile');

    Route::post('/backoffice/admin/profile/update',[
        AdminPanel::class,
        'updateProfile'
    ])->name('adminProfileUpdate');

    Route::post('/backoffice/admin/password/update',[
        AdminPanel::class,
        'updatePassword'
    ])->name('adminPasswordUpdate');

    Route::post('/backoffice/admin/avatar/update',[
        AdminPanel::class,
        'updateAdminAvatar'
    ])->name('adminAvatarUpdate');

    // Team management
    Route::get('/backoffice/admin/team',[
        AdminPanel::class,
        'team'
    ])->name('adminTeam');

    Route::post('/backoffice/admin/team/store',[
        AdminPanel::class,
        'teamStore'
    ])->name('adminTeamStore');

    Route::post('/backoffice/admin/team/update',[
        AdminPanel::class,
        'teamUpdate'
    ])->name('adminTeamUpdate');

    Route::get('/backoffice/admin/team/delete/{id}',[
        AdminPanel::class,
        'teamDelete'
    ])->name('adminTeamDelete');

    // Site Settings
    Route::get('/backoffice/admin/settings',[
        AdminPanel::class,
        'settings'
    ])->middleware('onlySuperAdmin')->name('adminSettings');

    Route::post('/backoffice/admin/settings',[
        AdminPanel::class,
        'updateSettings'
    ])->middleware('onlySuperAdmin')->name('adminSettingsUpdate');

    // Clients / Sponsors
    Route::get('/backoffice/admin/clients',[ AdminPanel::class, 'clients' ])->name('adminClients');
    Route::post('/backoffice/admin/clients/store',[ AdminPanel::class, 'clientStore' ])->name('adminClientStore');
    Route::post('/backoffice/admin/clients/update',[ AdminPanel::class, 'clientUpdate' ])->name('adminClientUpdate');
    Route::get('/backoffice/admin/clients/delete/{id}',[ AdminPanel::class, 'clientDelete' ])->name('adminClientDelete');
    Route::get('/backoffice/admin/clients/toggle/{id}',[ AdminPanel::class, 'clientToggle' ])->name('adminClientToggle');
});