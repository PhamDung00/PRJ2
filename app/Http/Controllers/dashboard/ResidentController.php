<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Motel;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResidentController extends Controller
{
    public function index()
    {
        return view('dashboard.page.residents.index', ['page_title' => 'Residents', 'residents' => Resident::all()]);
    }

    public function create()
    {
        return view('dashboard.page.residents.create',
            [
                'page_title' => 'Create resident',
                'effect_contracts' => Contract::all()->where('end_date', '>', date('Y-m-d'))
            ]
        );
    }

    public function store(Request $request)
    {
        DB::table('residents')->insert
        ([
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'motel_id' => $request['motel_id'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('dashboard.residents');
    }

    public function edit($id)
    {
        return view('dashboard.page.residents.edit',
            [
                'page_title' => 'Edit resident',
                'resident' => DB::table('residents')->find($id),
                'effect_contracts' => Contract::all()->where('end_date', '>', date('Y-m-d'))
            ]
        );
    }

    public function update(Request $request, $id)
    {
        DB::table('residents')->where('id', '=', $id)->update
        ([
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'motel_id' => $request['motel_id'],
            'updated_at' => now()
        ]);
        return redirect()->route('dashboard.residents');
    }

    public function destroy($id)
    {
        DB::table('residents')->delete($id);
        return redirect()->back();
    }
}
