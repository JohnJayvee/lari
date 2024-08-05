<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PlansController;


use App\Http\Controllers\SignInController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\TermsAndConditionController;

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

// Route::get('/chat', function () {
//         return view('socket');
// });

Route::get('/chat', [ChatController::class, 'index']);
Route::post('/send-message', [ChatController::class, 'sendMessage']);



// LARI main Website
Route::get('/', [HomeController::class, 'show'])->name('home');
Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/faqs', [FaqsController::class, 'show'])->name('faqs');

Route::prefix('terms-and-condition')->group(function () {
    Route::get('/', [TermsAndConditionController::class, 'show'])->name('terms-and-condition');
    Route::get('/general-terms', function () {
        return view('website.pages.terms-and-condition.general-terms');
    })->name('general-terms');
    Route::get('/subscription-agreement', function () {
        return view('website.pages.terms-and-condition.subscription-agreement');
    })->name('subscription-agreement');
    Route::get('/privacy-policy', function () {
        return view('website.pages.terms-and-condition.privacy-policy');
    })->name('privacy-policy');
    Route::get('/insurance', function () {
        return view('website.pages.terms-and-condition.insurance');
    })->name('insurance');
});

Route::get('/contact-us', [ContactUsController::class, 'show'])->name('contact-us');
Route::post('/contact-us-store', [ContactUsController::class, 'store'])->name('try1');


Route::get('/faqs', [FaqsController::class, 'show'])->name('faqs');

Route::get('/signin', [SignInController::class, 'signin'])->name('signin');

//!
Route::get('/signup', [SignInController::class, 'signup'])->name('signup');
Route::post('/signup', [SignInController::class, 'store']);
Route::get('/login', [SignInController::class, 'signin'])->name('userLogin');
Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('try');
//!








Route::get('/admin/login', function () {
    return view('admin.login');
})->name('login');
Route::post('authenticate', [UserController::class, 'authenticate'])->name('authenticate');


Route::group(['middleware' => ['auth', 'preventBackHistory']], function () {

    // account
    Route::get('logout', [UserController::class, 'logout'])->name('logout');


    // User Maintenance
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'show'])->name('user');
        Route::post('/delete', [UserController::class, 'delete'])->name('user.delete');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update', [UserController::class, 'update'])->name('user.update');
        Route::post('/create', [UserController::class, 'create'])->name('user.create');
        Route::get('/add', [UserController::class, 'add'])->name('user.add');
        Route::get('/search', [UserController::class, 'search'])->name('user.search');
        Route::get('/confirm/{id}', [UserController::class, 'confirm'])->name('user.confirm');
        Route::get('/blocking/{id}', [UserController::class, 'blocking'])->name('user.blocking');
        Route::post('/block', [UserController::class, 'block'])->name('user.block');
        Route::post('/unblock', [UserController::class, 'unblock'])->name('user.unblock');
    });

    // Level Maintenance
    Route::prefix('level')->group(function () {
        Route::get('/', [LevelController::class, 'show'])->name('level');
        Route::post('/delete', [LevelController::class, 'delete'])->name('level.delete');
        Route::get('/edit/{id}', [LevelController::class, 'edit'])->name('level.edit');
        Route::post('/update', [LevelController::class, 'update'])->name('level.update');
        Route::post('/create', [LevelController::class, 'create'])->name('level.create');
        Route::get('/add', [LevelController::class, 'add'])->name('level.add');
        Route::get('/search', [LevelController::class, 'search'])->name('level.search');
        Route::get('/confirm/{id}', [LevelController::class, 'confirm'])->name('level.confirm');
    });


    // Customer
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomersController::class, 'show'])->name('customers');
        Route::post('/delete', [CustomersController::class, 'delete'])->name('customers.delete');
        Route::get('/edit/{id}', [CustomersController::class, 'edit'])->name('customers.edit');
        Route::post('/update', [CustomersController::class, 'update'])->name('customers.update');
        Route::post('/create', [CustomersController::class, 'create'])->name('customers.create');
        Route::get('/add', [CustomersController::class, 'add'])->name('customers.add');
        Route::get('/search', [CustomersController::class, 'search'])->name('customers.search');
        Route::get('/confirm/{id}', [CustomersController::class, 'confirm'])->name('customers.confirm');

        Route::prefix('profile')->group(function () {
            Route::get('/{customerid}', [CustomersController::class, 'showMember'])->name('customers.profile');
            Route::post('/{customerid}/delete', [CustomersController::class, 'deleteMember'])->name('customers.profile.delete');
            Route::get('/{customerid}/edit/{id}', [CustomersController::class, 'editMember'])->name('customers.profile.edit');
            Route::post('/{customerid}/update', [CustomersController::class, 'updateMember'])->name('customers.profile.update');
            Route::post('/{customerid}/create', [CustomersController::class, 'createMember'])->name('customers.profile.create');
            Route::get('/{customerid}/add', [CustomersController::class, 'addMember'])->name('customers.profile.add');
            Route::get('/{customerid}/search', [CustomersController::class, 'searchMember'])->name('customers.profile.search');
            Route::get('/{customerid}/confirm/{id}', [CustomersController::class, 'confirmMember'])->name('customers.profile.confirm');
        });
    });


    // Plans
    Route::prefix('plans')->group(function () {
        Route::get('/', [PlansController::class, 'show'])->name('plans');
        Route::post('/delete', [PlansController::class, 'delete'])->name('plans.delete');
        Route::get('/edit/{id}', [PlansController::class, 'edit'])->name('plans.edit');
        Route::post('/update', [PlansController::class, 'update'])->name('plans.update');
        Route::post('/create', [PlansController::class, 'create'])->name('plans.create');
        Route::get('/add', [PlansController::class, 'add'])->name('plans.add');
        Route::get('/search', [PlansController::class, 'search'])->name('plans.search');
        Route::get('/confirm/{id}', [PlansController::class, 'confirm'])->name('plans.confirm');
    });


    // Ads
    Route::prefix('ads')->group(function () {
        Route::get('/', [AdsController::class, 'show'])->name('ads');
        Route::post('/delete', [AdsController::class, 'delete'])->name('ads.delete');
        Route::get('/edit/{id}', [AdsController::class, 'edit'])->name('ads.edit');
        Route::post('/update', [AdsController::class, 'update'])->name('ads.update');
        Route::post('/create', [AdsController::class, 'create'])->name('ads.create');
        Route::get('/add', [AdsController::class, 'add'])->name('ads.add');
        Route::get('/search', [AdsController::class, 'search'])->name('ads.search');
        Route::get('/confirm/{id}', [AdsController::class, 'confirm'])->name('ads.confirm');
    });


    // Permissions
    Route::prefix('permissions')->group(function () {
        Route::get('/', [PermissionsController::class, 'show'])->name('permissions');
        Route::post('/delete', [PermissionsController::class, 'delete'])->name('permissions.delete');
        Route::get('/edit/{id}', [PermissionsController::class, 'edit'])->name('permissions.edit');
        Route::post('/update', [PermissionsController::class, 'update'])->name('permissions.update');
        Route::post('/create', [PermissionsController::class, 'create'])->name('permissions.create');
        Route::get('/add', [PermissionsController::class, 'add'])->name('permissions.add');
        Route::get('/search', [PermissionsController::class, 'search'])->name('permissions.search');
        Route::get('/confirm/{id}', [PermissionsController::class, 'confirm'])->name('permissions.confirm');
    });


    // users profile
    // Route::get('user/{id}', [ProfileController::class, 'show'])->name('profile');


    // super admin dashboard
    Route::get('dashboard', [DashboardController::class, 'show'])->name('dashboard');


});
