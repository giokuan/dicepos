<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\UpdatingProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';


// PRODUCTS

Route::get('add-product',[ProductController::class,'addProduct'])->name('add-product');
Route::post('save-product',[ProductController::class, 'saveProduct'])->name('save-product');
Route::get('all-product',[ProductController::class,'allProduct'])->name('all-product');
Route::get('edit-product-stock/{id}',[ProductController::class,'editProduct'])->name('edit-product-stock');
Route::post('update-product',[ProductController::class, 'updateProduct'])->name('update-product');
Route::get('delete-product/{id}',[ProductController::class,'deleteProduct']);

Route::get('edit-product-stock',[ProductController::class,'ProductPurchaseDetail'])->name('edit-product-stock');





// SUPPLIER

Route::get('add-supplier',[SupplierController::class,'addSupplier'])->name('add-supplier');
Route::post('save-supplier',[SupplierController::class, 'saveSupplier'])->name('save-supplier');
Route::get('all-supplier',[SupplierController::class,'allSupplier'])->name('all-supplier');


// CUSTOMER

Route::get('add-customer',[CustomerController::class,'addCustomer'])->name('add-customer');
Route::post('save-customer',[CustomerController::class, 'saveCustomer'])->name('save-customer');
Route::get('all-customer',[CustomerController::class,'allCustomer'])->name('all-customer');


// PURCHASE PRODUCT

Route::get('purchase-product',[PurchaseController::class,'purchaseProduct'])->name('purchase-product');
Route::post('save-purchase-product',[PurchaseController::class, 'savePurchaseProduct'])->name('save-purchase-product');
Route::get('all-purchase-product',[PurchaseController::class,'allPurchaseProduct'])->name('all-purchase-product');
Route::get('edit-purchase-product/{id}',[PurchaseController::class,'editPurchaseProduct'])->name('edit-purchase-product');
Route::post('update-purchase-product',[PurchaseController::class, 'updatePurchaseProduct'])->name('update-purchase-product');
// Route::get('edit-product/{id}',[PurchaseController::class,'editProduct'])->name('edit-product');


// PURCHASE DETAILS

Route::get('all-purchase-details',[PurchaseDetailController::class,'allPurchaseDetails'])->name('all-purchase-details');
Route::get('edit-product/{id}',[PurchaseDetailController::class,'editProduct'])->name('edit-product');


// UPDATING PRODUCT

Route::get('updating-product',[UpdatingProductController::class,'updatingProduct'])->name('updating-product');
Route::get('edit-updating-product/{id}',[UpdatingProductController::class,'editUpdatingProduct'])->name('edit-updating-product');
Route::post('update-stock-product',[UpdatingProductController::class, 'updateStockProduct'])->name('update-stock-product');


// SELL PRODUCT

Route::get('sell-product',[SaleController::class,'sellProduct'])->name('sell-product');
Route::post('save-sell-product',[SaleController::class, 'saveSellProduct'])->name('save-sell-product');
Route::get('all-sells-product',[SaleController::class,'allSellProduct'])->name('all-sells-product');


// SALE DETAILS

Route::get('all-sells-detail',[SaleDetailController::class,'allSaleDetail'])->name('all-sells-detail');
