<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Vendor\VendorDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('home');
});


/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login-user', [AuthController::class, 'loginUser'])
        ->name('login.submit');


    /*
    |--------------------------------------------------------------------------
    | Register
    |--------------------------------------------------------------------------
    */

    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/addUser', [AuthController::class, 'addUser'])
        ->name('addUser');
});


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware(['frontend.auth']);


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['frontend.auth:Admin', 'check.token'])
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
        Route::get('/users/detail', [AdminDashboardController::class, 'userDetail'])->name('users.detail');
        Route::get('/vendors', [AdminDashboardController::class, 'vendors'])->name('vendors');
        Route::get('/vendors/detail', [AdminDashboardController::class, 'vendorDetail'])->name('vendors.detail');
        Route::get('/vendors/kyc-documents', [AdminDashboardController::class, 'kycDocuments'])->name('vendors.kyc-documents');
        Route::get('/vendors/commissions', [AdminDashboardController::class, 'commissions'])->name('vendors.commissions');
        Route::get('/categories', [AdminDashboardController::class, 'categories'])->name('categories');
        Route::get('/brands', [AdminDashboardController::class, 'brands'])->name('brands');
        Route::get('/orders', [AdminDashboardController::class, 'orders'])->name('orders');
        Route::get('/orders/detail', [AdminDashboardController::class, 'orderDetail'])->name('orders.detail');
        Route::get('/refunds', [AdminDashboardController::class, 'refunds'])->name('refunds');
        Route::get('/reports', [AdminDashboardController::class, 'reports'])->name('reports');
        Route::get('/analytics', [AdminDashboardController::class, 'analytics'])->name('analytics');
        Route::get('/audit-logs', [AdminDashboardController::class, 'auditLogs'])->name('audit-logs');
        Route::get('/security', [AdminDashboardController::class, 'security'])->name('security');
});


/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
*/

Route::prefix('vendor')
    ->name('vendor.')
    ->middleware(['frontend.auth:Vendor,Shopkeeper', 'check.token'])
    ->group(function () {

        Route::get('/', function () {
            return redirect()->route('vendor.dashboard');
        })->name('home');

        Route::get('/dashboard', [VendorDashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/shop-management', [VendorDashboardController::class, 'shopManagement'])->name('shop-management');
        Route::get('/product-management', [VendorDashboardController::class, 'productManagement'])->name('product-management');
        Route::get('/inventory', [VendorDashboardController::class, 'inventory'])->name('inventory');
        Route::get('/order-handling', [VendorDashboardController::class, 'orderHandling'])->name('order-handling');
        Route::get('/discounts-marketing', [VendorDashboardController::class, 'discountsMarketing'])->name('discounts-marketing');
        Route::get('/earnings', [VendorDashboardController::class, 'earnings'])->name('earnings');
        Route::get('/customer-interaction', [VendorDashboardController::class, 'customerInteraction'])->name('customer-interaction');
    });


/*
|--------------------------------------------------------------------------
| Shopkeeper Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['frontend.auth:Vendor,Shopkeeper', 'check.token'])->group(function () {

    Route::get('/shopkeeper/dashboard', [VendorDashboardController::class, 'dashboard'])
        ->name('shopkeeper.dashboard');
});


/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['frontend.auth:Customer', 'check.token'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        Route::get('/', function () {
            return redirect('/customer/dashboard');
        })->name('home');

        Route::get('/dashboard', [CustomerDashboardController::class, 'customerDashboard'])
            ->name('dashboard');

        Route::get('/profile', [CustomerDashboardController::class, 'profile'])
            ->name('profile');

        Route::get('/addresses', [CustomerDashboardController::class, 'addresses'])
            ->name('addresses');

        Route::get('/products', [CustomerDashboardController::class, 'products'])
            ->name('products');

        Route::get('/product-detail', [CustomerDashboardController::class, 'productDetail'])
            ->name('product.detail');

        Route::get('/categories', [CustomerDashboardController::class, 'categories'])
            ->name('categories');

        Route::get('/compare', [CustomerDashboardController::class, 'compare'])
            ->name('compare');

        Route::get('/wishlist', [CustomerDashboardController::class, 'wishlist'])
            ->name('wishlist');

        Route::get('/cart', [CustomerDashboardController::class, 'cart'])
            ->name('cart');

        Route::get('/orders', [CustomerDashboardController::class, 'orders'])
            ->name('orders');

        Route::get('/order-detail', [CustomerDashboardController::class, 'orderDetail'])
            ->name('order.detail');

        Route::get('/track-order', [CustomerDashboardController::class, 'trackOrder'])
            ->name('track.order');

        Route::get('/returns', [CustomerDashboardController::class, 'returns'])
            ->name('returns');

        Route::get('/reviews', [CustomerDashboardController::class, 'reviews'])
            ->name('reviews');

        Route::get('/support-tickets', [CustomerDashboardController::class, 'supportTickets'])
            ->name('support.tickets');

        Route::get('/complaints', [CustomerDashboardController::class, 'complaints'])
            ->name('complaints');
});


/*
|--------------------------------------------------------------------------
| Support Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['frontend.auth:Support', 'check.token'])->group(function () {

    Route::get('/support/dashboard', [CustomerDashboardController::class, 'supportDashboard'])
        ->name('support.dashboard');
});


/*
|--------------------------------------------------------------------------
| Delivery Manager Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['frontend.auth:Delivery Manager', 'check.token'])->group(function () {

    Route::get('/delivery/dashboard', [DashboardController::class, 'deliveryDashboard'])
        ->name('delivery.dashboard');
});


/*
|--------------------------------------------------------------------------
| Inventory Manager Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['frontend.auth:Inventory Manager', 'check.token'])->group(function () {

    Route::get('/inventory/dashboard', [DashboardController::class, 'inventoryDashboard'])
        ->name('inventory.dashboard');
});
