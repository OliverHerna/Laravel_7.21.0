<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/role', 'RoleController@index')->name('role.index');
Route::post('role/index', 'RoleController@store')->name('role.store');
Route::delete('role/{role}/destroy', 'RoleController@destroy')->name('role.destroy');
Route::get('role/{role}/edit', 'RoleController@edit')->name('role.edit');
Route::patch('role/{role}/update', 'RoleController@update')->name('role.update');
