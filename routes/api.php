<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasedItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SoldItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::middleware('auth:sanctum')->get('/merchandise', function (Request $request) {
    return $request->merchandise();

});

Route::middleware('auth:sanctum')->get('/supplier', function (Request $request) {
    return $request->supplier();

});

Route::middleware('auth:sanctum')->get('/customer', function (Request $request) {
    return $request->customer();

});

Route::middleware('auth:sanctum')->get('/purchase', function (Request $request) {
    return $request->purchase();

});

Route::middleware('auth:sanctum')->get('/sale', function (Request $request) {
    return $request->sale();

});

Route::middleware('auth:sanctum')->get('/purchasedItem', function (Request $request) {
    return $request->purchasedItem();

});

Route::middleware('auth:sanctum')->get('/soldItem', function (Request $request) {
    return $request->soldItem();

});



Route::get('/users/{user}', [UserController::class, 'view']);
Route::patch('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

Route::get('/merchandises/{merchandise}', [MerchandiseController::class, 'view']);
Route::patch('/merchandises/{merchandise}', [MerchandiseController::class, 'update']);
Route::delete('/merchandises/{merchandise}', [MerchandiseController::class, 'destroy']);
Route::get('/merchandises', [MerchandiseController::class, 'index']);
Route::post('/merchandises', [MerchandiseController::class, 'store']);

Route::get('/suppliers/{supplier}', [SupplierController::class, 'view']);
Route::patch('/suppliers/{supplier}', [SupplierController::class, 'update']);
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy']);
Route::get('/suppliers', [SupplierController::class, 'index']);
Route::post('/suppliers', [SupplierController::class, 'store']);

Route::get('/customers/{customer}', [CustomerController::class, 'view']);
Route::patch('/customers/{customer}', [CustomerController::class, 'update']);
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);
Route::get('/customers', [CustomerController::class, 'index']);
Route::post('/customers', [CustomerController::class, 'store']);

Route::get('/purchases/{purchase}', [PurchaseController::class, 'view']);
Route::patch('/purchases/{purchase}', [PurchaseController::class, 'update']);
Route::delete('/purchases/{purchase}', [PurchaseController::class, 'destroy']);
Route::get('/purchases', [PurchaseController::class, 'index']);
Route::post('/purchases', [PurchaseController::class, 'store']);

Route::get('/sales/{sale}', [SaleController::class, 'view']);
Route::patch('/sales/{sale}', [SaleController::class, 'update']);
Route::delete('/sales/{sale}', [SaleController::class, 'destroy']);
Route::get('/sales', [SaleController::class, 'index']);
Route::post('/sales', [SaleController::class, 'store']);

Route::get('/purchased_items/{purchasedItem}', [PurchasedItemController::class, 'view']);
Route::patch('/purchased_items/{purchasedItem}', [PurchasedItemController::class, 'update']);
Route::delete('/purchased_items/{purchasedItem}', [PurchasedItemController::class, 'destroy']);
Route::get('/purchased_items', [PurchasedItemController::class, 'index']);
Route::post('/purchased_items', [PurchasedItemController::class, 'store']);

Route::get('/sold_items/{soldItem}', [SoldItemController::class, 'view']);
Route::patch('/sold_items/{soldItem}', [SoldItemController::class, 'update']);
Route::delete('/sold_items/{soldItem}', [SoldItemController::class, 'destroy']);
Route::get('/sold_items', [SoldItemController::class, 'index']);
Route::post('/sold_items', [SoldItemController::class, 'store']);
