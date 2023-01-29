<?php

use App\Http\Controllers\ActionController;
use Illuminate\Support\Facades\Route;


Route::controller(ActionController::class)->group(function () {
    Route::get('/','index')->name('home');
    Route::post('open', 'open')->name('action.open');
    Route::post('add', 'add')->name('action.add');
    Route::post('edit','edit')->name('action.edit');
    Route::post('update','update')->name('action.update');
    Route::post('delete','delete')->name('action.delete');
});
