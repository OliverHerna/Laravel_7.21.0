<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/role', 'RoleController@index')->name('role.index');
Route::post('role/index', 'RoleController@store')->name('role.store');
Route::delete('role/{role}/destroy', 'RoleController@destroy')->name('role.destroy');
Route::get('role/{role}/edit', 'RoleController@edit')->name('role.edit');
Route::patch('role/{role}/update', 'RoleController@update')->name('role.update');
Route::put('role/{role}/attach', 'RoleController@attach_permission')->name('role.permission.attach');
Route::put('role/{role}/detach', 'RoleController@detach_permission')->name('role.permission.detach');
