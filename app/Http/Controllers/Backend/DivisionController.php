<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DivisionReqest;
use App\Models\Division;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(): View
    {
        $data['divisions'] = Division::latest()->get();
        return view('backend.division.index', $data);
    }
    public function create(): View
    {
        return view('backend.division.create');
    }
    public function store(DivisionReqest $request): RedirectResponse
    {
        $save = new Division();

        $save->division = $request->division;
        $save->status = $request->status ?? 0;

        $save->save();
        return redirect()->route('division.index')->with('success','Division created successfully');
    }
    public function update($id): View
    {
        $data['division'] = Division::findOrFail($id);
        return view('backend.division.edit', $data);
    }
    public function update_store(DivisionReqest $request, $id): RedirectResponse
    {
        $update = Division::findOrFail($id);

        $update->division = $request->division;
        $update->status = $request->status ?? 0;

        $update->save();
        return redirect()->route('division.index')->with('success','Division updated successfully');
    }
    public function status($id): RedirectResponse
    {
        $Division = Division::findOrFail($id);
        if($Division->status == 1){
            $Division->status = 0;
        }else{
            $Division->status = 1;
        }

        $Division->save();
        return redirect()->route('division.index')->with('success','Division status updated successfully');
    }
    public function delete($id): RedirectResponse
    {
        $division = Division::findOrFail($id);
        $division->delete();

        return redirect()->route('division.index')->with('success','Division deleted successfully');
    }
    public function detalis($id): View
    {
        $data['division'] = Division::findOrFail($id);
        return view('backend.division.show', $data);
    }
}
