<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HospitalRecordController;
use App\Http\Controllers\ChatsController;

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

//Route::middleware(['auth:sanctum', 'verified'])->get('/', [App\Http\Controllers\DonationController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/', 
	function () {
    return view('users.login');
});
/*Route::get('/', function () {
    return view('posts.index');
}); */

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('donations');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('userProfile', [UserController::class, 'userProfile']);
Route::resource('profiles', UserController::class);
Route::post('profiles/{id}', [UserController::class, 'updateProfile'])->name('profiles.updateProfile');
Route::resource('posts', PostController::class);
//Route::middleware(['auth:sanctum', 'verified'])->get('/donations', [App\Http\Controllers\DonationController::class, 'index']);
Route::resource('donations', DonationController::class);
Route::resource('leave_feedback', FeedbackController::class);
Route::resource('users', UserController::class);
Route::get('/donees', [UserController::class, 'donee']);
Route::get('/donors', [UserController::class, 'donor']);
Route::resource('banks', BankController::class);
Route::post('banks/{id}',[BankController::class], 'destroy')->name('banks.delete');
//Route::resource('banks_delete', [App\Http\Controllers\BankController::class, 'delete']);
//Route::get('/doctors', [UserController::class, 'doctors']);
Route::get('/organizations', [UserController::class, 'organization']);

Route::resource('chats', ChatsController::class);
Route::get('/messages', [ChatsController::class, 'fetchMessages']);
Route::post('/sendmesssage', [ChatsController::class, 'sendMessage']);

Route::get('add_account', [AccountController::class, 'index']);
Route::resource('account', AccountController::class);
Route::resource('hospitals', HospitalController::class);
Route::post('hospitals/{id}',[HospitalController::class], 'destroy')->name('hospitals.delete');
Route::resource('doctor', DoctorController::class);
Route::resource('records', HospitalRecordController::class);


