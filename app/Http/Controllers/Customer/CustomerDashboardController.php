<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class CustomerDashboardController extends Controller
{
    protected function customerViewData(string $activePage): array
    {
        $customerName = session('user_name', 'Alex');
        $customerInitial = strtoupper(substr($customerName, 0, 1));

        return [
            'customerName' => $customerName,
            'customerInitial' => $customerInitial,
            'customerRoleId' => session('role_id', 3),
            'customerActivePage' => $activePage,
        ];
    }

    protected function renderCustomerPage(string $view, string $activePage)
    {
        return view($view, $this->customerViewData($activePage));
    }

    public function customerDashboard()
    {
        return $this->renderCustomerPage('customer.dashboard', 'dashboard');
    }

    public function profile()
    {
        return $this->renderCustomerPage('customer.profile', 'profile');
    }

    public function addresses()
    {
        return $this->renderCustomerPage('customer.addresses', 'addresses');
    }

    public function products()
    {
        return $this->renderCustomerPage('customer.products', 'products');
    }

    public function productDetail()
    {
        return $this->renderCustomerPage('customer.product-detail', 'products');
    }

    public function categories()
    {
        return $this->renderCustomerPage('customer.categories', 'categories');
    }

    public function compare()
    {
        return $this->renderCustomerPage('customer.compare', 'compare');
    }

    public function wishlist()
    {
        return $this->renderCustomerPage('customer.wishlist', 'wishlist');
    }

    public function cart()
    {
        return $this->renderCustomerPage('customer.cart', 'cart');
    }

    public function orders()
    {
        return $this->renderCustomerPage('customer.orders', 'orders');
    }

    public function orderDetail()
    {
        return $this->renderCustomerPage('customer.order-detail', 'orders');
    }

    public function trackOrder()
    {
        return $this->renderCustomerPage('customer.track-order', 'orders');
    }

    public function returns()
    {
        return $this->renderCustomerPage('customer.returns', 'returns');
    }

    public function reviews()
    {
        return $this->renderCustomerPage('customer.reviews', 'reviews');
    }

    public function supportTickets()
    {
        return $this->renderCustomerPage('customer.support-tickets', 'support-tickets');
    }

    public function complaints()
    {
        return $this->renderCustomerPage('customer.complaints', 'complaints');
    }

    public function supportDashboard()
    {
        return view('support.dashboard');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function shopkeeperDashboard()
    {
        return view('user.dashboard');
    }
}
