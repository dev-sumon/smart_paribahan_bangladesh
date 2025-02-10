<?php

namespace App\Http\Controllers\Backend;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Requests\StandRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StandController extends Controller
{
    public function index(): View
    {
        $data['stands'] = Stand::latest()->get();
        return view('backend.stand.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        return view('backend.stand.create', $data);
    }
    public function store(StandRequest $request): RedirectResponse
    {
        $save = new Stand();
        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->name = $request->name;
        $save->description = $request->description;
        $save->location = $request->location;
        $save->status = $request->has('status') ? $request->status : 0;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("stands/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('stand.index');
    }
    public function update($id):View
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union')->findOrFail($id);
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['stand']->division_id)->get();
        $data['thanas'] = Thana::where('district_id', $data['stand']->district_id)->get();
        $data['unions'] = Union::where('thana_id', $data['stand']->thana_id)->get();
        return view('backend.stand.edit', $data);
    }
    public function update_store(StandRequest $request, $id):RedirectResponse
    {
        $update = Stand::findOrFail($id);
        $update->name = $request->name;
        $update->description = $request->description;
        $update->location = $request->location;
        $update->status = $request->status ?? 0;

        if ($request->hasFile('image')) {
            if ($update->iamge && Storage::exists($update->image)) {
                Storage::delete($update->image);
            }
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("stands/", $filename, 'public');
            $update->image = $path;
        };
        

        $update->save();
        return redirect()->route('stand.index');
    }
    public function status($id): RedirectResponse{
        $stand = Stand::findOrFail($id);
        if($stand->status == 1){
            $stand->status = 0;
        }else{
            $stand->status = 1;
        }
        $stand->save();
        return redirect()->route('stand.index');
    }
    public function delete($id): RedirectResponse
    {
        $stand = Stand::findOrFail($id);
        $stand->delete();

        return redirect()->route('stand.index');
    }
    public function detalis($id): View
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union')->findOrFail($id);
        return view('backend.stand.show', $data);
    }
}
