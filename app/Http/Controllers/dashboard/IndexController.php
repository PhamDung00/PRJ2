<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('dashboard.page.index', ['page_title' => 'Dashboard']);
    }
}
