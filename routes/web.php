<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/register', [
        'uses' => 'UserController@getSignUp',
        'as' => 'admin.register'
    ]);
    
    Route::post('/register', [
        'uses' => 'UserController@postSignUp',
        'as' => 'admin.register'
    ]);
    
    Route::get('/login', [
        'uses' => 'UserController@getSignIn',
        'as' => 'admin.login'
    ]);
    
    Route::post('/login', [
        'uses' => 'UserController@postSignIn',
        'as' => 'admin.login'
    ]);
    
    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'admin.logout'
    ]);

    Route::post('groups/store', [
        'uses' => 'GroupsController@store',
        'as' => 'groups.store'
    ]);

    Route::group(['prefix' => 'contacts'], function () {

        Route::get('/autocomplete', [
            'uses' => 'ContactsController@autocomplete',
            'as' => 'contacts.autocomplete'
        ]);

        Route::get('/', [
            'uses' => 'ContactsController@index',
            'as' => 'contacts.index',                
        ]);

        Route::get('/create', [
            'uses' => 'ContactsController@create',
            'as' => 'contacts.create',       
        ]);

        Route::post('/create', [
            'uses' => 'ContactsController@store',
            'as' => 'contacts.store',
        ]);

        Route::get('/edit/{id}', [
            'uses' => 'ContactsController@edit',
            'as' => 'contacts.edit',       
        ]);

        Route::post('/edit', [
            'uses' => 'ContactsController@update',
            'as' => 'contacts.update',
        ]);
        
        Route::get('/delete/{id}', [
            'uses' => 'ContactsController@destroy',
            'as' => 'contacts.destroy',                
        ]);

    });
});