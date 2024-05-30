<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Motel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use function Sodium\add;

class MotelController extends Controller
{
    public function index()
    {
        return view('dashboard.page.motels.index', ['page_title' => 'Motels', 'motels' => Motel::all()]);
    }

    public function create()
    {
        return view('dashboard.page.motels.create', ['page_title' => 'Create motel']);
    }

    public function store(Request $request)
    {
        try {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageUrl = asset('upload').'/'.($imageName);
            $image->move(public_path('upload'), $imageName);
            DB::table('motels')->insert
            ([
                'room_number' => $request['room_number'],
                'room_site' => $request['room_site'],
                'room_type' => $request['room_type'],
                'price' => $request['price'],
                'image_url' => $imageUrl,
                'details' => $request['details'],
                'description' => $request['description'],
                'user_id' => Auth::user()->id,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return redirect()->route('dashboard.motels');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        return view('dashboard.page.motels.edit', ['page_title' => 'Edit motel', 'motel' => DB::table('motels')->find($id)]);
    }

    public function update(Request $request, $id)
    {
        $params = $request->except(['_method', '_token', 'image']);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageUrl = asset('upload') . '/' . ($imageName);
            $image->move(public_path('upload'), $imageName);
            $params['image_url'] = $imageUrl;
        }
        DB::table('motels')->where('id', '=', $id)->update
        (
            $params
        );
        return redirect()->route('dashboard.motels.edit', $id);
    }

    public function destroy($id)
    {
        $contract = DB::table('contracts')->where('motel_id', '=', $id)->first();
        DB::table('transactions')->where('contract_id', '=', $contract->id)->delete();
        DB::table('contracts')->where('motel_id', '=', $id)->delete();
        DB::table('submits')->where('motel_id', '=', $id)->delete();
        DB::table('motels')->delete($id);
        return redirect()->route('dashboard.motels');
    }
}
