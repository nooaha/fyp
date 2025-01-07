<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\InterventionsController;
use App\Http\Controllers\MilestoneChecklistController;
use App\Http\Controllers\TipsCategoryController;
use App\Http\Controllers\ChildDetailsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GrowthRecordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\MCHATController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\MilestoneRecordController;

//Route::post('/upload-image', [PasswordController::class, 'store'])->name('upload.image');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Route to show the change password form
Route::get('/change-password', [PasswordController::class, 'showChangePasswordForm'])->name('update-password.showChangePasswordForm');

// Route to handle password update (form submission)
Route::post('/update-password', [PasswordController::class, 'updatePassword'])->name('update-password.updatePassword');
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('user-details', InfoUserController::class);
    // Show the user details form
    Route::get('/maklumat-pengguna', [InfoUserController::class, 'create'])->name('user-details.create');

    // Handle form submission
    Route::post('/maklumat-pengguna', [InfoUserController::class, 'store'])->name('user-details.store');

    Route::get('admin-profile', [InfoUserController::class, 'show'])->name('user-details.show');
    //Route::post('admin-profile', [InfoUserController::class, 'editUserDetails'])->name('user-details.editUserDetails');
    
    Route::get('papar-maklumat', [InfoUserController::class, 'showParentDetail'])->name('user-details.showParentDetail');

    Route::get('maklumat-anak/{childId}', [ChildDetailsController::class, 'showChildDetails'])->name('user-details.showChildDetails');

    //Route::put('papar-maklumat', [InfoUserController::class, 'updateParentDetail'])->name('user-details.updateParentDetail');
    //Route::post('papar-maklumat', [InfoUserController::class, 'updateParentDetail'])->name('user-details.updateParentDetail');

    Route::get('edit-maklumat-anak/{childId}', [ChildDetailsController::class, 'edit'])->name('user-details.editChildDetails');
    Route::put('edit-maklumat-anak/{childId}', [ChildDetailsController::class, 'update'])->name('user-details.updateChildDetails');

    Route::get('edit-maklumat-pengguna/{user}', [InfoUserController::class, 'edit'])->name('user-details.edit');
    //Route::put('edit-maklumat-pengguna/{user}', [InfoUserController::class, 'editUserDetails'])->name('user-details.editUserDetails');
    Route::put('edit-maklumat-pengguna/{user}', [InfoUserController::class, 'editUserDetails'])->name('user-details.editUserDetails');
    Route::get('/paparan-utama/anak/{childId}', [UserDashboardController::class, 'index'])->name('user-dashboard');

    //Route::get('graf-tumbesaran-anak/anak/{childId}', [GrowthRecordController::class, 'index'])->name('growth-tracking.index'); // Fetch records
    Route::get('graf-tumbesaran-anak/anak/{childId}', [GrowthRecordController::class, 'showGrowthChart'])->name('growth-tracking.showGrowthChart'); // Fetch records
    Route::get('rekod-maklumat-tumbesaran/{childId}', [GrowthRecordController::class, 'add'])->name('growth-tracking.add'); // Add record
    Route::post('rekod-maklumat-tumbesaran/{childId}', [GrowthRecordController::class, 'store'])->name('growth-tracking.store'); // Add record

    Route::get('tambah-anak', [ChildDetailsController::class, 'createChildDetails'])->name('user-details.createChildDetails');
    Route::post('simpan-anak', [ChildDetailsController::class, 'storeChildDetails'])->name('user-details.storeChildDetails');

    Route::delete('delete-parent-details/{id}', [InfoUserController::class, 'destroyUserDetails'])->name('user-details.destroyUserDetails');

    Route::delete('delete-child-details/{id}', [ChildDetailsController::class, 'destroyChildDetails'])->name('user-details.destroyChildDetails');

    Route::get('tips1', function () {
        return view('user.tips1');
    })->name('tips1');

    //Route::get('mchat/{child_id}', [MCHATController::class, 'results'])->name('mchat');
    Route::get('MCHAT/{childId}', [MCHATController::class, 'index'])->name('mchat.index');
    Route::get('ujian-MCHAT/{childId}', [MCHATController::class, 'create'])->name('mchat.create');
    Route::post('keputusan-ujian/{childId}', [MCHATController::class, 'store'])->name('mchat.store');

    Route::get('pencapaian-perkembangan/{childId}', [MilestoneChecklistController::class, 'showMilestoneList'])->name('child-milestone.showMilestoneList');
    Route::get('senarai-perkembangan', [MilestoneRecordController::class, 'index'])->name('record-milestone.index');
    Route::post('senarai-perkembangan', [MilestoneRecordController::class, 'store'])->name('record-milestone.store');

    Route::get('/paparan-utama-admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('milestone-checklists', MilestoneChecklistController::class);
    Route::get('/senarai-semak-perkembangan/{milestoneChecklist}', [MilestoneChecklistController::class, 'showList'])->name('milestone-checklists.showList');
    Route::get('/senarai-semak-perkembangan', [MilestoneChecklistController::class, 'index'])->name('senarai-semak-perkembangan');
    Route::get('/kemaskini-senarai/{id}/edit', [MilestoneChecklistController::class, 'edit'])->name('milestone-checklists.edit');
    Route::post('/hantar-peringatan', [MilestoneChecklistController::class, 'sendReminders'])
    ->name('admin.sendReminders');

    //pilih tips/intervensi
    Route::get('admin-tips-interventions', function () {
        return view('admin.admin-tips-interventions');
    })->name('admin-tips-interventions');

    // Admin show all tips categories
    Route::get('/tips-kategori', [TipsCategoryController::class, 'index'])->name('tips-categories.index');
    // Route::get('/admin-tips/{id}', [TipsCategoryController::class, 'show'])->name('tips.show');

    // Create tips category
    Route::get('/tips-categories/create', [TipsCategoryController::class, 'create'])->name('tips-categories.create');
    Route::post('/tips-categories', [TipsCategoryController::class, 'store'])->name('tips-categories.store');

    // Show a specific tips category (if needed)
    Route::get('tips-categories/{tipscategory}', [TipsCategoryController::class, 'show'])->name('tips-categories.show');

    // In routes/web.php
    Route::get('/tips/{id}', [TipsCategoryController::class, 'showTips'])->name('tips.showTips');
    Route::get('/tips-intervensi', [TipsCategoryController::class, 'showTipsIntervensi'])->name('tips.showTipsIntervensi');
    Route::get('/senarai-tips', [TipsCategoryController::class, 'showSenaraiTips'])->name('tips.showSenaraiTips');

    // Edit a specific tips category
    Route::get('/tips-categories/{id}/edit', [TipsCategoryController::class, 'edit'])->name('tips-categories.edit');
    Route::put('/tips-categories/{id}', [TipsCategoryController::class, 'update'])->name('tips-categories.update');

    // Delete a specific tips category
    Route::delete('/tips-categories/{id}', [TipsCategoryController::class, 'destroyTips'])->name('tips-categories.destroy');

    //all for interventions
    Route::get('/intervensi', [InterventionsController::class, 'index'])->name('interventions.index');
    Route::get('maklumat-intervensi/{interventions}', [InterventionsController::class, 'show'])->name('interventions.show');
    Route::get('/tambah-intervensi/create', [InterventionsController::class, 'create'])->name('interventions.create');
    Route::post('/simpan-intervensi', [InterventionsController::class, 'store'])->name('interventions.store');
    Route::get('/intervensi/{id}/edit', [InterventionsController::class, 'edit'])->name('interventions.edit');
    Route::put('/intervensi/{id}', [InterventionsController::class, 'update'])->name('interventions.update');
    Route::delete('/intervensi/{id}', [InterventionsController::class, 'destroy'])->name('interventions.destroy');
    Route::get('/intervensi/{id}', [InterventionsController::class, 'showInterventions'])->name('interventions.showInterventions');
    Route::get('/senarai-intervensi', [InterventionsController::class, 'showSenaraiIntervensi'])->name('interventions.showSenaraiIntervensi');


    Route::get('user-profile', function () {
        return view('user.user-profile');
    })->name('user-profile');

    Route::get('/logout', [SessionsController::class, 'destroy']);

    Route::get('/login', function () {
        return view('dashboard');
    })->name('sign-up');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('session/login-session-copy');
})->name('login');



