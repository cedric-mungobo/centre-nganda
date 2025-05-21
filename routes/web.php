<?php

use App\Http\Controllers\ChildrenDayController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // Fetch 3 featured posts for the homepage
    $featuredPosts = \App\Models\Post::with('user')
        ->published()
        ->featured()
        ->latest('published_at')
        ->limit(3)
        ->get();

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => false, // Désactivation de l'inscription
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'featuredPosts' => $featuredPosts,
    ]);
})->name('home');

Route::get('/services', function () {
    return Inertia::render('Services');
})->name('services');


Route::get('/radiotherapie', function () {
    return Inertia::render('Radiotherapie');
})->name('radiotherapie');

Route::get('/a-propos', function () {
    return Inertia::render('About');
})->name('about');

// Route pour le formulaire de contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Routes pour la demande de stage
Route::get('/demande-de-stage', [InternshipController::class, 'create'])->name('internship');
Route::post('/demande-de-stage', [InternshipController::class, 'store'])->name('internship.store');

// Routes pour la journée "Amenez vos enfants au travail"
Route::get('/journee-enfants', [ChildrenDayController::class, 'create'])->name('children-day');
Route::post('/journee-enfants', [ChildrenDayController::class, 'store'])->name('children-day.store');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Blog routes
Route::get('/blog', [App\Http\Controllers\PostController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('blog.show');

// Admin blog routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'adminIndex'])->name('admin.posts.index');
    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('admin.posts.destroy');

    // Routes pour la gestion des inscriptions à la journée "Amenez vos enfants au travail"
    Route::get('/admin/children-day-registrations', [App\Http\Controllers\Admin\ChildrenDayRegistrationsController::class, 'index'])->name('admin.children-day-registrations.index');
    Route::get('/admin/children-day-registrations/{registration}', [App\Http\Controllers\Admin\ChildrenDayRegistrationsController::class, 'show'])->name('admin.children-day-registrations.show');
    Route::put('/admin/children-day-registrations/{registration}/update-status', [App\Http\Controllers\Admin\ChildrenDayRegistrationsController::class, 'updateStatus'])->name('admin.children-day-registrations.update-status');
    Route::delete('/admin/children-day-registrations/{registration}', [App\Http\Controllers\Admin\ChildrenDayRegistrationsController::class, 'destroy'])->name('admin.children-day-registrations.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
