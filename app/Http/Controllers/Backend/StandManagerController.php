<?php

namespace App\Http\Controllers\Backend;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Vehicle;
use App\Models\District;
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
    public function __construct()
    {
        $this->middleware('admin');
    }
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
    public function update($id): View
    {

        $data['manager'] = StandManager::with('division', 'district', 'thana', 'union', 'stand', 'vehicle')->findOrFail($id);
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['manager']->division_id)->get();
        $data['thanas'] = Thana::where('district_id', $data['manager']->district_id)->get();
        $data['unions'] = Union::where('thana_id', $data['manager']->thana_id)->get();
        $data['stands'] = Stand::where('id', $data['manager']->stand_id)->get();
        $data['vehicles'] = Vehicle::where('id', $data['manager']->vehicle_id)->get();
        $data['bloods'] = BloodGroup::latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('backend.stand_manager.edit', $data);
    }
    public function update_store(StandManagerRequest $request, $id): RedirectResponse
    {
        $manager = StandManager::findOrFail($id);

        $manager->title = $request->title;

        if ($manager->title !== $request->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;

            while (StandManager::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $manager->slug = $slug;
        }

        $manager->email = $request->email;
        $manager->phone = $request->phone;
        $manager->blood_group_id = $request->blood_group_id;
        $manager->division_id = $request->division_id;
        $manager->district_id = $request->district_id;
        $manager->thana_id = $request->thana_id;
        $manager->union_id = $request->union_id;
        $manager->stand_id = $request->stand_id;
        $manager->status = $request->status ?? 0;

        if ($request->filled('password')) {
            $manager->password = $request->password;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("stand_mahaers/", $filename, 'public');
            $manager->image = $path;
        }

        $manager->save();

        return redirect()->route('manager.index');
    }
    public function status($id): RedirectResponse
    {
        $manager = StandManager::find($id);
        if($manager->status == 1){
            $manager->status = 0;
        }else{
            $manager->status = 1;
        }
        $manager->save();
        return redirect()->route('manager.index');
    }
    public function delete($id): RedirectResponse
    {
        $manager = StandManager::find($id);
        $manager->delete();

        return redirect()->route('manager.index');
    }
    public function detalis($id): View
    {
        $data['manager'] = StandManager::with('division', 'district', 'thana', 'union', 'stand')->find($id);
        return view('backend.stand_manager.show', $data);
    }
}
