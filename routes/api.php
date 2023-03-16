<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/images', [ImageController::class, 'index'])->name('images.index');
Route::get('/images/{id}', [ImageController::class, 'show'])->name('images.show');
Route::post('/images', [ImageController::class, 'store'])->name('images.store');
Route::put('/images/{id}', [ImageController::class, 'update'])->name('images.update');
Route::delete('/images/{id}', [ImageController::class, 'destroy'])->name('images.destroy');


Route::post('/categories/{category_id}/products/{product_id}', [CategoryProductController::class, 'store'])->name('categoryproduct.store');

Route::delete('/categories/{category_id}/products/{product_id}', [CategoryProductController::class, 'destroy'])->name('categoryproduct.destroy');

Route::post('/products/{product_id}/images/{image_id}', [ProductImageController::class, 'store'])->name('productimage.store');

Route::delete('/products/{product_id}/images/{image_id}', [ProductImageController::class, 'destroy'])->name('productimage.destroy');
