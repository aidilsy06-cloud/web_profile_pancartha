<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Middleware\AdminAuth;

// Public
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Auth
Route::prefix('panca-min')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware(AdminAuth::class)->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Settings (About, Hero, Contact)
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

        // Services
        Route::get('services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

        // Projects
        Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

        // Team
        Route::get('team', [TeamMemberController::class, 'index'])->name('team.index');
        Route::get('team/create', [TeamMemberController::class, 'create'])->name('team.create');
        Route::post('team', [TeamMemberController::class, 'store'])->name('team.store');
        Route::get('team/{team}/edit', [TeamMemberController::class, 'edit'])->name('team.edit');
        Route::put('team/{team}', [TeamMemberController::class, 'update'])->name('team.update');
        Route::delete('team/{team}', [TeamMemberController::class, 'destroy'])->name('team.destroy');

        // Stats
        Route::get('stats', [StatController::class, 'index'])->name('stats.index');
        Route::post('stats', [StatController::class, 'store'])->name('stats.store');
        Route::put('stats/{stat}', [StatController::class, 'update'])->name('stats.update');
        Route::delete('stats/{stat}', [StatController::class, 'destroy'])->name('stats.destroy');

        // Technologies
        Route::get('technologies', [TechnologyController::class, 'index'])->name('technologies.index');
        Route::post('technologies', [TechnologyController::class, 'store'])->name('technologies.store');
        Route::delete('technologies/{technology}', [TechnologyController::class, 'destroy'])->name('technologies.destroy');

        // Testimonials
        Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
        Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
        Route::post('testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
        Route::get('testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
        Route::put('testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update');
        Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
    });
});
