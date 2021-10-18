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
use App\Http\Controllers\WeetjesFormController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\SuggestieController;
use App\Http\Controllers\spendingsFormController;

Route::get('/', function () {
    return view('index');
});

Route::get('/Mijn-Rollen', [MainController::class, 'getRoles']);
Route::get('/Suggesties', [MainController::class, 'getSuggesties']);
Route::get('/test', [MainController::class, 'test']);
Route::get('/Spendings', [MainController::class, 'Spendings']);


Route::get('/Home', function () {
    return view('Home');
})->middleware(['auth'])->name('Home');

require __DIR__ . '/auth.php';


Route::get('/Spendings/{id}/edit', [spendingsFormController::class, 'edit'])->name('Spendings.edit');
Route::get('/Spendings/create', [spendingsFormController::class, 'create'])->name('Spendings.create');
Route::post('/Spendings', [SpendingsFormController::class, 'store']);
Route::post('/Spendings/{id}/update', [SpendingsFormController::class, 'update']);
Route::get('/Spendings/{id}/delete', [SpendingsFormController::class, 'delete']);
Route::get('/{id}/delete', [SpendingsFormController::class, 'delete']);


Route::get('/WeetjesForm', [MainController::class, 'create']);
Route::post('/Form', [WeetjesFormController::class, 'store']);
Route::post('/Suggestie', [SuggestieController::class, 'store']);

Route::get('/WeetjesForm/{id}/edit', [WeetjesFormController::class, 'edit'])->name('Form.edit');
Route::get('/deleteWeetje/{id}', [WeetjesFormController::class, 'deleteWeetje']);
Route::post('/update', [WeetjesFormController::class, 'update']);

Route::get('/User-Beheer/{id}/editUser', [RegisterUserController::class, 'editUser'])->name('User-Beheer.editUser');
Route::get('/deleteUser/{id}', [RegisterUserController::class, 'deleteUser']);
Route::post('/updateUser', [RegisterUserController::class, 'updateUser']);
Route::post('/banUser/{id}', [RegisterUserController::class, 'banUser']);
Route::get('/deleteSession/{_token}', [RegisterUserController::class, 'deleteSession']);

Route::get('/Mijn-Rollen/{id}/editRole', [RoleUserController::class, 'editRole'])->name('Mijn-Rollen.editRole');
Route::get('/deleteRole/{id}', [RoleUserController::class, 'deleteRole']);
Route::post('/UpdateRole', [RoleUserController::class, 'UpdateRole']);

Route::get('/Rollen-Beheer/{id}/editRole', [RoleUserController::class, 'editRole'])->name('Rollen-Beheer.editRole');
Route::post('/UpdateRole', [RoleUserController::class, 'updateRole']);

Route::get('/Rollen-Beheer/{id}/editRoleAdmin', [RoleUserController::class, 'editRoleAdmin'])->name('Rollen-Beheer.editRoleAdmin');
Route::post('/UpdateRole2', [RoleUserController::class, 'updateRole2']);

Route::get('/Suggesties/{id}/editSuggestie', [SuggestieController::class, 'editSuggestie'])->name('suggestie.editSuggestie');
Route::get('/deleteSuggestie/{id}', [SuggestieController::class, 'deleteSuggestie']);
Route::post('/updateSuggestie', [SuggestieController::class, 'updateSuggestie']);

Route::get('/maps', [MainController::class, 'maps']);

Route::middleware(['Administrator'])->group(function () {
    Route::get('Rollen-Beheer', [MainController::class, 'getRoles2']);
    Route::get('User-Beheer', [MainController::class, 'getUsers']);
    Route::get('Weetjes-Beheer', [MainController::class, 'getWeetjes']);
    Route::get('Admin-Nav', [MainController::class, 'AdminNav']);
    Route::get('SpendingsShow', [MainController::class, 'getSpendings']);
});

Route::middleware(['Lid'])->group(function () {
    Route::get('Alle-Weetjes', [MainController::class, 'getWeetjes2']);
});
