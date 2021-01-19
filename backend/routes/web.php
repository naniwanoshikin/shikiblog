<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\BlogController;

// ブログ一覧 画面表示
Route::get('/', [BlogController::class, 'showList'])->name('blogs');
// ブログ登録
Route::get('/blog/create', [BlogController::class, 'showCreate'])->name('create'); // 画面表示
Route::post('/blog/store', [BlogController::class, 'exeStore'])->name('store'); // 登録
// ブログ詳細 画面表示
Route::get('/blog/{id}', [BlogController::class, 'showDetail'])->name('show');
// ブログ編集
Route::get('/blog/edit/{id}', [BlogController::class, 'showEdit'])->name('edit'); // 画面表示
Route::post('/blog/update', [BlogController::class, 'exeUpdate'])->name('update'); // 編集
// ブログ削除
Route::post('/blog/delete/{id}', [BlogController::class, 'exeDelete'])->name('delete');
