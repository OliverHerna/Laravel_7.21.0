<?php

use Illuminate\Support\Facades\Route;

Route::put('users/{user}/updateprofile', 'UserController@update')->name('user.profile.update');

Route::middleware(['role:admin', 'auth'])->group(function(){
    Route::get('users', 'UserController@index')->name('users.index');
});

Route::middleware(['can:view,user'])->group(function(){
    Route::get('users/{user}/profile', 'UserController@show')->name('user.profile.show');
    Route::delete('users/{user}/destroy', 'UserController@destroy')->name('user.destroy');


});
