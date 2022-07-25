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

    return view('front.auth.sign-in');

});


Route::get('/sign-in', [App\Http\Controllers\FrontController::class, 'signin'])->name('sign-in');
Route::get('/sign-up', [App\Http\Controllers\FrontController::class, 'signup'])->name('sign-up');
Route::post('/auth', [App\Http\Controllers\IndexController::class, 'Auth'])->name('user-auth');
Route::get('/redirect', [App\Http\Controllers\IndexController::class, 'index'])->name('redirect');
Route::get('/logout', [App\Http\Controllers\IndexController::class, 'logout'])->name('logout');


Route::group(['prefix'=> 'admin', 'as'=>'admin', 'middleware' => 'admin'], function(){

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('-dashboard');
    Route::get('/view', [App\Http\Controllers\AdminController::class, 'view'])->name('-view_all');
    Route::get('/view-all-sales', [App\Http\Controllers\AdminController::class, 'view_all_sales'])->name('-view-all-sales');
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('discounts', App\Http\Controllers\DiscountController::class);
    Route::resource('company', App\Http\Controllers\CompanyController::class);
    Route::resource('profile', App\Http\Controllers\AdminController::class);
    Route::resource('users', App\Http\Controllers\UsersController::class);
    Route::resource('logs', App\Http\Controllers\LogsController::class);
    Route::get('/delete/{user}', [App\Http\Controllers\UsersController::class, 'delete'])->name('-deleteUsers');
 });
   
Route::group(['prefix' => 'saler', 'as' => 'saler', 'middleware' => 'saler'], function(){
    Route::get('/dashboard', [App\Http\Controllers\SalersController::class, 'index'])->name('-dashbaord');
    // product overview
    Route::get('/overview', [App\Http\Controllers\SalersController::class, 'create'])->name('-overview');
    Route::get('/view-product/{id}', [App\Http\Controllers\SalersController::class, 'view_product'])->name('-viewP');
    //sales
    Route::get('/make-sale', [App\Http\Controllers\SalersController::class, 'create_sales'])->name('-saleP');
    Route::get('/all-sales', [App\Http\Controllers\SalersController::class, 'all_sales'])->name('-all-sales');
    Route::get('/search-result/{keyword}', [App\Http\Controllers\SalersController::class, 'searchResult'])->name('-results'); 
    Route::get('/load-discount/{id}', [App\Http\Controllers\SalersController::class, 'loader'])->name('-load-discount');
    Route::post('/save_sale', [App\Http\Controllers\SalersController::class, 'store'])->name('-save-sales');
    Route::get('/sale-invoice/{id}', [App\Http\Controllers\SalersController::class, 'sales_invoice'])->name('-sales-invoice');
    Route::get('/invoice-print/{id}', [App\Http\Controllers\SalersController::class, 'invoice_print'])->name('-printInvoice');
    Route::get('/notifaction', [App\Http\Controllers\NoticationsController::class, 'index'])->name('-notifaction');
    Route::resource('profile', App\Http\Controllers\AdminController::class);
 
});