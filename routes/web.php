<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

// --- Imports ---
// Modularized Controllers
use App\Http\Controllers\CanadianCitizenship\BlogController;
use App\Http\Controllers\CanadianCitizenship\CommentController;
use App\Http\Controllers\CanadianCitizenship\CourseController;
use App\Http\Controllers\CanadianCitizenship\DashboardController;

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
// This group simplifies routes and automatically applies the new namespace
Route::prefix('canadian-citizenship')->group(function () {
    // Blog Routes
    Route::get('/info', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/info/{slug}', [BlogController::class, 'show'])->name('citizenship-info.show');

    // Comment Routes
    Route::post('/info/{blog}/comment', [CommentController::class, 'store'])->name('citizenship-info.comment');
    Route::middleware('auth')->group(function () {
        // Optional future features:
        Route::get('/comment/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
        Route::put('/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');
        Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
        Route::patch('/comment/{comment}/approve', [CommentController::class, 'approve'])->name('comment.approve');
    });

    // Courses Routes
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
});

//Free Quiz Routes
// Route for showing the quiz.
Route::get('/free-quiz', [FreeQuizController::class, 'showQuiz'])->name('free-quiz.show');

// Route for submitting the quiz and showing results.
Route::post('/free-quiz', [FreeQuizController::class, 'submitQuiz'])->name('free-quiz.submit');

// ----------------------------------------------------
// --- OTHER APPLICATION ROUTES ---
// ----------------------------------------------------
// Landing Page
Route::get('/', [LandingPageController::class, 'home'])->name('home');

// Customer Testimonials
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

// Pages
Route::view('/purchase', 'pages.purchase')->name('purchase');
Route::view('/free-test', 'frontend.canadian-citizenship.free-test')->name('free-test');
Route::view('/canadian-citizenship-prep', 'frontend.canadian-citizenship.canadian-citizenship-prep')->name('canadian-citizenship-prep');
Route::view('/about', 'pages.about')->name('about');

// Post Routes (these should probably be modularized with blogs)
Route::get('/citizenship-tips', function () {
    $posts = Post::where('status', 'PUBLISHED')->latest()->paginate(10);
    return view('pages.tips', compact('posts'));
})->name('citizenship.tips');

// Course Payment Registration
Route::get('/register-payment', [PaymentRegisterController::class, 'showRegistrationForm'])->name('register.payment');
Route::post('/register-payment', [PaymentRegisterController::class, 'register']);


// 🌐 Language switch route
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
// --- AUTHENTICATED & PROTECTED ROUTES ---
// ----------------------------------------------------
// Authentication-related routes that require a logged-in user
Route::middleware(['auth'])->group(function () {
    // This is the dedicated route for the *forced* password change form.
    Route::get('/change-password', function () {
        return view('auth.change-password');
    })->name('password.change.form');

     // ✅ NEW ROUTE: Handle the password update with our custom controller
    Route::put('/password-update', [PasswordChangeController::class, 'update'])
        ->name('password.update.custom');

    // Dashboard route using the modularized controller
    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Protected courses.show route:
    Route::get('/courses/{id}', [CourseController::class, 'show'])
        ->middleware('check.role')
        ->name('courses.show');

    // ✅ NEW ROUTES: Routes to handle saving and resetting user progress
    Route::post('/courses/save-progress', [CourseController::class, 'saveProgress'])
        ->name('courses.save-progress');
    
    Route::post('/courses/reset-progress/{id}', [CourseController::class, 'resetProgress'])
        ->name('courses.reset-progress');
});
