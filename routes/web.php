<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\MilestoneChecklistController;
use App\Http\Controllers\TipsCategoryController;
use App\Http\Controllers\ChildDetailsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/update-password', [PasswordController::class, 'updatePassword'])->name('update-password');
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

    //Route::get('paparan-tips, [TipsCategoryController::class, 'showTips'])->name('user-details.showTips');

    Route::get('maklumat-anak/{child}', [ChildDetailsController::class, 'showChildDetails'])->name('user-details.showChildDetails');

    //Route::put('papar-maklumat', [InfoUserController::class, 'updateParentDetail'])->name('user-details.updateParentDetail');
    //Route::post('papar-maklumat', [InfoUserController::class, 'updateParentDetail'])->name('user-details.updateParentDetail');

    Route::get('edit-maklumat-anak/{child}', [ChildDetailsController::class, 'edit'])->name('user-details.editChildDetails');
    Route::put('edit-maklumat-anak/{child}', [ChildDetailsController::class, 'update'])->name('user-details.updateChildDetails');

    Route::get('edit-maklumat-pengguna/{user}', [InfoUserController::class, 'edit'])->name('user-details.editUserDetails');
    Route::put('edit-maklumat-pengguna/{user}', [InfoUserController::class, 'update'])->name('user-details.updateUserDetails');


    Route::get('tambah-anak', [ChildDetailsController::class, 'createChildDetails'])->name('user-details.createChildDetails');
    Route::post('simpan-anak', [ChildDetailsController::class, 'storeChildDetails'])->name('user-details.storeChildDetails');

    Route::delete('delete-parent-details/{id}', [InfoUserController::class, 'destroyUserDetails'])->name('user-details.destroyUserDetails');

    Route::delete('delete-child-details/{id}', [ChildDetailsController::class, 'destroyChildDetails'])->name('user-details.destroyChildDetails');

    Route::get('paparan-utama', function () {
        return view('user.user-dashboard');
    })->name('user-dashboard');


    Route::get('graf-tumbesaran-anak', function () {
        return view('user.growth-charts');
    })->name('growth-charts');

    Route::get('rekod-maklumat-tumbesaran', function () {
        return view('user.add-growth');
    })->name('add-growth');

    Route::get('senarai-perkembangan', function () {
        return view('user.checklist-milestone');
    })->name('checklist-milestone');

    Route::get('pencapaian-perkembangan', function () {
        return view('user.child-milestone');
    })->name('child-milestone');

    Route::get('m-chat', function () {
        return view('user.m-chat');
    })->name('m-chat');

    Route::get('ujian-mchat', function () {
        return view('user.test-mchat');
    })->name('ujian-mchat');

    Route::get('keputusan-ujian', function () {
        return view('user.test-result');
    })->name('test-result');

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

    Route::get('/milestone-checklists/{milestoneChecklist}', [MilestoneChecklistController::class, 'show'])->name('milestone-checklists.show');

    Route::get('/senarai-semak-perkembangan', [MilestoneChecklistController::class, 'index'])->name('senarai-semak-perkembangan');

    Route::get('/kemaskini-senarai/{id}/edit', [MilestoneChecklistController::class, 'edit'])->name('milestone-checklists.edit');

    // Show all tips categories
    Route::get('/tips-categories', [TipsCategoryController::class, 'index'])->name('tips-categories.index');

    // Create tips category
    Route::get('/tips-categories/create', [TipsCategoryController::class, 'create'])->name('tips-categories.create');
    Route::post('/tips-categories', [TipsCategoryController::class, 'store'])->name('tips-categories.store');

    // Show a specific tips category (if needed)
    Route::get('tips-categories/{tipscategory}', [TipsCategoryController::class, 'show'])->name('tips-categories.show');

    // Edit a specific tips category
    Route::get('/tips-categories/{id}/edit', [TipsCategoryController::class, 'edit'])->name('tips-categories.edit');
    Route::put('/tips-categories/{id}', [TipsCategoryController::class, 'update'])->name('tips-categories.update');

    // Delete a specific tips category
    Route::delete('/tips-categories/{id}', [TipsCategoryController::class, 'destroyTips'])->name('tips-categories.destroy');

    Route::get('edit-kata-laluan', function () {
        return view('user.edit-kata-laluan');
    })->name('edit-kata-laluan');

    Route::get('tambah-senarai', function () {
        return view('admin.admin-add-milestone');
    })->name('add-milestone');

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('session/login-session-copy');
})->name('login');

//Route::get('/maklumat-pengguna', function () {return view('user.user-fill-form');})->name('userInfo')->middleware('auth');

// Handle form submission and redirect to the dashboard
