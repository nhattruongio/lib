<?php

use Illuminate\Http\Request;

Route::get('/list-ten-book', 'BookController@getListTenBook');
Route::get('/list-all-book', 'BookController@getListBook');
Route::get('/list-ten-author', 'AuthorController@getListTenAuthor');
Route::get('/list-all-author', 'AuthorController@getListAuthor');
Route::post('/get-once-book', 'BookController@getOnceBook');
Route::post('/get-book-same-author', 'BookController@getBookSameAuthor');
Route::get('/list-book-hot', 'BookController@getListBookHot');
Route::post('/get-once-author', 'AuthorController@getOnceAuthor');

// Authentication
Route::post('/register', 'Auth\RegisterController@store');
Route::post('/login', 'Auth\LoginController@login');

Route::middleware('jwt.auth')->group(function () {
    // Token
    Route::get('/refresh', 'UserController@refresh')->name('refresh');

    // UserController
    Route::post('/get-user', 'UserController@getUser')->name('get-user');
    Route::post('/change-password', 'UserController@changePassword')->name('change-password');
    Route::post('/update-customer', 'UserController@updateCustomer')->name('update-customer');

    // BookController
    Route::post('/add-book', 'BookController@store')->name('add-book');

    // HireController
    Route::post('/list-hire', 'HireController@listHiring')->name('list-hire');
    Route::post('/submit-hire', 'HireController@submitHire')->name('submit-hire');
    Route::post('/check-status', 'HireController@checkStatus')->name('check-status');
    Route::post('/once-hire', 'HireController@onceHire')->name('once-hire');

    // LibraryController
    Route::post('/loading-love-book', 'LibraryController@loading')->name('loading-love-book');
    Route::post('/submit-love-book', 'LibraryController@store')->name('submit-love-book');
    Route::post('/list-favorite-book', 'LibraryController@getFavoriteBook')->name('list-favorite-book');

    // SearchController
    Route::post('/search', 'SearchController@store')->name('search');
});

Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware' => 'jwt.auth'], function () {
    Route::post('/accept-hire', 'Admin\HireController@submitHire')->name('accept-hire');

    Route::post('/create-book', 'Admin\BookController@store')->name('create-book');

    Route::post('/create-author', 'Admin\AuthorController@store')->name('create-author');

    Route::post('/get-order', 'Admin\OrderController@getOrder')->name('get-order');

    Route::post('/get-statistic', 'Admin\StatisticController@getStatistic')->name('get-statistic');
});