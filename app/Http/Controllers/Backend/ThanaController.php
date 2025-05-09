<?php

namespace App\Http\Controllers\Backend;

use App\Models\Thana;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Requests\ThanaRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use PhpParser\Node\Stmt\Return_;

class ThanaController extends Controller
{
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

        $save->save();
        return redirect()->route('thana.index');
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

        $update->save();
        return redirect()->route('thana.index');
    }
    public function status($id): RedirectResponse
    {
        $thana = Thana::findOrFail($id);
        if($thana->status == 1){
            $thana->status = 0;
        }else{
            $thana->status = 1;
        }

        $thana->save();
        return redirect()->route('thana.index');

    }
    public function delete($id): RedirectResponse
    {
        $thana = Thana::findOrFail($id);
        $thana->delete();

        return redirect()->route('thana.index');
    }
    public function detalis($id): View
    {
        $data['thana'] = Thana::with('district.division')->findOrFail($id);

        return view('backend.thana.show', $data);

    }
}
