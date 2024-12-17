<?php
// API JWT Login Routes  


use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderDetailController;

Route::group(['middleware' => 'api'], function () {  
    Route::post('/register', [UserController::class, 'register']);  
    Route::post('/login', [UserController::class, 'login']);  
    Route::post('/logout', [UserController::class, 'logout']);  
    

    Route::group(['middleware' => ['jwt.auth']],function (){
Route::get('/products-with-line', [ProductController::class, 'getAllProductsWithProductLine']);
Route::get('/customers-with-rep', [CustomerController::class, 'getAllCustomersWithSalesRep']);
Route::get('/orders/customer/{customerNumber}', [OrderController::class, 'getOrdersByCustomer']);
Route::get('/order-details/{orderNumber}', [OrderController::class, 'getOrderDetailsByOrder']);
Route::get('/total-paid/customer/{customerNumber}', [CustomerController::class, 'getTotalPaidByCustomers']);
Route::get('/employees/office/{officeCode}', [EmployeeController::class, 'getEmployeeByOfficeCode']);
Route::get('/products-in-stock', [ProductController::class, 'getAllProductsInStock']);
Route::get('/highest-credit-limit', [CustomerController::class, 'getHighestCreditLimit']);
Route::get('/pending-orders', [OrderController::class, 'getPendingOrders']);
Route::get('/payments/date-range', [PaymentController::class, 'getPaymentsInDateRange']);
Route::get('/products/product-line/{productLine}', [ProductController::class, 'getProductsByProductLine']);
Route::get('/customers-order-count', [CustomerController::class, 'countOrdersByCustomer']);
Route::get('/offices/country/{country}', [OfficeController::class, 'getOfficesByCountry']);
Route::get('/total-quantity/product/minima', [OrderDetailController::class, 'getTotalQuantityOrdered']);
Route::get('/customers-with-order-count', [CustomerController::class, 'getCustomersWithOrderCount']);

Route::get('/products/search', [ProductController::class, 'searchProducts']);

    });
});


