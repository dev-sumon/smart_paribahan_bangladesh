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
    public function index():View
    {
        return view('backend.blood_group.index');
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
}
