<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
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




// // Blog Routes
Route::get('/citizenship-info', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/citizenship-info/{slug}', [BlogController::class, 'show'])->name('blogs.show');

//Post Routes
Route::get('/citizenship-tips', function () {
    $posts = Post::where('status', 'PUBLISHED')->latest()->paginate(10);
    return view('pages.tips', compact('posts'));
})->name('citizenship.tips');

//Course payment routes
Route::view('/interac-purchase', 'pages.interac-purchase')->name('interac.purchase');
Route::post('/interac-purchase', [PaymentRequestController::class, 'store'])->name('interac.purchase.submit');

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
Route::view('/free-test', 'pages.free-test')->name('free-test');
Route::view('/tips', 'pages.tips')->name('tips');
Route::view('/about', 'pages.about')->name('about');


//Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
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


// Authenticated frontend routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

