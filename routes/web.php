<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\loginconteoller;
//use Auth\LoginConteoller;

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

Route::get('/', function () {
    return view('welcome');

});
Route::resource('/admin',AdminController::class)->middleware(['auth', 'isadmin']);
//users page
Route::get('/userspage', [App\Http\Controllers\AdminController::class, 'userspage'])->name('userspage');
// search button
Route::post('/admin/search', [App\Http\Controllers\AdminController::class, 'search'])->name('search');
Auth::routes(['verify'=>true]);
 //Route::get('/login/github','Auth/LoginConteoller@github');
// Route::get('/login/github/redirect','Auth\LoginController@githubRedirect');

  Route::get('/auth/github/redirect',[authcontroller::class,'githubredirect']);;
  Route::get('/auth/github/callback',[authcontroller::class,'githubcallback']);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route for userprofile
 //Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');
// Route::get('/auth/redirect', function () {
//     return Socialite::driver('github')->redirect();
// });
 
// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('github')->user();
 
//     // $user->token
// });
