<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HistoryController;



// Route::get('/', function () {
//     return view('landing.index');
// });

// Route::get('/', [LandingController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/about', [AboutController::class, 'index'])->name('about');

//route blog
// Route::view('/blog', 'guest.blog.blog')->name('blog.index');
Route::view('/blog/detailblog', 'guest.blog.detail')->name('blog.detail');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
// Route::get('/blog/{slug}', [BlogController::class, 'showDetail'])->name('blog.detail');

//route event 
Route::get ('/event', [EventController::class, 'index'])->name('events.event');
Route::view('/event/list-event', 'guest.events.list');
Route::view('/event/detail-event', 'guest.events.detail');
Route::view('/event/registrasi-event','guest.events.register');
Route::view('/event/success-registrasi','guest.events.success');

// route member
Route::middleware('auth')->group(function () {
    Route::view('/dashboard-member', 'member.dashboard.index')->name('member.dashboard.index');
    Route::get('/riwayat-pendaftaran', [HistoryController::class, 'index'])->name('member.history.index');
    Route::get('/riwayat-pendaftaran/{id}', [HistoryController::class, 'show'])->name('member.history.show');
    Route::view('/data-diri', 'member.profile.index')->name('member.profile.index');
    
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
