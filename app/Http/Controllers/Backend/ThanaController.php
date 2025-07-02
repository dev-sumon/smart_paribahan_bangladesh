<?php

namespace App\Http\Controllers\Backend;

use App\Models\Thana;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Requests\ThanaRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ThanaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(): View
    {
        $data['thanas'] = Thana::with('district.division')->latest()->get();
        return view('backend.thana.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        // $data['districts'] = District::latest()->get();
        return view('backend.thana.create', $data);
    }
    public function store(ThanaRequest $request): RedirectResponse
    {
        $save = new Thana();

        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana = $request->thana;
        $save->status = $request->status ?? 0;

        $save->created_by_id = Auth::guard('admin')->id();
        $save->created_by_guard = 'admin';
        $save->save();
        return redirect()->route('thana.index')->with('success', 'Thana created successfully');
    }
    public function update($id): View
    {
        $data['thana'] = Thana::with('district.division')->findOrFail($id);
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['thana']->division_id)->get();
        return view('backend.thana.edit', $data);
    }
    public function update_store(ThanaRequest $request, $id): RedirectResponse
    {
        $update = Thana::findOrFail($id);

        $update->division_id = $request->division_id;
        $update->district_id = $request->district_id;
        $update->thana = $request->thana;
        $update->status = $request->status ?? 0;


        $update->updated_by_id = Auth::guard('admin')->id();
        $update->updated_by_guard = 'admin';
        $update->save();
        return redirect()->route('thana.index')->with('success', 'Thana updated successfully');
    }
    public function status($id): RedirectResponse
    {
        $thana = Thana::findOrFail($id);
        if ($thana->status == 1) {
            $thana->status = 0;
        } else {
            $thana->status = 1;
        }

        $thana->save();
        return redirect()->route('thana.index')->with('success', 'Thana status updated successfully');

    }
    public function delete($id): RedirectResponse
    {
        $thana = Thana::findOrFail($id);
        $thana->delete();

        return redirect()->route('thana.index')->with('success', 'Thana deleted successfully');
    }
    public function detalis($id): View
    {
        $data['thana'] = Thana::with('district.division')->findOrFail($id);

        return view('backend.thana.show', $data);

    }
}
