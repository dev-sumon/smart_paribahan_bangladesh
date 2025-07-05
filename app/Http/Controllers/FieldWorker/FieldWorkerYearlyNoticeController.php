<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\YearlyNotice;
use Illuminate\Http\Request;
use App\Models\NoticeCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\YearlyNoticeRequest;

class FieldWorkerYearlyNoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('field_worker');
    }
    public function index(): View
    {
        $data['yearly_notices'] = YearlyNotice::latest()->get();
        return view('field_worker.yearly_notice.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::latest()->get();
        $data['thanas'] = Thana::latest()->get();
        $data['unions'] = Union::latest()->get();
        $data['stands'] = Stand::latest()->get();
        $data['categories'] = NoticeCategory::latest()->get();
        return view('field_worker.yearly_notice.create', $data);
    }
    public function store(YearlyNoticeRequest $request): RedirectResponse
    {
        $save = new YearlyNotice();

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


        $save->created_by_id = Auth::guard('field_worker')->id();
        $save->created_by_guard = 'field_worker';
        $save->save();
        return redirect()->route('field_worker.yearly_notice.index')->with('success','Yearly created successfully by Field Worker');
    }
}
