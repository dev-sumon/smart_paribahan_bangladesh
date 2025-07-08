<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\District;
use App\Models\Division;
use Illuminate\View\View;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use App\Models\StandCommittee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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


        $save->created_by_id = Auth::guard('field_worker')->id();
        $save->created_by_guard = 'field_worker';
        $save->save();
        return redirect()->route('field_worker.commitee.index')->with('success', 'Stand commitee created successfully by Field Worker');
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
    public function update_store(StandCommiteeRequest $request, $id): RedirectResponse
    {
        // dd($request->all());
        $update = StandCommittee::findOrFail($id);


        $update->name = $request->name;
        $update->designation = $request->designation;
        $update->phone = $request->phone;
        $update->email = $request->email;
        $update->division_id = $request->division_id;
        $update->district_id = $request->district_id;
        $update->thana_id = $request->thana_id;
        $update->union_id = $request->union_id;
        $update->stand_id = $request->stand_id;
        $update->stand_id = $request->stand_id;
        $update->vehicle_type_id = $request->vehicle_type_id;
        $update->status = $request->status ?? 0;

        if ($request->hasFile('image')) {
            if ($update->image && Storage::exists($update->image)) {
                Storage::delete($update->image);
            }

            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("committee/", $filename, 'public');
            $update->image = $path;
        }



        $update->updated_by_id = Auth::guard('field_worker')->id();
        $update->updated_by_guard = 'field_worker';
        $update->save();
        return redirect()->route('field_worker.commitee.index')->with('success', 'Stand commitee updated successfully by Field Worker');
    }
    public function status($id): RedirectResponse
    {
        $commitee = StandCommittee::findOrFail($id);
        if ($commitee->status == 1) {
            $commitee->status = 0;
        } else {
            $commitee->status = 1;
        }
        $commitee->save();
        return redirect()->route('field_worker.commitee.index')->with('success', 'Stand status updated successfully by Field Worker');
    }
    public function delete($id): RedirectResponse
    {
        $commitee = StandCommittee::findOrFail($id);
        $commitee->delete();

        return redirect()->route('field_worker.commitee.index')->with('success', 'Stand deleted successfully by Field Worker');
    }
    public function detalis($id): View
    {
        $data['commitee'] = StandCommittee::with('division', 'district', 'thana', 'union', 'stand')->findOrFail($id);
        return view('field_worker.stand_commitee.show', $data);
    }
}
