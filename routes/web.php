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
use App\Http\Controllers\MemberEventRegisterController;
use App\Http\Controllers\GuestEventRegisterController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Landing Page
Route::get('/', [AboutController::class, 'index'])->name('landing.index');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/{slug}', [BlogController::class, 'detailBlog'])->name('blog.detail');
Route::post('/submit-blog', [BlogController::class, 'store'])->name('blog.submit');

// Event Routes untuk Guest
Route::get('/event', [EventController::class, 'index'])->name('events.index');
Route::get('/event/list-event', [EventController::class, 'list'])->name('guest.events.list');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/event/upcoming', [EventController::class, 'upcoming'])->name('events.upcoming');
Route::get('/event/finished', [EventController::class, 'finished'])->name('events.finished');

// Registrasi Event untuk Guest - PERBAIKAN DI SINI
Route::get('/event/registrasi-event/{id}', [EventController::class, 'showRegistration'])->name('event.registration');
// Route::post('/event/registrasi-event/{id}', [EventController::class, 'processRegistration'])->name('event.registration.submit');
Route::view('/event/success-registrasi', 'guest.events.success')->name('event.registration.success');
Route::post('/guest/events/register', [GuestEventRegisterController::class, 'store'])
    ->name('guest.register');
Route::post('/event/check-certificate', [EventController::class, 'checkCertificate'])->name('certificate.check');



// Route untuk Member (Login Required)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard-member', [DashboardController::class, 'index'])
        ->name('member.dashboard.index');

    // Detail event untuk member
    Route::get('/dashboard-member/events/{id}', [DashboardController::class, 'showMember'])
        ->name('member.events.show');

    // Registrasi event untuk member - GUNAKAN NAME YANG BERBEDA
    Route::get('/member/event/registrasi-event/{id}', [DashboardController::class, 'register'])->name('member.event.registration');
    Route::post('/member/event/{eventId}/register', [MemberEventRegisterController::class, 'store'])
        ->name('member.event.registration.submit');

    // Halaman success setelah registrasi
    Route::view('/event/success', 'member.dashboard.successEvent')->name('member.dashboard.successEvent');

    // History event
    Route::get('/riwayat-pendaftaran', [HistoryController::class, 'index'])->name('history.index');
    Route::get('/riwayat-pendaftaran/{id}', [HistoryController::class, 'show'])->name('history.show');

    // Data Diri
    Route::get('/data-diri', [DataDiriController::class, 'index'])->name('member.datadiri.index');
    Route::post('/data-diri', [DataDiriController::class, 'storeOrUpdate'])->name('member.datadiri.save');
});

// Success page (bisa diakses tanpa auth)
Route::get('/data-diri/success', function () {
    return view('member.layouts.succes');
})->name('layouts.success');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
