<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        return view('dashboard.page.customers.index', ['page_title' => 'Customers', 'customers' => Customer::all()]);
    }

    public function create()
    {
        return view('dashboard.page.customers.create', ['page_title' => 'Create customer']);
    }

    public function store(Request $request)
    {
        DB::table('customers')->insert
        ([
            'name' => $request['name'],
            'dob' => $request['dob'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('dashboard.customers');
    }

    public function edit($id)
    {
        return view('dashboard.page.customers.edit', ['page_title' => 'Edit customer', 'customer' =>DB::table('customers')->find($id)]);
    }

    public function update(Request $request, $id)
    {
        DB::table('customers')->where('id', '=', $id)->update
        ([
            'name' => $request['name'],
            'dob' => $request['dob'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'updated_at' => now()
        ]);
        return redirect()->route('dashboard.customers.edit', $id);
    }

    public function destroy($id)
    {
        DB::table('customers')->delete($id);
        return redirect()->route('dashboard.customers');
    }
}
