<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Models\District;
use App\Models\Division;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(): View
    {
        $data['districts'] = District::with('division')->latest()->get();
        return view('backend.district.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        return view('backend.district.create', $data);
    }
    public function store(DistrictRequest $request): RedirectResponse
    {
        $save = new District();

        $save->division_id = $request->division_id;
        $save->district = $request->district;
        $save->status = $request->status ?? 0;

        $save->save();
        return redirect()->route('district.index');
    }
    public function update($id): View
    {
        $data['district'] = District::findOrFail($id);
        $data['divisions'] = Division::latest()->get();

        return view('backend.district.edit', $data);
    }
    public function update_store(DistrictRequest $request, $id): RedirectResponse
    {
        $update = District::findOrFail($id);


        $update->division_id = $request->division_id;
        $update->district = $request->district;
        $update->status = $request->status ?? 0;


        $update->save();
        return redirect()->route('district.index');

    }
    public function status($id): RedirectResponse
    {
        $district = District::findOrFail($id);
        if($district->status == 1){
            $district->status = 0;
        }else{
            $district->status = 1;
        }

        $district->save();
        return redirect()->route('district.index');


        // $Division = Division::findOrFail($id);
        // if($Division->status == 1){
        //     $Division->status = 0;
        // }else{
        //     $Division->status = 1;
        // }

        // $Division->save();
        // return redirect()->route('division.index');
    }
}
