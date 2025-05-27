<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Union;
use App\Models\Division;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\UnionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class FieldWorkerUnionController extends Controller
{
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

        $save->save();
        return redirect()->route('field_worker.union.index');

    }
}
