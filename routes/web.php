<?php

//use App\Http\Controllers\CategoryController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[CategoryController::class,'list_mode_user']);

Route::get('/products/{id}',[ProductController::class,'list_mode_user']);



Route::prefix('/admin')->group(function(){

    Route::get('/',[AdminController::class,'show']);

    

    Route::prefix('/categories')->group(function(){

        Route::get('/',[CategoryController::class,'list']);

        Route::get('/insert',[CategoryController::class,'insert']);

        Route::post('/insert',[CategoryController::class,'save_insert']);

        Route::get('/edit/{id}',[CategoryController::class,'edit']);


        Route::post('/edit/{id}',[CategoryController::class,'save_edit']);



        Route::get('/delete/{id}',[CategoryController::class,'delete']);



    });

    Route::prefix('/products')->group(function(){

        Route::get('/',[ProductController::class,'list']);

        Route::get('/insert',[ProductController::class,'insert']);

        Route::post('/insert',[ProductController::class,'save']);

        Route::get('/edit/{id}',[ProductController::class,'edit']);

        Route::post('/edit/{id}',[ProductController::class,'save_edit']);

        Route::get('/delete/{id}',[ProductController::class,'delete']);



    });

    Route::prefix('/users')->group(function(){

        Route::get('/',[UserController::class,'list']);

        Route::get('/insert',[UserController::class,'insert']);

        Route::post('/insert',[UserController::class,'save_insert']);

        Route::get('/edit/{id}',[UserController::class,'edit']);

        Route::post('/edit/{id}',[UserController::class,'edit_save']);

        Route::get('/delete/{id}',[UserController::class,'delete']);  

    });

});
