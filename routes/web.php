<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    Route::prefix('/admin')->group(function() {
        Route::get('/', 'Admin\BukuController@index')->name('admin.book.index');
        Route::get('/add', 'Admin\BukuController@add')->name('admin.book.add');
        Route::post('/add', 'Admin\BukuController@store')->name('admin.book.store');
        Route::get('/edit/{id}', 'Admin\BukuController@edit')->name('admin.book.edit');
        Route::post('/update/{id}', 'Admin\BukuController@update')->name('admin.book.update');
        Route::get('/delete/{id}', 'Admin\BukuController@destroy')->name('admin.book.destroy');
    });

    Route::prefix('/member')->group(function() {
        Route::get('/', 'Member\TransactionController@index')->name('member.trs.index');
        Route::get('/add/{id}', 'Member\TransactionController@create')->name('member.trs.add');
        Route::post('/add', 'Member\TransactionController@store')->name('member.trs.store');
        // Route::get('/edit/{id}', 'Admin\BukuController@edit')->name('member.book.edit');
        // Route::post('/update/{id}', 'Admin\BukuController@update')->name('member.book.update');
        // Route::get('/delete/{id}', 'Admin\BukuController@destroy')->name('member.book.destroy');
    });

});