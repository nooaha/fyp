<?php

use App\Http\Controllers\ChangePasswordController;
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
use App\Http\Controllers\ImageUploadController;
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

    Route::get('papar-maklumat', [InfoUserController::class, 'showParentDetail'])->name('user-details.showParentDetail');

    Route::get('maklumat-anak/{childId}', [ChildDetailsController::class, 'showChildDetails'])->name('user-details.showChildDetails');

    //Route::put('papar-maklumat', [InfoUserController::class, 'updateParentDetail'])->name('user-details.updateParentDetail');
    //Route::post('papar-maklumat', [InfoUserController::class, 'updateParentDetail'])->name('user-details.updateParentDetail');

    Route::get('edit-maklumat-anak/{childId}', [ChildDetailsController::class, 'edit'])->name('user-details.editChildDetails');
    Route::put('edit-maklumat-anak/{childId}', [ChildDetailsController::class, 'update'])->name('user-details.updateChildDetails');

    Route::get('edit-maklumat-pengguna/{user}', [InfoUserController::class, 'edit'])->name('user-details.editUserDetails');
    Route::put('edit-maklumat-pengguna/{user}', [InfoUserController::class, 'update'])->name('user-details.updateUserDetails');
    Route::get('/paparan-utama/anak/{childId}', [UserDashboardController::class, 'index'])->name('user-dashboard');

    //Route::get('graf-tumbesaran-anak/anak/{childId}', [GrowthRecordController::class, 'index'])->name('growth-tracking.index'); // Fetch records
    Route::get('graf-tumbesaran-anak/anak/{childId}', [GrowthRecordController::class, 'showGrowthChart'])->name('growth-tracking.showGrowthChart'); // Fetch records
    Route::get('rekod-maklumat-tumbesaran/{childId}', [GrowthRecordController::class, 'add'])->name('growth-tracking.add'); // Add record
    Route::post('rekod-maklumat-tumbesaran/{childId}', [GrowthRecordController::class, 'store'])->name('growth-tracking.store'); // Add record

    Route::get('tambah-anak', [ChildDetailsController::class, 'createChildDetails'])->name('user-details.createChildDetails');
    Route::post('simpan-anak', [ChildDetailsController::class, 'storeChildDetails'])->name('user-details.storeChildDetails');

    Route::delete('delete-parent-details/{id}', [InfoUserController::class, 'destroyUserDetails'])->name('user-details.destroyUserDetails');

    Route::delete('delete-child-details/{id}', [ChildDetailsController::class, 'destroyChildDetails'])->name('user-details.destroyChildDetails');

    Route::get('tips-dan-intervensi', function () {
        return view('user.tips-interventions');
    })->name('tips-dan-intervensi');

    Route::get('tips1', function () {
        return view('user.tips1');
    })->name('tips1');

    Route::get('interventions1', function () {
        return view('user.interventions1');
    })->name('interventions1');

    //Route::get('mchat/{child_id}', [MCHATController::class, 'results'])->name('mchat');
    Route::get('MCHAT/{childId}', [MCHATController::class, 'index'])->name('mchat.index');
    Route::get('ujian-MCHAT/{childId}', [MCHATController::class, 'create'])->name('mchat.create');
    Route::post('keputusan-ujian/{childId}', [MCHATController::class, 'store'])->name('mchat.store');

    Route::get('pencapaian-perkembangan/{childId}', [MilestoneChecklistController::class, 'showMilestoneList'])->name('child-milestone.showMilestoneList');
    Route::get('senarai-perkembangan', [MilestoneRecordController::class, 'index'])->name('record-milestone.index');
    Route::post('senarai-perkembangan', [MilestoneRecordController::class, 'store'])->name('record-milestone.store');

    Route::get('tips-dan-intervensi', function () {
        return view('user.tips-interventions');
    })->name('tips-dan-intervensi');

    Route::get('tips1', function () {
        return view('user.tips1');
    })->name('tips1');

    Route::get('interventions1', function () {
        return view('user.interventions1');
    })->name('interventions1');

    Route::get('admin-dashboard', function () {
        return view('admin.admin-dashboard');
    })->name('admin-dashboard');

    Route::get('admin-interventions', function () {
        return view('admin.admin-interventions');
    })->name('admin-interventions');

    Route::get('admin-tips-interventions', function () {
        return view('admin.admin-tips-interventions');
    })->name('admin-tips-interventions');

    Route::get('tambah-kategori-tips', function () {
        return view('admin.admin-add-category-tips');
    })->name('add-category-tips');

    Route::get('tambah-tips', function () {
        return view('admin.admin-add-tips');
    })->name('add-tips');

    Route::get('edit-kategori-tips', function () {
        return view('admin.admin-edit-category-tips');
    })->name('edit-kategori-tips');

    Route::get('edit-tips', function () {
        return view('admin.admin-edit-tips');
    })->name('edit-tips');

    Route::get('tambah-kategori-intervensi', function () {
        return view('admin.admin-add-category-interventions');
    })->name('add-category-interventions');

    Route::get('tambah-intervensi', function () {
        return view('admin.admin-add-interventions');
    })->name('add-interventions');

    Route::get('edit-kategori-intervensi', function () {
        return view('admin.admin-edit-category-interventions');
    })->name('edit-category-interventions');

    Route::get('edit-intervensi', function () {
        return view('admin.admin-edit-interventions');
    })->name('edit-interventions');

    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('milestone-checklists', MilestoneChecklistController::class);
    Route::get('/senarai-semak-perkembangan/{milestoneChecklist}', [MilestoneChecklistController::class, 'showList'])->name('milestone-checklists.showList');
    Route::get('/senarai-semak-perkembangan', [MilestoneChecklistController::class, 'index'])->name('senarai-semak-perkembangan');
    Route::get('/kemaskini-senarai/{id}/edit', [MilestoneChecklistController::class, 'edit'])->name('milestone-checklists.edit');

    Route::resource('tips-categories', TipsCategoryController::class)->except(['show']);

    Route::get('/tips-categories/{tipscategory}', [TipsCategoryController::class, 'show'])->name('tipscategories.show');

    Route::get('/admin-tips', [TipsCategoryController::class, 'index'])->name('tips-categories.index');

    //Route::delete('/tipscategories/{tipscategory}', [TipsCategoryController::class, 'destroy'])->name('tipscategories.destroy');
    //Route::delete('/tipscategories/{id}', [TipsCategoryController::class, 'destroy'])->name('custom-category-destroy');

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

//Route::get('/maklumat-pengguna', function () {return view('user.user-fill-form');})->name('userInfo')->middleware('auth');

// Handle form submission and redirect to the dashboard
