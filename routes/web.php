<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth; // Added to allow Auth::user() in route closure
use App\Http\Controllers\VoyagerAuthController;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\Post;
use App\Http\Controllers\PaymentRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentRegisterController;
use Laravel\Jetstream\Jetstream; // Added for Jetstream::hasApiFeatures()
// Removed: use Laravel\Fortify\Fortify; // ✅ This import is no longer needed here

// Removed: Fortify::routes(); // ✅ This call is permanently removed from here

// // Blog Routes
Route::get('/citizenship-info', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/citizens-info/{slug}', [BlogController::class, 'show'])->name('blogs.show');

//Post Routes
Route::get('/citizenship-tips', function () {
    $posts = Post::where('status', 'PUBLISHED')->latest()->paginate(10);
    return view('pages.tips', compact('posts'));
})->name('citizenship.tips');


//Course payment registration routes
Route::get('/register-payment', [PaymentRegisterController::class, 'showRegistrationForm'])->name('register.payment');
Route::post('/register-payment', [PaymentRegisterController::class, 'register']);


// Comment Routes
Route::post('/citizenship-info/{blog}/comment', [CommentController::class, 'store'])->name('blogs.comment');

// Optional future features:
Route::get('/comment/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::put('/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
Route::patch('/comment/{comment}/approve', [CommentController::class, 'approve'])->name('comment.approve');


// Landing Page Routes
Route::get('/', [LandingPageController::class, 'home'])->name('home');
//customer testimonials
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');


//Pages Routes
Route::view('/purchase', 'pages.purchase')->name('purchase');
Route::view('/free-test', 'frontend.canadian-citizenship.free-test')->name('free-test');
Route::view('/canadian-citizenship-prep', 'frontend.canadian-citizenship.canadian-citizenship-prep')->name('canadian-citizenship-prep');
Route::view('/about', 'pages.about')->name('about');


//Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');


// 🌐 Language switch route
Route::get('/language-switch/{locale}', function ($locale) {
    if ($locale === 'more') {
        return redirect('/all-languages'); // You can show a page with all available translations
    }

    if (in_array($locale, ['en', 'fr', 'ar', 'so', 'es'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }

    return redirect()->back();
})->name('language.switch');


// ✅ Authentication-related routes that require a logged-in user
Route::middleware(['auth'])->group(function () {
    // This is the dedicated route for the *forced* password change form.
    // It should NOT have 'password.change.required' middleware to avoid infinite loops.
    Route::get('/change-password', function () {
        return view('auth.change-password');
    })->name('password.change.form');

    // Fortify's default user-password.update route is provided by Fortify::routes()
    // (which is loaded via FortifyServiceProvider in bootstrap/app.php)

    // If you have API token features and want a route for them:
    if (Jetstream::hasApiFeatures()) {
        Route::get('/user/api-tokens', \Laravel\Jetstream\Http\Controllers\ApiTokenController::class)->name('api-tokens.index');
    }
});


// Authenticated frontend routes - These routes require a verified email AND a changed password
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', // Ensures email is verified
    'password.change.required', // Ensures temporary password is changed
])->group(function () {
    //Route::get('/dashboard', function () {
        //return view('dashboard');
    //})->name('dashboard');

   Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

    // Your protected courses.show route:
    Route::get('/courses/{id}', [CourseController::class, 'show'])
        ->middleware('check.role') // Your custom role check middleware
        ->name('courses.show');

    // Add any other routes that should be inaccessible until password is changed
    // e.g., Route::get('/settings', ...);
});

// Fortify's default login/register routes (if you're using them alongside your custom one)
// These are usually handled by Fortify::routes() in FortifyServiceProvider.
// If you've commented out Features::registration() in config/fortify.php,
// then the default /register route won't exist unless you define it here.
// Example:
// Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
// Route::post('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
// Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
