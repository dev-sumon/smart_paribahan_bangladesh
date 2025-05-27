<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Notice;
use App\Models\District;
use App\Models\Division;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\NoticeCategory;
use App\Http\Requests\UnionRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use Illuminate\Http\RedirectResponse;

class FieldWorkerNoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('field_worker');
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::latest()->get();
        $data['thanas'] = Thana::latest()->get();
        $data['unions'] = Union::latest()->get();
        $data['stands'] = Stand::latest()->get();
        $data['categories'] = NoticeCategory::latest()->get();
        return view('field_worker.notice.create', $data);
    }
    public function index(): View
    {
        $data['notices'] = Notice::latest()->get();
        return view('field_worker.notice.index', $data);
    }
    public function store(NoticeRequest $request): RedirectResponse
    {
        $save = new Notice();

        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->stand_id = $request->stand_id;
        $save->title = $request->title;
        $save->date = $request->date;
        $save->notice_category_id = $request->notice_category_id;
        $save->status = $request->status ?? 0;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $request->name . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs("notices/", $filename, 'public');
            $save->file = $path;
        }
        

        $save->save();
        return redirect()->route('field_worker.notice.index');
    }
}
