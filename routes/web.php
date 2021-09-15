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
use App\Http\Controllers\RolInput;
use App\Http\Controllers\RegisterInput;
use App\Http\Controllers\RoleUserController;

Route::get('/', function () {
    return view('index');
});

Route::get('view-records', 'MainController@index');

Route::get('/profiel', [MainController::class, 'getWeetjes']);
Route::get('/user', [MainController::class, 'getUsers']);
Route::get('/roles', [MainController::class, 'getRoles']);
Route::get('/admin', [MainController::class, 'getRoles2']);
Route::get('/welcome', [MainController::class, 'welcome']);
Route::get('/beheer', [MainController::class, 'beheer']);
Route::get('/Alle-Weetjes', [MainController::class, 'getWeetjes2']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/role', [MainController::class, 'role']);
Route::post('/role2', [RoleUserController::class, 'store']);

Route::get('/weetjes', [MainController::class, 'create']);
Route::post('/post', [FormInput::class, 'store']);

Route::get('/post/{id}/edit', [FormInput::class, 'edit'])->name('post.edit');
Route::get('/deleteWeetje/{id}', [FormInput::class, 'deleteWeetje']);
Route::post('/update', [FormInput::class, 'update']);

Route::get('/user/{id}/editUser', [RegisterInput::class, 'editUser'])->name('user.editUser');
Route::get('/deleteUser/{id}', [RegisterInput::class, 'deleteUser']);
Route::post('/updateUser', [RegisterInput::class, 'updateUser']);

Route::get('/roles/{id}/editRole', [RoleUserController::class, 'editRole'])->name('roles.editRole');
Route::get('/deleteRole/{id}', [RoleUserController::class, 'deleteRole']);
Route::post('/UpdateRole', [RoleUserController::class, 'UpdateRole']);

Route::get('/admin/{id}/editRole2', [RoleUserController::class, 'editRole2'])->name('admin.editRole2');
Route::get('/deleteRole2/{id}', [RoleUserController::class, 'deleteRole2']);
Route::post('/UpdateRole2', [RoleUserController::class, 'UpdateRole2']);

Route::get('/maps', [MainController::class, 'maps']);

Route::group(['middleware' => 'App\Http\Middleware\LidMiddleware'], function () {
    Route::match(['get', 'post'], 'profiel', [MainController::class, 'getWeetjes']);
});

Route::middleware(['Administrator'])->group(function () {
    Route::get('admin', [MainController::class, 'getRoles2']);
    Route::get('user', [MainController::class, 'getUsers']);
    Route::get('profiel', [MainController::class, 'getWeetjes']);
    Route::get('beheer', [MainController::class, 'beheer']);
});

Route::middleware(['Lid'])->group(function () {
    Route::get('profiel', [MainController::class, 'getWeetjes']);
});
