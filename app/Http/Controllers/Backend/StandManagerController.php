<?php

namespace App\Http\Controllers\Backend;

use App\Models\Division;
use Illuminate\View\View;
use App\Models\BloodGroup;
use Illuminate\Support\Str;
use App\Models\StandManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StandManagerRequest;

class StandManagerController extends Controller
{
    public function index(): View
    {
        $data['managers'] = StandManager::latest()->get();
        return view('backend.stand_manager.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('backend.stand_manager.create', $data);
    }
    public function store(StandManagerRequest $request): RedirectResponse
    {
        $save = new StandManager();
        $save->title = $request->title;

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;

        while (StandManager::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $save->slug = $request->slug;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->blood_group_id = $request->blood_group_id;
        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->stand_id = $request->stand_id;
        $save->status = $request->status ?? 0;
        $save->password = $request->password;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("stand_mahaers/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();

        return redirect()->route('manager.index');
    }
}
