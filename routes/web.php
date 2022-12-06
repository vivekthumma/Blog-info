<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontTheme\FrontThemeController;
use App\Http\Controllers\FrontTheme\FrontHomeController;

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

Route::get('/', function () {
    return view('welcome');
});

//AuthController group Route
Route::middleware("auth")->group(function(){
    
    // ProductController Route
    Route::post('subcategory/get-subcategory',[ProductController::class, 'fetchSubCategory'])->name('get-subcategory');
    Route::resource('product',ProductController::class);

    //SubCategoryController Route

    Route::resource('subcategory',SubCategoryController::class);

    //CategoryController Route
    Route::resource('category', CategoryController::class);

    //UserController Route
    Route::resource('user', UserController::class);

    //AdminHomeController
    Route::get('dashboard',[AdminHomeController::class,'dashboard'])->name('admin.dashboard');
    Route::get('home',[AdminHomeController::class,'home'])->name('admin.home');
});

// AuthController
Route::get('login', [AuthController::class, 'login'])->name('login'); 
Route::post('post-login',[AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register'); 
Route::post('post-registration',[AuthController::class, 'postRegistration'])->name('register.post'); 
Route::post('logout',[AuthController::class, 'logout'])->name('logout');

// ForgotPasswordController
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


//FrontHomeController
Route::get('/',[FrontHomeController::class,'home'])->name('home');
Route::get('about',[FrontHomeController::class,'about'])->name('about');
Route::get('brand',[FrontHomeController::class,'brand'])->name('brand');
Route::get('contact',[FrontHomeController::class,'contact'])->name('contact');
Route::get('blog',[FrontHomeController::class,'blog'])->name('blog');
Route::get('testimonial',[FrontHomeController::class,'testimonial'])->name('testimonial');

Route::get('detail/{slug}',[FrontHomeController::class, 'showdetailpage'])->name('detail');
