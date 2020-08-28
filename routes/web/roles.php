<?php

use Illuminate\Support\Facades\Route;

Route::get('/role', 'RoleController@index')->name('role.index');
Route::post('role/index', 'RoleController@store')->name('role.store');
Route::delete('role/{role}/destroy', 'RoleController@destroy')->name('role.destroy');
