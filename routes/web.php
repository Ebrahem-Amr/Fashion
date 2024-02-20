<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegesterController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $products = Product::all();
    return view('index',compact('products'));
});

Route::get('about', function () {
    return view('about');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('faq', function () {
    return view('faq');
});

Route::get('unauthorized', function () {
    return view('unauthorized');
});

Route::get('admin', function () {
    return view('admin');
})->middleware('checkAdmin');
 
 
/////////////////////////////////////////////////////////////////
Route::get('products',[ProductController::class,'index']);
Route::get('product-detail/{id}',[ProductController::class,'show']);
Route::post('my_cart/{id}',[ProductController::class,'my_cart'])->middleware('auth');
Route::delete('/remove-from-cart/{id}', [ProductController::class,'removeFromCart'])->name('removeFromCart');
Route::get('show_my_cart',[ProductController::class,'show_my_cart']);
Route::post('upload',[ProductController::class,'upload']);
Route::get('/checkout',[ProductController::class,'checkout']);



/////////////////////////////////////////////////////////////////s
Route::get('sign-in', function () {
    return view('sign-in');
})->name('login');

Route::get('sign-up', [RegesterController::class,'index']);
Route::post('sign-up/insert', [RegesterController::class,'insert']);
Route::post('sign-up/Check', [RegesterController::class,'check']);
Route::post('logout', [RegesterController::class,'logout']);
