<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\VendorController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/user/login', [App\Http\Controllers\HomeController::class, 'login']);
// Route::post('/user/loginPost', [App\Http\Controllers\HomeController::class, 'postLogin']);
// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home.dashboard');
// Route::any('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');

// Route::get('/vendor/login', [App\Http\Controllers\VendorController::class, 'login']);
// Route::post('/vendor/loginPost', [App\Http\Controllers\VendorController::class, 'postLogin']);


Route::group(['prefix' => '/'], function(){
    Route::group(['middleware' => 'guest'], function(){
        // Route::get('/login','App\Http\Controllers\HomeController@login')->name('user.login');	
        Route::post('loginPost', 'App\Http\Controllers\HomeController@postLogin'); 
    });
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/dashboard','App\Http\Controllers\HomeController@dashboard')->name('user.dashboard');
        Route::any('/profile', 'App\Http\Controllers\HomeController@profile');
        Route::any('/changePassword', 'App\Http\Controllers\HomeController@change_password');
        // Route::any('/logout', 'App\Http\Controllers\HomeController@userLogout');	
        Route::any('/logout', 'App\Http\Controllers\HomeController@userLogout')->name('user.logout');	
    });
});


Route::group(['prefix' => 'vendor'], function(){
    Route::group(['middleware' => 'vendor.guest'], function(){
        Route::get('/login','App\Http\Controllers\VendorController@login')->name('vendor.login');	
        Route::post('/loginPost', 'App\Http\Controllers\VendorController@postLogin'); 
    });
    Route::group(['middleware' => 'vendor.auth'], function(){
        Route::get('/dashboard','App\Http\Controllers\VendorController@dashboard')->name('vendor.dashboard');
        Route::any('/profile', 'App\Http\Controllers\VendorController@profile');
        Route::any('/changePassword', 'App\Http\Controllers\VendorController@change_password');
        Route::any('/logout', 'App\Http\Controllers\VendorController@vendorLogout')->name('vendor.logout');	
    });
});

Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('/login','App\Http\Controllers\AdminController@login')->name('admin.login');	
        Route::post('/loginPost', 'App\Http\Controllers\AdminController@authenticate'); 
    });
    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/dashboard','App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
        Route::any('/profile', 'App\Http\Controllers\AdminController@profile');
        Route::any('/changePassword', 'App\Http\Controllers\AdminController@change_password');
        Route::any('/logout', 'App\Http\Controllers\AdminController@logout')->name('admin.logout');	

        Route::get('/customer_management', 'App\Http\Controllers\CustomerController@index');
        Route::get('/add_customer', 'App\Http\Controllers\CustomerController@add_customer');
        Route::any('/add_customer_action', 'App\Http\Controllers\CustomerController@add_customer_action');
        Route::get('/edit_customer/{id}', 'App\Http\Controllers\CustomerController@edit_customer');
        Route::any('/customer_update', 'App\Http\Controllers\CustomerController@customer_update');
        Route::get('/change_user_status', 'App\Http\Controllers\CustomerController@change_user_status');
        Route::any('/deletecustomer', 'App\Http\Controllers\CustomerController@deletecustomer');

        Route::get('/scoutList', 'App\Http\Controllers\ScoutController@scout_list');
        Route::get('/addScout', 'App\Http\Controllers\ScoutController@add_scout');
        Route::any('/submitScout', 'App\Http\Controllers\ScoutController@submit_scout');
        Route::get('/editScout/{id}', 'App\Http\Controllers\ScoutController@edit_scout');
        Route::any('/updateScout', 'App\Http\Controllers\ScoutController@update_scout');
        Route::get('/changeScoutStatus', 'App\Http\Controllers\ScoutController@change_scout_status');
        Route::any('/deleteScout', 'App\Http\Controllers\ScoutController@delete_scout');

        Route::get('/serviceProviderList', 'App\Http\Controllers\ServiceproviderController@service_provider_list');
        Route::get('/addServiceProvider', 'App\Http\Controllers\ServiceproviderController@add_serv_provider');
        Route::any('/submitServiceProvider', 'App\Http\Controllers\ServiceproviderController@submit_serv_provider');
        Route::get('/editServiceProvider/{id}', 'App\Http\Controllers\ServiceproviderController@edit_serv_provider');
        Route::any('/updateServiceProvider', 'App\Http\Controllers\ServiceproviderController@update_serv_provider');
        Route::get('/change_serv_provider_status', 'App\Http\Controllers\ServiceproviderController@change_serv_provider_status');
        Route::any('/deleteServiceProvider', 'App\Http\Controllers\ServiceproviderController@delete_serv_provider');
    });
});
