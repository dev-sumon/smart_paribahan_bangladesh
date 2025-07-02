<?php

namespace App\Http\Controllers\Backend;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DistrictRequest;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
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

        $save->created_by_id = Auth::guard('admin')->id();
        $save->created_by_guard = 'admin';
        $save->save();
        return redirect()->route('district.index')->with('success', 'District created successfully');
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


        $update->updated_by_id = Auth::guard('admin')->id();
        $update->updated_by_guard = 'admin';
        $update->save();
        return redirect()->route('district.index')->with('success', 'District updated successfully');

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
        return redirect()->route('district.index')->with('success','District status updated successfully');
    }
    public function delete($id): RedirectResponse
    {
        $district = District::findOrFail($id);
        $district->delete();

        return redirect()->route('district.index')->with('success','District deleted successfully');
    }
    public function detalis($id): View
    {
        $data['district'] = District::with('division')->findOrFail($id);
        $data['district'] = District::findOrFail($id);

        return view('backend.district.show', $data);
    }
}
