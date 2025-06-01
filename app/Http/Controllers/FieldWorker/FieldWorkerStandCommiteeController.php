<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\District;
use App\Models\Division;
use App\Models\VehicleType;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\StandCommittee;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StandCommiteeRequest;

class FieldWorkerStandCommiteeController extends Controller
{
    public function index(): View
    {
        $data['commitees'] = StandCommittee::latest()->get();
        return view('field_worker.stand_commitee.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        return view('field_worker.stand_commitee.create', $data);
    }
    public function store(StandCommiteeRequest $request): RedirectResponse
    {
        $save = new StandCommittee();

        $save->name = $request->name;
        $save->designation = $request->designation;
        $save->phone = $request->phone;
        $save->email = $request->email;
        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->stand_id = $request->stand_id;
        $save->status = $request->status ?? 0;

        if ($request->hasFile('image')) {
            if ($save->image && Storage::exists($save->image)) {
                Storage::delete($save->image);
            }
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("committee/", $filename, 'public');
            $save->image = $path;
        } else {
            $save->image = '';
        }


        $save->save();
        return redirect()->route('field_worker.commitee.index');
    }
    public function update($id): View
    {
        $data['commitee'] = StandCommittee::with('division', 'district', 'thana', 'union', 'stand')->findOrFail($id);
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['commitee']->division_id)->get();
        $data['thanas'] = Thana::where('district_id', $data['commitee']->district_id)->get();
        $data['unions'] = Union::where('thana_id', $data['commitee']->thana_id)->get();
        $data['stands'] = Stand::where('union_id', $data['commitee']->union_id)->get();
        $data['vehicleTypes'] = VehicleType::where('stand_id', $data['commitee']->stand_id)->get();

        return view('field_worker.stand_commitee.edit', $data);
    }
}
