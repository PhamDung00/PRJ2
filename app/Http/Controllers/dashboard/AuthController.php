<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('dashboard.page.auth.login', ['page_title' => 'Login to Dashboard']);
        }
    }

    public function onLogin(Request $request) {
        if(Auth::attempt
        ([
            'username' => $request['username'],
            'password' => ($request['password'])
        ]))
        {
            return redirect()->route('dashboard');
        } else {
            $res = [
                'status' => 'error',
                'msg' => 'Thông tin đăng nhập không chính xác'
            ];
            return view('dashboard.page.auth.login', ['page_title' => 'Login to Dashboard', 'res' => $res]);
        }
    }

    public function onLogout() {
        Auth::logout();
        return redirect()->route('dashboard.auth.login');
    }
}
