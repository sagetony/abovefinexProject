<?php

use App\Http\Controllers\addinterestController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\admindepositController;
use App\Http\Controllers\adminfundController;
use App\Http\Controllers\adminlogoutController;
use App\Http\Controllers\adminprofileController;
use App\Http\Controllers\adminrefController;
use App\Http\Controllers\adminsupport;
use App\Http\Controllers\adminuserController;
use App\Http\Controllers\adminwithController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\deposit;
use App\Http\Controllers\deposithistory;
use App\Http\Controllers\edituser;
use App\Http\Controllers\fundController;
use App\Http\Controllers\emailconfirm;
use App\Http\Controllers\login;
use App\Http\Controllers\loginadminController;
use App\Http\Controllers\logout;
use App\Http\Controllers\passwordemail;
use App\Http\Controllers\payment;
use App\Http\Controllers\profile;
use App\Http\Controllers\referral;
use App\Http\Controllers\regadminController;
use App\Http\Controllers\register;
use App\Http\Controllers\resetpassword;
use App\Http\Controllers\support;
use App\Http\Controllers\walletadmincontroller;
use App\Http\Controllers\withdraw;
use App\Http\Controllers\withdrawhistory;
use App\Mail\emailVerify;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', [dashboard::class, 'index'])->name('dashboard');

Route::get('/profile', [profile::class, 'index'])->name('profile');
Route::post('/profile', [profile::class, 'updateprofile'])->name('profile');
Route::post('/profileimage', [profile::class, 'photoupdate'])->name('profileimage');
Route::post('/profilepass', [profile::class, 'updatepassword'])->name('profilepass');

Route::get('/deposit', [deposit::class, 'index'])->name('deposit');
Route::post('/deposit', [deposit::class, 'store'])->name('deposit');

Route::get('/payment', [payment::class, 'index'])->name('payment');

Route::get('/deposithistory', [deposithistory::class, 'index'])->name('deposithistory');

Route::get('/withdraw', [withdraw::class, 'index'])->name('withdraw');
Route::post('/withdraw', [withdraw::class, 'store'])->name('withdraw');
Route::any('/withdrawal', [withdraw::class, 'redi'])->name('withdrawal');

Route::get('/withdrawhistory', [withdrawhistory::class, 'index'])->name('withdrawhistory');
Route::get('/referral', [referral::class, 'index'])->name('referral');

Route::get('/support', [support::class, 'index'])->name('support');
Route::post('/support', [support::class, 'store'])->name('support');

Route::get('/register', [register::class, 'index'])->name('register');
Route::post('/register', [register::class, 'store'])->name('register');

Route::get('/login', [emailconfirm::class, 'index'])->name('useremail');

Route::get('/login', [login::class, 'index'])->name('login');
Route::post('/login', [login::class, 'store'])->name('login');

Route::get('/logout', [logout::class, 'logout'])->name('logout');

Route::any('/wallet', [fundController::class, 'index'])->name('fund');
Route::post('/verify', [fundController::class, 'verify'])->name('verify');

// Route::get('/', function(){
//         return view('user.home');
// })->name('home');

// Route::get('/about', function(){
//     return view('user.about');
// })->name('about');
// Route::get('/plan', function(){
//     return view('user.plan');
// })->name('plan');

// Route::get('/contact', function(){
//     return view('user.contact');
// })->name('contact');

// Route::get('/faq', function(){
//     return view('user.faq');
// })->name('faq');
 Route::get('/test', function(){
        return view('user.test');
    })->name('test');
Route::get('/email', function(){
    return view('email.emailverify');
})->name('email');

Route::get('/admin/register', [regadminController::class, 'index'])->name('adminregister');
Route::post('/admin/register', [regadminController::class, 'store'])->name('adminregister');

Route::get('/admin/login', [loginadminController::class, 'index'])->name('adminlogin');
Route::post('/admin/login', [loginadminController::class, 'store'])->name('adminlogin');

Route::get('/admin/profile', [adminprofileController::class, 'index'])->name('adminprofile');
Route::post('/admin/profile', [adminprofileController::class, 'updatewallet'])->name('adminprofile');
Route::post('/admin/profilepass', [adminprofileController::class, 'updateadminpassword'])->name('adminprofilepass');
Route::post('/profileeth', [adminprofileController::class, 'ethwallet'])->name('ethwallet');
Route::post('/profileltc', [adminprofileController::class, 'ltcwallet'])->name('ltcwallet');
Route::post('/profilebnb', [adminprofileController::class, 'bnbwallet'])->name('bnbwallet');
Route::post('/profilexrp', [adminprofileController::class, 'xrpwallet'])->name('xrpwallet');


Route::any('/admin', [adminController::class, 'index'])->name('admin');

Route::get('/admin/users', [adminuserController::class, 'index'])->name('adminusers');
Route::get('/admin/users/', [adminuserController::class, 'index'])->name('adminusers');
Route::get('/admin/users/', [adminuserController::class, 'index'])->name('adminusers');
Route::get('/admin/users/', [adminuserController::class, 'index'])->name('adminusers');

Route::get('admin/deposit', [admindepositController::class, 'index'])->name('admindeposit');
Route::post('admin/deposit', [admindepositController::class, 'store'])->name('admindeposit');

Route::get('/admin/funding', [adminfundController::class, 'index'])->name('adminfunding');

Route::get('/admin/support', [adminsupport::class, 'index'])->name('adminsupport');
Route::post('/admin/support', [adminsupport::class, 'sendMail'])->name('adminsupport');

Route::get('/admin/wallet', [walletadmincontroller::class, 'index'])->name('adminwallet');




Route::get('/admin/withdraw', [adminwithController::class, 'index'])->name('adminwithdraw');

Route::get('/admin/interest', [addinterestController::class, 'index'])->name('addinterest');
Route::post('/admin/interest', [addinterestController::class, 'store'])->name('addinterest');


Route::get('/admin/bonus', [adminrefController::class, 'index'])->name('adminreferral');

Route::get('/adminlogout', [adminlogoutController::class,'logout'])->name('adminlogout');

Route::get('/resetpassword', [resetpassword::class, 'index'])->name('reset');
Route::post('/resetpassword', [resetpassword::class, 'update'])->name('reset');


Route::get('/passwordrecovery', [passwordemail::class, 'index'])->name('emailp');
Route::post('/passwordrecovery', [passwordemail::class, 'email'])->name('emailp');

Route::get('/edituser', [edituser::class, 'index'])->name('edituser');
Route::post('/edituser', [edituser::class, 'store'])->name('edituser');