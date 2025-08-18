<?php

// --- Core Laravel Imports ---
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

// --- Application Controllers Imports (Grouped by Module/Purpose) ---

// Canadian Citizenship Module Controllers
use App\Http\Controllers\CanadianCitizenship\BlogController;
use App\Http\Controllers\CanadianCitizenship\CommentController;
use App\Http\Controllers\CanadianCitizenship\CourseController;
use App\Http\Controllers\CanadianCitizenship\DashboardController; // Assuming this is for a custom admin dashboard
use App\Http\Controllers\CanadianCitizenship\DrivingController;
use App\Http\Controllers\ReadingResourceController; // These are outside the module namespace
use App\Http\Controllers\DrivingResourceController; // but related to course content

// General Application Controllers
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PaymentRegisterController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PaymentRequestController; // Not used in provided snippet, but good to keep if exists
use App\Http\Controllers\PasswordChangeController;
// Free Quiz Controllers (ensure these are correctly named in app/Http/Controllers)
use App\Http\Controllers\FreeCitizenshipQuizController;
use App\Http\Controllers\FreeDriverQuizController;

// --- Model Imports (as needed for route callbacks, though better handled in controllers) ---
use App\Models\Post;
// use App\Models\CourseSection; // Not directly used in routes, but common for reference

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// =========================================================================
// PUBLIC FACING ROUTES
// These routes are accessible to all users (authenticated or guests).
// =========================================================================

// Landing Page
Route::get('/', [LandingPageController::class, 'home'])->name('home');

// Customer Testimonials
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store'); // Consider moving to authenticated if only logged-in users can leave testimonials

// General Pages (simple views)
Route::view('/purchase', 'pages.purchase')->name('purchase');
Route::view('/buy-now', 'pages.buy-now')->name('buy-now');
Route::view('/faqs', 'pages.faqs')->name('faqs');
Route::view('/free-test', 'frontend.canadian-citizenship.free-test')->name('free-test'); // For free citizenship quiz button
Route::view('/canadian-citizenship-prep', 'frontend.canadian-citizenship.canadian-citizenship-prep')->name('canadian-citizenship-prep');
Route::view('/about', 'pages.about')->name('about');
Route::get('/terms-of-use', function () { return view('terms'); })->name('terms-of-use');
Route::get('/policy', function () { return view('policy'); })->name('policy');
Route::get('/disclaimer', function () { return view('disclaimer'); })->name('disclaimer');
Route::get('/cookie-policy', function () { return view('cookie'); })->name('cookie-policy');
Route::get('/copyright', function () { return view('copyright'); })->name('copyright');
Route::get('/contactus', function () { return view('contactus'); })->name('contactus');

 // Course Payment Registration (assuming registration form itself is public, but this route requires auth)
    // If 'register' leads to a form accessible to guests, only the POST route might need auth.
Route::get('/register-payment', [PaymentRegisterController::class, 'showRegistrationForm'])->name('register.payment');
Route::post('/register-payment', [PaymentRegisterController::class, 'register']);


// Blog and Citizenship Info (Public access to articles)
Route::prefix('canadian-citizenship')->group(function () {
    Route::get('/info', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/info/{slug}', [BlogController::class, 'show'])->name('citizenship-info.show');
});

// Citizenship Tips (Public access to blog posts, uses a model directly in route for simplicity)
Route::get('/citizenship-tips', function () {
    $posts = Post::where('status', 'PUBLISHED')->latest()->paginate(10);
    return view('pages.tips', compact('posts'));
})->name('citizenship.tips');

// Free Quiz Routes (Public, no authentication required for these specific free quizzes)
Route::get('/free-quiz', [FreeCitizenshipQuizController::class, 'showQuiz'])->name('free-quiz.show');
Route::post('/free-quiz', [FreeCitizenshipQuizController::class, 'submitQuiz'])->name('free-quiz.submit');

Route::get('/free-driver-quiz', [FreeDriverQuizController::class, 'showQuiz'])->name('free-driver-quiz.show');
Route::post('/free-driver-quiz', [FreeDriverQuizController::class, 'submitQuiz'])->name('free-driver-quiz.submit');

// Language switch route
Route::get('/language-switch/{locale}', function ($locale) {
    if ($locale === 'more') {
        return redirect('/all-languages');
    }
    // Updated with 'zh' for Mandarin and 'pa' for Punjabi
    if (in_array($locale, ['en', 'fr', 'ar', 'so', 'es', 'zh', 'pa'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('language.switch');


// =========================================================================
// AUTHENTICATED ROUTES
// These routes require the user to be logged in.
// =========================================================================

Route::middleware(['auth'])->group(function () {

    // Forced Password Change (if user must change password after initial login)
    Route::get('/change-password', function () {
        return view('auth.change-password');
    })->name('password.change.form');
    Route::put('/password-update', [PasswordChangeController::class, 'update'])->name('password.update.custom');

    // Comment Routes (requiring authentication to interact)
    // Note: If 'store' can be public, it should be moved out of this group.
    Route::post('/canadian-citizenship/info/{blog}/comment', [CommentController::class, 'store'])->name('citizenship-info.comment');
    Route::get('/canadian-citizenship/comment/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::put('/canadian-citizenship/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/canadian-citizenship/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::patch('/canadian-citizenship/comment/{comment}/approve', [CommentController::class, 'approve'])->name('comment.approve');

});

// =========================================================================
// PROTECTED COURSE CONTENT ROUTES
// These routes require authentication AND specific access checks ('check.test.access').
// =========================================================================

Route::prefix('canadian-citizenship')->middleware(['auth', 'check.test.access'])->group(function () {
    // Citizenship Courses (Quizzes)
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/save-progress', [CourseController::class, 'saveProgress'])->name('courses.save-progress');
    Route::post('/courses/{id}/reset-progress', [CourseController::class, 'resetProgress'])->name('courses.reset-progress');

    // Citizenship Reading Resources
    Route::get('/courses/{section}/reading-resources', [ReadingResourceController::class, 'show'])->name('courses.reading-resources');

    // Driving Course Quizzes
    Route::get('/driving-courses', [DrivingController::class, 'index'])->name('driving.index');
    Route::get('/driving-courses/{id}', [DrivingController::class, 'show'])->name('driving.show');
    Route::post('/driving-courses/save-progress', [DrivingController::class, 'saveProgress'])->name('driving.save-progress');
    Route::post('/driving-courses/{id}/reset-progress', [DrivingController::class, 'resetProgress'])->name('driving.reset-progress');

    // Driving Resource Pages
    Route::get('/driving-courses/{section}/driving-resources', [DrivingResourceController::class, 'show'])->name('driver-courses.driving-resources');
});


// =========================================================================
// ADMIN AREA ROUTES (Managed by Filament)
// Filament automatically registers its own '/admin' routes, including login,
// dashboard, and resources. Do NOT manually define '/admin/login' here,
// as it will conflict. Access is handled via Filament's PanelProvider.
// =========================================================================

// If you have any custom admin-only routes *outside* of Filament's managed resources,
// define them here. Filament's built-in access control should be sufficient.
// This is for your custom admin dashboard if you still use it.
// Route::prefix('admin')->middleware(['auth', 'check.role'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });
