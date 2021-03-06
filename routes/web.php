<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Auth::routes(['verify' => true]);

//admin
Route::get('products/{id}/gallery', 'admin\ProductController@gallery')->name('products.gallery')->middleware('is_admin');
Route::get(
    'products/restored',
    'admin\ProductController@restored'
)->name('products.restored')->middleware('is_admin');
Route::get(
    'products/{id}/set-restored',
    'admin\ProductController@setRestored'
)->name('products.setrestored')->middleware('is_admin');

Route::get(
    'gallery/restored',
    'admin\ProductGalleryController@restored'
)->name('product-galleries.restored')->middleware('is_admin');
Route::get(
    'products/{id}/set-restored/gallery',
    'admin\ProductGalleryController@setRestored'
)->name('product-galleries.setrestored')->middleware('is_admin');


Route::get(
    'transaction/restored',
    'admin\TransactionController@restored'
)->name('transactions.restored')->middleware('is_admin');
Route::get(
    'transaction/{id}/set-restored/transaction',
    'admin\TransactionController@setRestored'
)->name('transactions.setrestored')->middleware('is_admin');


Route::get('transactions/{id}/set-status', 'admin\TransactionController@setStatus')->name('transactions.status')->middleware('is_admin');;
Route::get('transactions/{id}/delete', 'admin\TransactionController@deleteconfirmation')->name('transactions.showdelete')->middleware('is_admin');;
Route::get('/admin/home', 'admin\DashboardController@index')->name('admin.home')->middleware('is_admin');
Route::get('/admin/account-user', 'admin\AboutUserController@index')->name('admin.user')->middleware('is_admin');
Route::get('/admin/print', 'admin\TransactionController@print_pdf')->name('print.laporan')->middleware('is_admin');
Route::get('/admin/print-invoice/{id}', 'admin\TransactionController@generateInvoice')->name('print.invoice')->middleware('is_admin');
// Route::get('/live_search/product', 'admin\ProductController@live_search')->name('live_search.product')->middleware('is_admin');


Route::resource('products', 'admin\ProductController')->middleware('is_admin');
Route::resource('product-galleries', 'admin\ProductGalleryController')->middleware('is_admin');
Route::resource('transactions', 'admin\TransactionController')->middleware('is_admin');
Route::resource('user-accounts', 'admin\AboutUserController')->middleware('is_admin');

//user
Route::get('/', 'user\DashboardController@index')->name('user.home');
Route::get('/details/{id}/', 'user\DashboardController@detail')->name('user.details');

Route::get('/details/{id}/checkout-guest/', 'user\DashboardController@booking')->name('user.booking.guest');

Route::get('/details/{id}/checkout/', 'user\TransactionController@index')->name('user.booking');
Route::get('/mytransaction', 'user\DashboardController@cekStatus')->name('user.status');
Route::get('/mytransaction/{email}', 'user\TransactionController@cekStatusLogin')->name('user.status.login');
Route::get('/contact', 'user\DashboardController@contact')->name('user.contact');
Route::get('/portofolio', 'user\DashboardController@portofolio')->name('user.portofolio');
Route::get('/search', 'user\DashboardController@Search')->name('user.search');

Route::resource('dashboard-user', 'user\DashboardController');
Route::resource('transaction-user', 'user\TransactionController');
