<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ReadingResourceController; 

// --- Imports ---
// Modularized Controllers
use App\Http\Controllers\CanadianCitizenship\BlogController;
use App\Http\Controllers\CanadianCitizenship\CommentController;
use App\Http\Controllers\CanadianCitizenship\CourseController;
use App\Http\Controllers\CanadianCitizenship\DashboardController;
use App\Http\Controllers\CanadianCitizenship\DrivingController;

// Non-Modularized Controllers (for now)
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PaymentRegisterController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PaymentRequestController;
use App\Http\Controllers\PasswordChangeController;
use App\Http\Controllers\FreeQuizController;

// Other necessary imports
use App\Models\Post;
use App\Models\CourseSection;



// ----------------------------------------------------
// --- ROUTES FOR CANADIAN CITIZENSHIP MODULE ---
// ----------------------------------------------------
Route::prefix('canadian-citizenship')->group(function () {
    // Blog Routes (generally public, but comment routes require auth)
    Route::get('/info', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/info/{slug}', [BlogController::class, 'show'])->name('citizenship-info.show');

    // Comment Routes - require authentication
    Route::post('/info/{blog}/comment', [CommentController::class, 'store'])->name('citizenship-info.comment');
    Route::middleware('auth')->group(function () {
        Route::get('/comment/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
        Route::put('/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');
        Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
        Route::patch('/comment/{comment}/approve', [CommentController::class, 'approve'])->name('comment.approve');
    });

    // Citizenship Courses Routes - Protected by 'auth' and 'check.test.access'
    // This group ensures all routes within it are authenticated and checked for user_type access.
    Route::middleware(['auth', 'check.test.access'])->group(function () {
        Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
        Route::post('/courses/save-progress', [CourseController::class, 'saveProgress'])->name('courses.save-progress');
        Route::post('/courses/{id}/reset-progress', [CourseController::class, 'resetProgress'])->name('courses.reset-progress');
    });
    Route::get('/courses/{section}/reading-resources', [ReadingResourceController::class, 'show'])
    ->name('courses.reading-resources');

    // Driving Course Routes - Protected by 'auth' and 'check.test.access'
    // These routes are also nested under the 'canadian-citizenship' prefix for organization
    Route::middleware(['auth', 'check.test.access'])->group(function () {
        Route::get('/driving-courses', [DrivingController::class, 'index'])->name('driving.index');
        Route::get('/driving-courses/{id}', [DrivingController::class, 'show'])->name('driving.show');
        Route::post('/driving-courses/save-progress', [DrivingController::class, 'saveProgress'])->name('driving.save-progress');
        Route::post('/driving-courses/{id}/reset-progress', [DrivingController::class, 'resetProgress'])->name('driving.reset-progress');
    });
});


//Free Quiz Routes (No change, generally public)
Route::get('/free-quiz', [FreeQuizController::class, 'showQuiz'])->name('free-quiz.show');
Route::post('/free-quiz', [FreeQuizController::class, 'submitQuiz'])->name('free-quiz.submit');

// ----------------------------------------------------
// --- OTHER APPLICATION ROUTES ---
// ----------------------------------------------------
// Landing Page (no change)
Route::get('/', [LandingPageController::class, 'home'])->name('home');

// Customer Testimonials (no change)
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

// Pages (no change)
Route::view('/purchase', 'pages.purchase')->name('purchase');
Route::view('/free-test', 'frontend.canadian-citizenship.free-test')->name('free-test');
Route::view('/canadian-citizenship-prep', 'frontend.canadian-citizenship.canadian-citizenship-prep')->name('canadian-citizenship-prep');
Route::view('/about', 'pages.about')->name('about');

// Post Routes (no change)
Route::get('/citizenship-tips', function () {
    $posts = Post::where('status', 'PUBLISHED')->latest()->paginate(10);
    return view('pages.tips', compact('posts'));
})->name('citizenship.tips');

// Course Payment Registration (no change)
Route::get('/register-payment', [PaymentRegisterController::class, 'showRegistrationForm'])->name('register.payment');
Route::post('/register-payment', [PaymentRegisterController::class, 'register']);

// 🌐 Language switch route (no change)
Route::get('/language-switch/{locale}', function ($locale) {
    if ($locale === 'more') {
        return redirect('/all-languages');
    }
    if (in_array($locale, ['en', 'fr', 'ar', 'so', 'es'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('language.switch');


// ----------------------------------------------------
// --- ADMIN AREA ROUTES (Managed by Filament) ---
// ----------------------------------------------------
// **IMPORTANT:** Filament typically registers its own '/admin' routes, including login,
// automatically. Do NOT manually define '/admin/login' here, as it will conflict.
// If you access /admin, Filament's middleware should direct you to its login.

// This group continues to protect your custom dashboard if you still use it.
Route::prefix('admin')->middleware(['auth', 'check.role'])->group(function () {
    // This is for your custom dashboard if you still use it.
    // Filament will have its own dashboard, typically just at /admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// ----------------------------------------------------
// --- AUTHENTICATED & PROTECTED ROUTES (General) ---
// ----------------------------------------------------
// This group handles general authenticated routes not specific to course types or admin areas.
Route::middleware(['auth'])->group(function () {
    // This is the dedicated route for the *forced* password change form.
    Route::get('/change-password', function () {
        return view('auth.change-password');
    })->name('password.change.form');

    // Handle the password update with our custom controller
    Route::put('/password-update', [PasswordChangeController::class, 'update'])->name('password.update.custom');
});

// Add any other routes your application needs here
