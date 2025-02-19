<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function () {
//     return 'Hello World';
// });

Route::get('/world', function () {
    return 'World';
});

// Route::get('/', function () {
//     return 'Selamat Datang';
// });

Route::get('/user/{name}', function ($name) {
    return 'Nama saya '.$name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-'.$postId ." Komentar ke-: ".$commentId;
});

Route::get('/articles/{id}', function ($id) {
    return 'Halaman Artikel dengan ID '.$id;
});

Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
});

// Route::get('/user/profile', function () {
//     //
// })->name('profile');

// Route::get(
//     '/user/profile',
//     [UserProfileController::class, 'show']
// )->name('profile');

// // Generating URLs...
// $url = route('profile');

// // Generating Redirects...
// return redirect()->route('profile');

// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second middleware...
//     });

// Route::get('/user/profile', function () {
//         // Uses first & second middleware...
//     });
// });

// Route::domain('{account}.example.com')->group(function () {
//     Route::get('user/{id}', function ($account, $id) {
//         //
//     });
// });

// Route::middleware('auth')->group(function () {
// 	Route::get('/user', [UserController::class, 'index']);
// 	Route::get('/post', [PostController::class, 'index']);
// 	Route::get('/event', [EventController::class, 'index']);
	
// });

Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/', [HomeController::class,'index']);

Route::get('/about', [AboutController::class,'about']);

Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

// Route::get('/greeting', function () {
// 	return view('blog.hello', ['name' => 'Keysha']);
// });

Route::get('/articles/{id}', [ArticleController::class, 'articles']);


Route::get('/greeting', [WelcomeController::class, 'greeting']);

Route::get('/home', [POSController::class, 'home']);

Route::prefix('category')->group(function() {
    route::get('/food-beverage', [ProductsController::class, 'foodBeverage']);
    route::get('/beauty-health', [ProductsController::class, 'beautyHealth']);
    route::get('/home-care', [ProductsController::class, 'homeCare']);
    route::get('/baby-kid', [ProductsController::class, 'babyKid']);
});

Route::get('/penjualan', [PenjualanController::class, 'penjualan']);

Route::get('/userPOS', [UserController::class, 'user']);