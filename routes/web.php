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
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\spendingsFormController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('/auth/login');
})->name('login');


Route::get('/expenses', [MainController::class, 'expenses'])->middleware('auth');
Route::get('/users', [MainController::class, 'users'])->middleware('auth');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

require __DIR__ . '/auth.php';

Route::get('/account', [MainController::class, 'account'])->name('change.password');
Route::get('/user/{id}/edit', [MainController::class, 'account'])->name('change.password');



Route::post('/account', [ChangePasswordController::class, 'changePassword']);
Route::post('/user/{id}/edit', [ChangePasswordController::class, 'changeUserPassword']);


Route::get('/expense/{id}/edit', [spendingsFormController::class, 'edit'])->name('expense.edit');
Route::get('/expense/create', [spendingsFormController::class, 'create'])->name('expense.create');
Route::post('/expenses', [SpendingsFormController::class, 'store']);
Route::post('/expense/{id}/update', [SpendingsFormController::class, 'update']);
Route::get('/expense/{id}/delete', [SpendingsFormController::class, 'delete']);

Route::get('/user/{id}/edit', [RegisterUserController::class, 'edit'])->name('user.edit');
Route::get('/user/create', [RegisterUserController::class, 'create'])->name('user.create');
Route::post('/users', [RegisteredUserController::class, 'store']);
Route::post('/user/{id}/update', [RegisterUserController::class, 'update']);
Route::get('/user/{id}/delete', [RegisterUserController::class, 'delete']);
Route::get('/{id}/delete', [RegisterUserController::class, 'delete']);


// Route::get('/User-Beheer/{id}/editUser', [RegisterUserController::class, 'editUser'])->name('User-Beheer.editUser');
// Route::get('/deleteUser/{id}', [RegisterUserController::class, 'deleteUser']);
// Route::post('/updateUser', [RegisterUserController::class, 'updateUser']);
Route::post('/accountUpdate', [RegisterUserController::class, 'accountUpdate']);
// Route::post('/banUser/{id}', [RegisterUserController::class, 'banUser']);
// Route::get('/deleteSession/{_token}', [RegisterUserController::class, 'deleteSession']);

Route::middleware(['Admin'])->group(function () {
    Route::get('User-Beheer', [MainController::class, 'users']);
    Route::get('Admin-Nav', [MainController::class, 'AdminNav']);
    Route::get('SpendingsShow', [MainController::class, 'getSpendings']);
});

Route::middleware(['Member'])->group(function () {
});
