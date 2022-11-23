<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartControllers;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UpdateProfileController;

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



Route::get('/', function() {
    return view('welcome', [
        "title" => "Welcome",
        "active" => ""
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/profile', [ProfileController::class, 'showrole'])->middleware('auth');

Route::get('/profile/edit-profile', [UpdateProfileController::class, 'editprofile'])->middleware('auth');
Route::put('/profile/update-profile', [UpdateProfileController::class, 'updateprofile'])->middleware('auth');
Route::get('/profile/edit-password', [UpdateProfileController::class, 'editpassword'])->middleware('auth');
Route::put('/profile/update-password', [UpdateProfileController::class, 'updatepassword'])->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardProductController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardProductController::class)->middleware('auth');




Route::get('/posts', [PostController::class, 'index']);

//Start single post
Route::get('/post/{post:slug}', [PostController::class,'showpost']);
//End single post


Route::get('/categories', [PostController::class, 'showcate']);
Route::get('/categories/{category:slug}', [PostController::class, 'showcatslug']);

Route::get('/sellers/{seller:username}', [PostController::class, 'showseller']);

Route::get('/search', [SearchController::class, 'index']);

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
// Route::get('/cart/edit', [CartController::class, 'edit'])->middleware('auth');
Route::post('/cart/store/{id}', [CartController::class, 'store'])->name('cart.store')->middleware('auth');
Route::post('/cart/destroy/{id}', [CartController::class, 'destroy'])->middleware('auth');
Route::resource('/cart/product', CartControllers::class)->middleware('auth');
// Route::put('/cart/edit/{cart:id}', [CartController::class, 'update'])->middleware('auth');



