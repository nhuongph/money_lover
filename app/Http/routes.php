<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);
    Session::put('language', $locale);
    return redirect()->back();
    //
});
//User

Route::get('/login', ['uses' => 'UserController@getLogin', 'as' => 'getLogin']);
Route::post('/login', ['uses' => 'UserController@postLogin', 'as' => 'postLogin']);

Route::get('/register', ['uses' => 'UserController@getRegister', 'as' => 'getRegister']);
Route::post('/register', ['uses' => 'UserController@postRegister', 'as' => 'postRegister']);
Route::get('/createAccount/{token}', ['uses' => 'UserController@createAccount', 'as' => 'createAccount']);


Route::controllers(
        [
            'auth' => 'Auth\AuthController',
            'password' => 'Auth\PasswordController'
        ]
);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        $lang = Session::get ('language');
        if ($lang != null) \App::setLocale($lang);
        return view('layouts.master');
    });
//User
    Route::get('/logout', ['uses' => 'UserController@getLogout', 'as' => 'getLogout']);
    Route::get('/update/{username}', ['uses' => 'UserController@getUpdate', 'as' => 'getUpdate']);
    Route::post('/update', ['uses' => 'UserController@postUpdate', 'as' => 'postUpdate']);

//Walltet 
    Route::get('/wallet', ['uses' => 'WalletsController@getWallet', 'as' => 'wallet']);
    Route::get('/home', function () {
        $lang = Session::get ('language');
        if ($lang != null) \App::setLocale($lang);
        return view('index');
    });
    Route::get('/addwallet', ['uses' => 'WalletsController@getAddWallet', 'as' => 'addWallet']);
    Route::post('/addwallet', ['uses' => 'WalletsController@postAddWallet', 'as' => 'postWallet']);
    Route::post('/addwallet', ['uses' => 'WalletsController@postAddWallet', 'as' => 'postWallet']);
    Route::get('/currentwallet/{id}', ['uses' => 'WalletsController@setCurrentWallet', 'as' => 'setCurrentWallet']);
    Route::get('/updatewallet/{id}', ['uses' => 'WalletsController@getUpdateWallet', 'as' => 'getUpdateWallet']);
    Route::post('/updatewallet', ['uses' => 'WalletsController@postUpdateWallet', 'as' => 'postUpdateWallet']);
    Route::get('/transwallet/{id}', ['uses' => 'WalletsController@getTransWallet', 'as' => 'getTransWallet']);
    Route::post('/transwallet', ['uses' => 'WalletsController@postTransWallet', 'as' => 'postTransWallet']);
    Route::get('/deletewallet/{id}', ['uses' => 'WalletsController@getDeleteWallet', 'as' => 'getDeleteWallet']);

//Categories 
    Route::get('/category', ['uses' => 'CategoriesController@getCategories', 'as' => 'getCategories']);
    Route::get('/addcategory', ['uses' => 'CategoriesController@getAddCategory', 'as' => 'getAddCategory']);
    Route::post('/addcategory', ['uses' => 'CategoriesController@postAddCategory', 'as' => 'postAddCategory']);
    Route::get('/updatecategory/{id}', ['uses' => 'CategoriesController@getUpdateCategory', 'as' => 'getUpdateCategory']);
    Route::post('/updatecategory', ['uses' => 'CategoriesController@postUpdateCategory', 'as' => 'postUpdateCategory']);

    Route::get('/deletecategory/{id}', ['uses' => 'CategoriesController@getDeleteCategory', 'as' => 'getDeleteCategory']);
    Route::get('/searchcategory', ['uses' => 'CategoriesController@getSearchCategory', 'as' => 'searchCategory']);

//Transactions Money
    Route::get('/transactions', ['uses' => 'TransMoneysController@getTransactions', 'as' => 'getTransactions']);
    Route::get('/addtransaction', ['uses' => 'TransMoneysController@getAddTransaction', 'as' => 'getAddTransaction']);
    Route::post('/addtransaction', ['uses' => 'TransMoneysController@postAddTransaction', 'as' => 'postAddTransaction']);
    Route::get('/updatetransaction/{id}', ['uses' => 'TransMoneysController@getUpdateTransaction', 'as' => 'getUpdateTransaction']);
    Route::post('/updatetransaction', ['uses' => 'TransMoneysController@postUpdateTransaction', 'as' => 'postUpdateTransaction']);

    Route::get('/deletetransaction/{id}', ['uses' => 'TransMoneysController@getDeleteTransaction', 'as' => 'getDeleteTransaction']);

    Route::get('/seachreport', ['uses' => 'TransMoneysController@getSearchReport', 'as' => 'getSearchReport']);
    Route::post('/seachreport', ['uses' => 'TransMoneysController@postSearchReport', 'as' => 'postSearchReport']);

    Route::get('/reportmonth', ['uses' => 'TransMoneysController@getReportMonth', 'as' => 'getReportMonth']);
    Route::post('/reportmonth', ['uses' => 'TransMoneysController@postReportMonth', 'as' => 'postReportMonth']);
    Route::get('/reportexcel', ['uses' => 'TransMoneysController@getExcel', 'as' => 'getExcel']);
    
});
