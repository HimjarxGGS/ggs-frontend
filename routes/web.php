<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\DataDiriController;



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
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/{slug}', [BlogController::class, 'detailBlog'])->name('blog.detail');

//route event 
Route::get ('/event', [EventController::class, 'index'])->name('events.index');
Route::get('/event/list-event',[EventController::class, 'list'])->name('guest.events.list');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/event/upcoming', [EventController::class, 'upcoming'])->name('events.upcoming');
Route::get('/event/finished', [EventController::class, 'finished'])->name('events.finished');

// Route::view('/event/registrasi-event','guest.events.register');
// Route::view('/event/success-registrasi','guest.events.success');

// route member
Route::middleware('auth')->group(function () {
Route::get('/dashboard-member', [DashboardController::class, 'index'])
     ->name('member.dashboard.index');

     // detail event untuk member
    Route::get('/dashboard-member/events/{id}', [EventController::class, 'showMember'])
        ->name('member.events.show');


   // History event
    Route::get('/riwayat-pendaftaran', [HistoryController::class, 'index'])->name('history.index');
    Route::get('/riwayat-pendaftaran/{id}', [HistoryController::class, 'show'])->name('history.show');

    // Route::view('/data-diri', 'member.profile.index')->name('member.profile.index');
    
});
// Menampilkan form Data Diri
Route::get('/data-diri', [DataDiriController::class, 'index'])->name('member.datadiri.index');
// Simpan Data Diri
Route::post('/data-diri/store', [DataDiriController::class, 'store'])->name('datadiri.store');
// Update Data Diri
Route::post('/data-diri/update/{id}', [DataDiriController::class, 'update'])->name('datadiri.update');



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
