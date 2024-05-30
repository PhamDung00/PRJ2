<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.page.users.index', ['page_title' => 'Users', 'users' => User::all()]);
    }

    public function create()
    {
        return view('dashboard.page.users.create', ['page_title' => 'Create user']);
    }

    public function store(Request $request)
    {
        DB::table('users')->insert
        ([
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
            'name' => $request['name'],
            'title' => $request['title'],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('dashboard.users');
    }

    public function edit($id)
    {
        return view('dashboard.page.users.edit', ['page_title' => 'Edit user', 'user' => (DB::table('users')->find($id))]);
    }

    public function update(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update
        ([
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
            'name' => $request['name'],
            'title' => $request['title'],
            'updated_at' => now()
        ]);
        return redirect()->route('dashboard.users.edit', $id);
    }

    public function destroy($id)
    {
        DB::table('users')->delete($id);
        return redirect()->route('dashboard.users');
    }
}
