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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group([
    'middleware'    => ['web','auth'],
    'prefix' => 'admin'
], function() {
    /*Dashboard*/
    Route::get('', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    /*Companies*/
    Route::get('/companies', [\App\Http\Controllers\CompaniesController::class, 'index'])->name('admin.companies.index');
    Route::get('/add-company-form', [\App\Http\Controllers\CompaniesController::class, 'addForm'])->name('admin.company.add.form');
    Route::post('/add-company', [\App\Http\Controllers\CompaniesController::class, 'add'])->name('admin.company.add');
    Route::get('/edit-company/{id}', [\App\Http\Controllers\CompaniesController::class, 'editForm'])->name('admin.company.edit.form');
    Route::post('/edit-company', [\App\Http\Controllers\CompaniesController::class, 'edit'])->name('admin.company.edit');
    Route::get('/company-delete/{id}', [\App\Http\Controllers\CompaniesController::class, 'delete'])->name('admin.company.delete');
    /*Clients*/
    Route::get('/clients', [\App\Http\Controllers\ClientsController::class, 'index'])->name('admin.clients.index');
    Route::get('/add-client-form', [\App\Http\Controllers\ClientsController::class, 'addForm'])->name('admin.client.add.form');
    Route::post('/add-client', [\App\Http\Controllers\ClientsController::class, 'add'])->name('admin.client.add');
    Route::get('/edit-client/{id}', [\App\Http\Controllers\ClientsController::class, 'editForm'])->name('admin.client.edit.form');
    Route::post('/edit-client', [\App\Http\Controllers\ClientsController::class, 'edit'])->name('admin.client.edit');
    Route::get('/client-delete/{id}', [\App\Http\Controllers\ClientsController::class, 'delete'])->name('admin.client.delete');
});

