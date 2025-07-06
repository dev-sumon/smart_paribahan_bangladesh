<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Thana;
use App\Models\Union;
use App\Models\District;
use App\Models\Division;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\UnionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class FieldWorkerUnionController extends Controller
{
    public function __construct()
    {
        $this->middleware('field_worker');
    }
    public function index(): View
    {
        $data['unions'] = Union::with('division', 'district', 'thana')->latest()->get();
        return view('field_worker.union.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        return view('field_worker.union.create', $data);
    }
    public function store(UnionRequest $request): RedirectResponse
    {
        $save = new Union();

        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union = $request->union;
        $save->status = $request->status ?? 0;


        $save->created_by_id = Auth::guard('field_worker')->id();
        $save->created_by_guard = 'field_worker';
        $save->save();
        return redirect()->route('field_worker.union.index')->with('success', 'Union created successfully done by Field Worker');

    }
    public function update($id): View
    {
        $data['union'] = Union::with('division', 'district', 'thana')->findOrFail($id);
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['union']->division_id)->get();
        $data['thanas'] = Thana::where('district_id', $data['union']->district_id)->get();

        return view('field_worker.union.edit', $data);
    }
    public function update_store(UnionRequest $request, $id): RedirectResponse
    {
        $update = Union::findOrFail($id);

        $update->division_id = $request->division_id;
        $update->district_id = $request->district_id;
        $update->thana_id = $request->thana_id;
        $update->union = $request->union;
        $update->status = $request->status ?? 0;


        $update->updated_by_id = Auth::guard('field_worker')->id();
        $update->updated_by_guard = 'field_worker';
        $update->save();
        return redirect()->route('field_worker.union.index')->with('success', 'Union updated successfully done by Field Worker');
    }
    public function status($id): RedirectResponse
    {
        $union = Union::findOrFail($id);
        if ($union->status == 1) {
            $union->status = 0;
        } else {
            $union->status = 1;
        }

        $union->save();
        return redirect()->route('field_worker.union.index')->with('success', 'Union status updated successfully done by Field Worker');
    }
    public function delete($id): RedirectResponse
    {
        $union = Union::findOrFail($id);
        $union->delete();

        return redirect()->route('field_worker.union.index')->with('success', 'Union deleted successfully done by Field Worker');
    }
    public function detalis($id): View
    {
        $data['union'] = Union::with('division', 'district', 'thana')->findOrFail($id);

        return view('field_worker.union.show', $data);
    }
}
