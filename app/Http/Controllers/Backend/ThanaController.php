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

class ThanaController extends Controller
{
    public function index(): View
    {
       
        return view('backend.thana.index');
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::latest()->get();
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
}
