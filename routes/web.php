<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;

// Route::get('/', function () {
//     return view('landing.index');
// });

// Route::get('/', [LandingController::class, 'index']);

Route::get('/', [LandingController::class, 'index'])->name('landing.index');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/about', [AboutController::class, 'index'])->name('about');


// route vlog
Route::view('/blog', 'blog.blog')->name('blog.index');
Route::view('/blog/detailblog', 'blog.detail')->name('blog.detail');

//route event 
Route:: get ('/event', [EventController::class, 'index'])->name('events.event');

// route member
Route::view('/dashboard-member', 'member.pages.dashboard')->name('member.pages.dashboard') ;
Route::view('/member-event', 'member.events.event')->name('member.events.event');
Route::view('/history', 'member.pages.history')->name('member.pages.history');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
