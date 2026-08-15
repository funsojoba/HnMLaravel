<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// ---------- Public pages ----------
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/about/mission', [PageController::class, 'aboutMission'])->name('about.mission');
Route::get('/about/vision', [PageController::class, 'aboutVision'])->name('about.vision');
Route::get('/about/values', [PageController::class, 'aboutValues'])->name('about.values');
Route::get('/about/leadership', [PageController::class, 'aboutLeadership'])->name('about.leadership');
Route::get('/about/caregiver-support-model', [PageController::class, 'aboutSupportModel'])->name('about.support-model');
Route::get('/give-help', [PageController::class, 'giveHelp'])->name('give-help');
Route::get('/community', [PageController::class, 'community'])->name('community');
Route::get('/impact', [PageController::class, 'impact'])->name('impact');
Route::get('/chapters', [PageController::class, 'chapters'])->name('chapters');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/volunteer', [PageController::class, 'volunteer'])->name('volunteer');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/programs', [PageController::class, 'programsIndex'])->name('programs');
Route::get('/program/{slug}', [PageController::class, 'program'])->name('program');

// Calendar feed used by the homepage + events page
Route::get('/api/events', [PageController::class, 'eventsJson'])->name('events.json');

// ---------- Donations (Stripe) ----------
Route::get('/donate', [DonationController::class, 'index'])->name('donate');
Route::post('/donate/checkout', [DonationController::class, 'checkout'])->name('donate.checkout');
Route::get('/donate/success', [DonationController::class, 'success'])->name('donate.success');
Route::post('/stripe/webhook', [DonationController::class, 'webhook'])->name('stripe.webhook');

// ---------- Public forms ----------
Route::post('/forms/{type}', [FormController::class, 'store'])
    ->whereIn('type', ['support', 'volunteer', 'chapter', 'sponsorship', 'contact'])
    ->name('forms.store');

// ---------- Admin ----------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/donations', [AdminController::class, 'donations'])->name('donations');
        Route::get('/submissions/{type?}', [AdminController::class, 'submissions'])->name('submissions');
        Route::post('/submissions/{submission}/read', [AdminController::class, 'markRead'])->name('submissions.read');

        Route::get('/events', [EventController::class, 'index'])->name('events.index');
        Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/events', [EventController::class, 'store'])->name('events.store');
        Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
        Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    });
});
