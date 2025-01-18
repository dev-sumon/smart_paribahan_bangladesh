<?php

namespace App\Http\Controllers\Backend;

use App\Models\Thana;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnionRequest;
use Illuminate\Http\RedirectResponse;

class UnionController extends Controller
{
    public function index(): View
    {
        return view('backend.union.index');
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::latest()->get();
        $data['thanas'] = Thana::latest()->get();
        return view('backend.union.create', $data);
    }
    public function store(UnionRequest $request): RedirectResponse
    {
        $save = new Union();

        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union = $request->union;
        $save->status = $request->status ?? 0;

        $save->save();
        return redirect()->route('union.index');

    }
}
