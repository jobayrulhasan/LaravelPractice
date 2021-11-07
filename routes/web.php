<?php

use App\Http\Controllers\PostController;
use app\person;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// app()->bind('firstBind', person::class); //this is for service binding

Route::get('/', function () {
    // dd(app()); //di damp
    $name = app()->make('firstBind');
    $name->setName('Jobayrul Hasan');
    echo $name->getName();
    die;
    return view('welcome');
});
Route::get('/show-data', [PostController::class, 'showData']);
Route::get('/show-data_table', [PostController::class, 'showDatatable']);
Route::get('/add-data', [PostController::class, 'addData']);
Route::post('/store-data', [PostController::class, 'storeData']);
Route::get('/edit-data/{id}', [PostController::class, 'editData']);
Route::post('/store-edit-data/{id}', [PostController::class, 'storeEditData']);
Route::get('/delete-data/{id}', [PostController::class, 'deleteData']);

//for restore data table
Route::get('/restore-data/{id}', [PostController::class, 'restoreData']);
Route::get('/delete-forever-data/{id}', [PostController::class, 'deleteForeverData']);
Route::get('/change-status/{id}', [PostController::class, 'changeStatus']);

//for authintication
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
