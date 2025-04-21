<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamController;

Route::get('/', [WelcomeController::class,'index']);

Route::group(['prefix' => 'user'], function(){
    Route::get('/',[UserController::class, 'index']);
    Route::post('/list',[UserController::class, 'list']);
    Route::get('/create_ajax',[UserController::class, 'create_ajax']);
    Route::post('/ajax',[UserController::class, 'store_ajax']);
    Route::get('/{id}/show_ajax',[UserController::class, 'show_ajax']);
    Route::get('/{id}/edit_ajax',[UserController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax',[UserController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax',[UserController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax',[UserController::class, 'delete_ajax']);
});

Route::group(['prefix' => 'level'], function(){
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
    Route::post('/ajax', [LevelController::class, 'store_ajax']);
    Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
    Route::get('/{id}/edit_ajax',[LevelController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax',[LevelController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax',[LevelController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax',[LevelController::class, 'delete_ajax']);
});

Route::group(['prefix' => 'buku'], function(){
    Route::get('/',[BukuController::class, 'index']);
    Route::post('/list',[BukuController::class, 'list']);
    Route::get('/create_ajax',[BukuController::class, 'create_ajax']);
    Route::post('/store_ajax',[BukuController::class, 'store_ajax']);
    Route::get('/{id}/show_ajax', [BukuController::class, 'show_ajax']);
    Route::get('/{id}/edit_ajax',[BukuController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax',[BukuController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax',[BukuController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax',[BukuController::class, 'delete_ajax']);
});


Route::group(['prefix' => 'kategori'], function(){
    Route::get('/',[KategoriController::class, 'index']);
    Route::get('/create_ajax',[KategoriController::class, 'create_ajax']);
    Route::post('/list',[KategoriController::class, 'list']);
    Route::post('/store_ajax',[KategoriController::class, 'store_ajax']);
    Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
    Route::get('/{id}/edit_ajax',[KategoriController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax',[KategoriController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax',[KategoriController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax',[KategoriController::class, 'delete_ajax']);
});

Route::group(['prefix' => 'peminjam'], function(){
    Route::get('/',[PeminjamController::class, 'index']);
    Route::post('/list',[PeminjamController::class, 'list']);
    Route::get('/create_ajax',[PeminjamController::class, 'create_ajax']);
    Route::post('/ajax',[PeminjamController::class, 'store_ajax']);
    Route::get('/{id}/show_ajax',[PeminjamController::class, 'show_ajax']);
    Route::get('/{id}/edit_ajax',[PeminjamController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax',[PeminjamController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax',[PeminjamController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax',[PeminjamController::class, 'delete_ajax']);
});

