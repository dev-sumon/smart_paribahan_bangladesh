<?php

namespace App\Http\Controllers\Backend;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\StandCommittee;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StandCommiteeRequest;

class StandCommiteeController extends Controller
{
    public function index(): View
    {
        $data['commitees'] = StandCommittee::latest()->get();
        return view('backend.stand_commitee.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        return view('backend.stand_commitee.create', $data);
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
        return redirect()->route('commitee.index');
    }
}
