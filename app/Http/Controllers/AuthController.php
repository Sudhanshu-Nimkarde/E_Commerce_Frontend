<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login() {
        return view('authentication.login');
    }
    public function register() 
    {
        $backendUrl = config('app.backend_url');
        
        Log::info('Backend URL: ' . $backendUrl);

        $response = Http::get($backendUrl . '/api/get-genders');

        $genders = [];

        if ($response->successful()) {
            $responseBody = $response->json();

            if ($responseBody['status'] === true && isset($responseBody['data'])) {
                $genders = $responseBody['data'];
            } else {
                Log::warning('Gender API returned error: ' . $responseBody['message']);
            }
        } else {
            Log::error('Failed to fetch genders from backend API');
        }

        return view('authentication.register', ['genders' => $genders]);
    }
    
    public function addUser(Request $request)
    {
        $backendUrl = config('app.backend_url');
        
        Log::info('Backend URL: ' . $backendUrl);

        $response = Http::post($backendUrl  . '/api/register-user', [
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'contact'           => $request->input('contact'),
            'gender'            => $request->input('gender'),
            'user_name'         => $request->input('user_name'),
            'address'           => $request->input('address'),
            'is_active'         => $request->input('is_active'),
            'password'          => $request->input('password'),
            'confirm_password'  => $request->input('confirm_password'),
        ]);

        Log::info($response);


        return response()->json($response->json(), $response->status());
    }

    // public function loginUser(Request $request)
    // {
    //     $backendUrl = config('app.backend_url');

    //     $response = Http::post($backendUrl . '/api/login-user', [
    //         'user_name' => $request->input('user_name'),
    //         'password'  => $request->input('password'),
    //     ]);

    //     $resData = $response->json();

    //     // If login successful, store data in session
    //     if ($response->ok() && $resData['status']) {
    //         session([
    //             'user_id'    => $resData['data']['user_id'],
    //             'auth_token' => $resData['data']['auth_token'],
    //             'user_name'  => $resData['data']['user_name'],
    //             'role_id'    => $resData['data']['role_id'],
    //         ]);

    //         return redirect('/dashboard'); // Redirect to dashboard or protected route
    //     }

    //     return redirect('/login')->withErrors(['error' => $resData['message'] ?? 'Login failed']);
    // }

    public function loginUser(Request $request)
    {
        $backendUrl = config('app.backend_url');

        $response = Http::post($backendUrl . '/api/login-user', [
            'user_name' => $request->input('user_name'),
            'password'  => $request->input('password'),
        ]);

        $resData = $response->json();

        if ($response->ok() && $resData['status']) {

            // Store session
            session([
                'user_id'    => $resData['data']['user_id'],
                'auth_token' => $resData['data']['auth_token'],
                'user_name'  => $resData['data']['user_name'],
                'role_id'    => $resData['data']['role_id'],
                'role_name'  => $resData['data']['role_name'],
            ]);

            $roleId = (int) ($resData['data']['role_id'] ?? 0);
            if ($roleId === 1) {
                return redirect()->route('admin.dashboard');
            }

            if ($roleId === 2) {
                return redirect()->route('vendor.dashboard');
            }

            // Role based redirect
            switch ($resData['data']['role_name']) {

                case 'Admin':
                    return redirect('/admin/dashboard');

                case 'Vendor':
                case 'Shopkeeper':
                    return redirect()->route('vendor.dashboard');

                case 'Customer':
                    return redirect('/customer/dashboard');

                case 'Support':
                    return redirect('/support/dashboard');

                case 'Delivery Manager':
                    return redirect('/delivery/dashboard');

                case 'Inventory Manager':
                    return redirect('/inventory/dashboard');

                default:
                    return redirect('/dashboard');
            }
        }

        return redirect('/login')
            ->withErrors([
                'error' => $resData['message'] ?? 'Login failed'
            ]);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


    // public function login(Request $request)
    // {   

    // }
}
