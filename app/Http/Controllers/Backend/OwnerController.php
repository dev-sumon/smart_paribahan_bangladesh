<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OwnerRequest;
use App\Models\Owner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index(): View
    {
        $data['owners'] = Owner::latest()->get();
        return view('backend.owner.index', $data);
    }
    public function create(): View
    {
        return view('backend.owner.create');
    }
    public function store(OwnerRequest $request): RedirectResponse
    {
        $save = new Owner();
        $save->name = $request->name;
        $save->description = $request->description;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->license_number = $request->license_number;
        $save->blood_group = $request->blood_group;
        $save->password = $request->password;
        $save->status = $request->status ?? 0;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time(). '.' .$image->getClientOriginalExtension();
            $path = $image->storeAs("owner/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('owner.index');
    }
    public function update($id): View
    {
        $data['owner'] = Owner::findOrFail($id);
        return view('backend.owner.edit', $data);
    }
}
