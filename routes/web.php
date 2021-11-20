<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Product\Definition;

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

Route::get('/', [AuthController::class, 'index'])->name('index');

Route::get('/login/index', [AuthController::class, 'index_login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('post.login');

Route::get('/register/index', [AuthController::class, 'index_register'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('post.register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AuthController::class, 'index_dashboard'])->name('index.dashboard');

    Route::get('/product/definition', [Definition::class, 'index'])->name('index.definition');

    Route::post('/product/definition/post', [Definition::class, 'line_item'])->name('post.definition');

    Route::get('/product/definition/{id?}', [Definition::class, 'get_line_item'])->name('get.line.item');
});
