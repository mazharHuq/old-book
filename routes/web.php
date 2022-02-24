<?php

use App\Http\Controllers\SitemapXmlController;
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
    return view('frontend.pages.index');
});

Route::get('/sitemap.xml', [SitemapXmlController::class, 'index']);
Route::group(['prefix' => '/'], function () {

    Route::resource('/visitor','App\Http\Controllers\Frontend\HomeController',['name'=>'visitor']);
    Route::get('/bookDetails/{id}', 'App\Http\Controllers\Frontend\HomeController@bookDetails')
        ->name('bookDetails');
    Route::post('/search', 'App\Http\Controllers\Frontend\HomeController@search')
        ->name('search');
});
Route::get('/dashboard_old', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard_old');



Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'App\Http\Controllers\UserController@index')->name('user');
    Route::get('/login', 'App\Http\Controllers\UserAuth\AuthenticatedSessionController@showLoginForm')->name('user.login');
    Route::post('/login/submit', 'App\Http\Controllers\UserAuth\AuthenticatedSessionController@login')->name('user.login.submit');
Route::post('/logout/submit', 'App\Http\Controllers\UserAuth\AuthenticatedSessionController@logout')->name('user.logout.submit');

});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::resource('roles', 'App\Http\Controllers\RolesController', ['names' => 'dashboard.roles']);
    Route::resource('users', 'App\Http\Controllers\UsersController', ['names' => 'dashboard.users']);
    Route::resource('admins', 'App\Http\Controllers\AdminsController', ['names' => 'dashboard.admins']);
    Route::resource('chat', 'App\Http\Controllers\ChatController', ['names' => 'dashboard.chat']);

    Route::get('/login', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@showLoginForm')->name('dashboard.login');
    Route::post('/login/submit', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@login')->name('dashboard.login.submit');

    Route::post('/logout/submit', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@logout')->name('dashboard.logout.submit');

    Route::resource('category', 'App\Http\Controllers\CategoryController', ['names' => 'dashboard.category']);
    Route::resource('book', 'App\Http\Controllers\BookController', ['names' => 'dashboard.book']);
   /* Route::get('/chat',function ()
    {
       return view('backend.pages.chat.index');
    });*/
    // Route::get('/password/reset', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('dashboard.login');
    // Route::post('/login/submit', 'App\Http\Controllers\Auth\LoginController@login')->name('dashboard.login.submit');
  Route::post('/search', 'App\Http\Controllers\BookController@search');
  Route::post('/testserch','App\Http\Controllers\BookController@testSearch')->name('test-form');
});

require __DIR__ . '/auth.php';
