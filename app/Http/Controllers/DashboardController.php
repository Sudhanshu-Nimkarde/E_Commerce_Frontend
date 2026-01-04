<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard () {

        $roleId = session('role_id');

        Log::info($roleId);

        return match($roleId) {
            1 => view('dashboards.owner'),   
            2 => view('user.dashboard'),       // Admin/Owner View
            3 => view('user.dashboard'),   // Order Manager View
            7 => view('dashboards.accounts'),        // Accounts View
            default => view('user.dashboard')
        };
        // return view('dashboard');
    }
}
