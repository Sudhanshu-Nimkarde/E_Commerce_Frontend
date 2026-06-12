<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    protected function viewData(): array
    {
        $adminName = session('user_name', 'Admin User');

        return [
            'adminName' => $adminName,
            'adminInitial' => strtoupper(substr($adminName, 0, 1)),
            'adminRoleId' => (int) session('role_id', 1),
            'adminRoleName' => session('role_name', 'Admin'),
        ];
    }

    protected function render(string $view)
    {
        return view($view, $this->viewData());
    }

    public function dashboard()
    {
        return $this->render('admin.dashboard');
    }

    public function users()
    {
        return $this->render('admin.users');
    }

    public function userDetail()
    {
        return $this->render('admin.user-detail');
    }

    public function vendors()
    {
        return $this->render('admin.vendors');
    }

    public function vendorDetail()
    {
        return $this->render('admin.vendor-detail');
    }

    public function kycDocuments()
    {
        return $this->render('admin.kyc-documents');
    }

    public function commissions()
    {
        return $this->render('admin.commissions');
    }

    public function categories()
    {
        return $this->render('admin.categories');
    }

    public function brands()
    {
        return $this->render('admin.brands');
    }

    public function orders()
    {
        return $this->render('admin.orders');
    }

    public function orderDetail()
    {
        return $this->render('admin.order-detail');
    }

    public function refunds()
    {
        return $this->render('admin.refunds');
    }

    public function reports()
    {
        return $this->render('admin.reports');
    }

    public function analytics()
    {
        return $this->render('admin.analytics');
    }

    public function auditLogs()
    {
        return $this->render('admin.audit-logs');
    }

    public function security()
    {
        return $this->render('admin.security');
    }
}
