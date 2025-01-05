<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BloodGroupRequest;
use App\Models\BloodGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BloodGroupController extends Controller
{
    public function index(): View
    {
        $data['bloods'] = BloodGroup::latest()->get();
        return view('backend.blood_group.index', $data);
    }
    public function create(): View
    {
        return view('backend.blood_group.create');
    }
    public function store(BloodGroupRequest $request): RedirectResponse
    {
        $save = new BloodGroup();

        $save->blood_group = $request->blood_group;
        $save->status = $request->status ?? 0;

        $save->save();
        return redirect()->route('blood.index');
    }
    public function update($id): View
    {
        $data['blood'] = BloodGroup::findOrFail($id);
        return view('backend.blood_group.edit', $data);
    }
    public function update_store(BloodGroupRequest $request, $id): RedirectResponse
    {
        $update = BloodGroup::findOrFail($id);

        $update->blood_group = $request->blood_group;
        $update->status = $request->status ?? 0;

        $update->save();
        return redirect()->route('blood.index');
    }
    public function status($id): RedirectResponse
    {
        $blood = BloodGroup::findOrFail($id);
        if($blood->status == 1){
            $blood->status = 0;
        }else{
            $blood->status = 1;
        }

        $blood->save();
        return redirect()->route('blood.index');
    }
    public function delete($id): RedirectResponse
    {
        $blood = BloodGroup::findOrFail($id);
        $blood->delete();

        return redirect()->route('blood.index');
    }
}
