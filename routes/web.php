<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Customer\CustomerDashboardController;
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

Route::middleware(['frontend.auth:Admin', 'check.token'])->group(function () {

    Route::get('/admin/dashboard', [CustomerDashboardController::class, 'adminDashboard'])
        ->name('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| Shopkeeper Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['frontend.auth:Shopkeeper', 'check.token'])->group(function () {

    Route::get('/shopkeeper/dashboard', [CustomerDashboardController::class, 'shopkeeperDashboard'])
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
