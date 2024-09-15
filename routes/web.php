<?php

use App\Http\Controllers\ChangePasswordController;
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
Route::get('/password/change', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/password/change', [PasswordController::class, 'changePassword'])->name('password.update');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('paparan-utama', function () {
		return view('user-dashboard');
	})->name('user-dashboard');

	Route::get('graf-tumbesaran-anak', function () {
		return view('growth-charts');
	})->name('growth-charts');

	Route::get('rekod-maklumat-tumbesaran', function(){
		return view('add-growth');
	})->name('add-growth');

	Route::get('senarai-perkembangan', function(){
		return view('checklist-milestone');
	})->name('checklist-milestone');

	Route::get('pencapaian-perkembangan', function(){
		return view('child-milestone');
	})->name('child-milestone');

	Route::get('m-chat', function(){
		return view('m-chat');
	})->name('m-chat');

	Route::get('ujian-mchat', function(){
		return view('test-mchat');
	})->name('ujian-mchat');

	Route::get('keputusan-ujian', function(){
		return view('test-result');
	})->name('test-result');


    Route::get('tips-dan-intervensi', function () {
		return view('tips-interventions');
	})->name('tips-dan-intervensi');

    Route::get('tips1', function () {
		return view('tips1');
	})->name('tips1');

    Route::get('interventions1', function () {
		return view('interventions1');
	})->name('interventions1');

	Route::get('admin-dashboard', function () {
		return view('admin-dashboard');
	})->name('admin-dashboard');

    Route::get('admin-tips', function () {
		return view('admin-tips');
	})->name('admin-tips');

    Route::get('admin-interventions', function () {
		return view('admin-interventions');
	})->name('admin-interventions');

    Route::get('admin-tips-interventions', function () {
		return view('admin-tips-interventions');
	})->name('admin-tips-interventions');

	Route::get('senarai-pencapaian-perkembangan', function () {
		return view('admin-milestone-checklist');
	})->name('list-milestone');

	Route::get('tambah-senarai', function () {
		return view('admin-add-milestone');
	})->name('add-milestone');

	Route::get('kemaskini-senarai', function () {
		return view('admin-edit-milestone');
	})->name('edit-milestone');



    Route::get('profil-pengguna', function () {
		return view('profil-pengguna');
	})->name('profil');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
    Route::get('/profil-pengguna', [InfoUserController::class, 'create']);
	Route::post('/profil-pengguna', [InfoUserController::class, 'store']);
	//Route::get('/user-profile', [InfoUserController::class, 'create']);
	//Route::post('/user-profile', [InfoUserController::class, 'store']);
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

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
