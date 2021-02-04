<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/products', [ProductController::class, 'showall'])->name('products.page');
Route::post('/products', [ProductController::class, 'showall'])->name('product.page');
Route::view('/add-product', 'add-product');
Route::post('/add-product', [ProductController::class, 'store'])->name('addproduct.page');
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('editproduct.page');
Route::patch('/edit-product/{id}', [ProductController::class, 'update'])->name('updateproduct.page');
Route::get('/products/{id}', [ProductController::class, 'delete'])->name('productdelete.page');
Route::get('/view-product/{id}', [ProductController::class, 'view'])->name('viewproduct.page');