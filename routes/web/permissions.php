<?php

use Illuminate\Support\Facades\Route;

Route::get('/permission', 'PermissionController@index')->name('permission.index');
