<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/permissions', 'PermissionController@index')->name('permission.index');
Route::post('/permissions', 'PermissionController@store')->name('permission.store');
Route::delete('/permissions/{permission}/destroy', 'PermissionController@destroy')->name('permission.destroy');
Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('permission.edit');
Route::patch('permission/{permission}/update', 'PermissionController@update')->name('permissions.update');

