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
    Route::get('/deletecategory/{category}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('-deleteCategory');
    Route::get('/deletediscount/{discount}', [App\Http\Controllers\DiscountController::class, 'delete'])->name('-deleteDiscount');
    Route::get('/deleteproduct/{product}', [App\Http\Controllers\ProductController::class, 'delete'])->name('-deleteProduct');
    Route::get('/deletecompany/{company}', [App\Http\Controllers\CompanyController::class, 'delete'])->name('-deleteCompany');
 });
   
Route::group(['prefix' => 'saler', 'as' => 'saler', 'middleware' => 'saler'], function(){
    Route::get('/dashboard', [App\Http\Controllers\SalersController::class, 'index'])->name('-dashbaord');
    Route::resource('createsales', App\Http\Controllers\SalesInvoiceController::class);
    Route::resource('profile', App\Http\Controllers\AdminController::class);
    Route::resource('checkouts', App\Http\Controllers\CheckoutController::class);
    Route::resource('notifications', App\Http\Controllers\NoticationsController::class);
     //product overview
    Route::get('/overview', [App\Http\Controllers\SalersController::class, 'product_overview'])->name('-overview');
    Route::get('/product-overview/{id}', [App\Http\Controllers\SalersController::class, 'overview'])->name('-product-overiew');
    Route::get('/make-sale', [App\Http\Controllers\SalersController::class, 'create_sales'])->name('-saleP');
    Route::get('/all-sales', [App\Http\Controllers\SalesInvoiceController::class, 'all_sales'])->name('-all-sales');
    Route::get('/search-result/{keyword}', [App\Http\Controllers\SalesInvoiceController::class, 'searchResult'])->name('-results'); 
    Route::get('/load-discount/{id}', [App\Http\Controllers\SalesInvoiceController::class, 'load_discount'])->name('-load-discount');
    Route::get('/load-product/{id}', [App\Http\Controllers\SalesInvoiceController::class, 'load_product'])->name('-load-product');
    Route::get('/load-customer/{id}', [App\Http\Controllers\SalesInvoiceController::class, 'load_customer'])->name('-load-customer');
    Route::post('/sale', [App\Http\Controllers\SalersController::class, 'store'])->name('-save-sales');
    Route::get('/sale-invoice/{id}', [App\Http\Controllers\SalersController::class, 'sales_invoice'])->name('-sales-invoice');
    Route::get('/invoice-print/{id}', [App\Http\Controllers\SalersController::class, 'invoice_print'])->name('-printInvoice');
    Route::post('/checkout-selected', [App\Http\Controllers\SalesInvoiceController::class, 'checkout_sales'])->name('-checkout-selected');
    Route::post('/checkout-sales', [App\Http\Controllers\SalesInvoiceController::class, 'sales_receipt'])->name('-checkout-sales');
    Route::get('/view-receipt/{id}', [App\Http\Controllers\SalesInvoiceController::class, 'view_receipt'])->name('-view-receipt');
    Route::get('/printSales-rececipt/{id}', [App\Http\Controllers\SalesInvoiceController::class, 'print_sales_receipt'])->name('-printSales-receipt');
   // Route::get('/checkout-hop', [App\Http\Controllers\SalesInvoiceController::class, 'checkout_selected'])->name('-checkout-p');
  
});