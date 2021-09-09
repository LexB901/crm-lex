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

use App\Http\Controllers\MainController;
use App\Http\Controllers\FormInput;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterInput;

Route::get('/', function () {
    return view('index');
});

Route::get('view-records', 'MainController@index');

Route::get('/profiel', [MainController::class, 'getWeetjes']);
Route::get('/user', [MainController::class, 'getUsers']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/weetjes', [MainController::class, 'create']);
Route::post('/post', [FormInput::class, 'store']);


Route::get('/post/{id}/edit', [FormInput::class, 'edit'])->name('post.edit');
Route::get('/deleteWeetje/{id}', [FormInput::class, 'deleteWeetje']);
Route::post('/update', [FormInput::class, 'update']);


Route::get('/user/{id}/editUser', [RegisterInput::class, 'editUser'])->name('user.editUser');
Route::get('/deleteUser/{id}', [RegisterInput::class, 'deleteUser']);
Route::post('/updateUser', [RegisterInput::class, 'updateUser']);

Route::get('/image', [MainController::class, 'image']);
Route::post('/store', [MainController::class, 'store']);
