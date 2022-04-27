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

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('-dashbaord');
    
        //   view salers
    Route::get('/salers', [App\Http\Controllers\AdminController::class, 'add_new'])->name('-add-new-sellers');
    Route::get('/view', [App\Http\Controllers\AdminController::class, 'view'])->name('-view_all');

    //  product
    Route::get('/product', [App\Http\Controllers\AdminController::class, 'product'])->name('-products');
    Route::get('/view-product', [App\Http\Controllers\AdminController::class, 'view_product'])->name('-view-products');
    Route::post('/save-product', [App\Http\Controllers\ProductController::class, 'store'])->name('-saveProducts');
    
    //category
    Route::get('/category', [App\Http\Controllers\AdminController::class, 'category'])->name('-cats');
    Route::post('/save-category', [App\Http\Controllers\CategoryController::class, 'store'])->name('-savecats');

    //product discounts
    Route::get('/discount', [App\Http\Controllers\DiscountController::class, 'index'])->name('-discount');
    Route::post('/save-discount', [App\Http\Controllers\DiscountController::class, 'store'])->name('-save-discount');

    //profile
    Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('-profile');
    Route::get('/profile-update', [App\Http\Controllers\AdminController::class, 'updateProfile'])->name('-profile-update');
    Route::post('/save-update/{id}', [App\Http\Controllers\AdminController::class, 'saveUpdate'])->name('-save-update');
    Route::post('/save-password/{id}', [App\Http\Controllers\AdminController::class, 'savePassword'])->name('-save-pass');

    //Logs
    Route::get('/system-logs', [App\Http\Controllers\LogsController::class, 'index'])->name('-logs');

    // company setup
   Route::get('/comany-setup', [App\Http\Controllers\CompanyController::class, 'index'])->name('-company');
   Route::post('/save-setup', [App\Http\Controllers\CompanyController::class, 'store'])->name('-save-setup');


   });
   
Route::group(['prefix' => 'saler', 'as' => 'saler', 'middleware' => 'saler'], function(){


    Route::get('/dashboard', [App\Http\Controllers\SalersController::class, 'index'])->name('-dashbaord');

    // product overview
    Route::get('/overview', [App\Http\Controllers\SalersController::class, 'create'])->name('-overview');
    Route::get('/view-product/{id}', [App\Http\Controllers\SalersController::class, 'view_product'])->name('-viewP');

    //sales
    Route::get('/make-sale', [App\Http\Controllers\SalersController::class, 'create_sales'])->name('-saleP');
    Route::get('/all-sales', [App\Http\Controllers\SalersController::class, 'all_sales'])->name('-all-sales');
    Route::get('/load-discount/{id}', [App\Http\Controllers\SalersController::class, 'loader'])->name('-load-discount');
    Route::post('/save_sale', [App\Http\Controllers\SalersController::class, 'store'])->name('-save-sales');
    Route::get('/sale-invoice/{id}', [App\Http\Controllers\SalersController::class, 'sales_invoice'])->name('-sales-invoice');
    Route::get('/invoice-print/{id}', [App\Http\Controllers\SalersController::class, 'invoice_print'])->name('-print');

    
     //create notifaction
    Route::get('/notifaction', [App\Http\Controllers\NoticationsController::class, 'index'])->name('-notifaction');

    
    

    


   });