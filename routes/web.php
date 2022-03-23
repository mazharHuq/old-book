<?php

use App\Http\Controllers\SitemapXmlController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Middleware\IsPremium;
use App\Http\Middleware\Premium;
use App\Http\Middleware\UserAuthenticated;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserAuth;


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
    Route::get('/seller/{id}', 'App\Http\Controllers\Frontend\HomeController@sellerBooks')
        ->name('seller-books');
    Route::post('/search', 'App\Http\Controllers\Frontend\HomeController@search')
        ->name('search');
});
Route::get('/dashboard_old', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard_old');



Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'App\Http\Controllers\UserController@index')->name('user');

    Route::resource('chat', 'App\Http\Controllers\UserChatController', ['names' => 'user.chat']);

    Route::get('/login', 'App\Http\Controllers\UserAuth\AuthenticatedSessionController@showLoginForm')->middleware
    (UserAuth::class)->name('user.login');
    Route::get('/register', 'App\Http\Controllers\UserAuth\AuthenticatedSessionController@showRegisterForm')->name('user.register');
    Route::post('/register-store', 'App\Http\Controllers\UserAuth\AuthenticatedSessionController@storeUser')->name('user.register.submit');
    Route::post('/login/submit', 'App\Http\Controllers\UserAuth\AuthenticatedSessionController@login')->name('user.login.submit');
Route::post('/logout/submit', 'App\Http\Controllers\UserAuth\AuthenticatedSessionController@logout')->name('user.logout.submit');

});
Route::group(['prefix' => 'user-dashboard'], function()
{
    Route::get('/','\App\Http\Controllers\UserDashboardController@index')->name('user.dashboard');
    Route::resource('book', 'App\Http\Controllers\UserBookController', ['names' => 'user.book']);
    Route::get('/buy-premium', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('checkout2');


});
Route::middleware(Premium::class)->get('/buy-premium',[SslCommerzPaymentController::class,'exampleHostedCheckout'])
    ->name('checkout');
Route::middleware(IsPremium::class)->get('/user/premium',[UserDashboardController::class,'premium'])->name('premium');




Route::group(['prefix' => 'admin-dashboard'], function () {
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
// SSLCOMMERZ Start
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

require __DIR__ . '/auth.php';
