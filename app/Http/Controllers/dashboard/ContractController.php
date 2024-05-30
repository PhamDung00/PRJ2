<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Submit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    public function index()
    {
        return view('dashboard.page.contracts.index', ['page_title' => 'Contracts', 'contracts' => Contract::all()]);
    }

    public function edit($id)
    {
        return view('dashboard.page.contracts.edit', ['page_title' => 'Edit contract', 'contract' => DB::table('contracts')->find($id)]);
    }

    public function update(Request $request, $id)
    {
        DB::table('contracts')->where('id', '=', $id)->update
        ([
            'end_date' => $request['end_date'],
            'updated_at' => now()
        ]);
        return redirect()->route('dashboard.contracts.edit', $id);
    }

    public function destroy($id)
    {
        DB::table('contracts')->delete($id);
        return redirect()->route('dashboard.contracts');
    }
}
