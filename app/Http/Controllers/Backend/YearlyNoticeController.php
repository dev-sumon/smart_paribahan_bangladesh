<?php

namespace App\Http\Controllers\Backend;

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
use App\Http\Requests\YearlyNoticeRequest;

class YearlyNoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(): View
    {
        $data['yearly_notices'] = YearlyNotice::latest()->get();
        return view('backend.yearly_notice.index', $data);
    }
    public function create(): View
    {
        $data['categories'] = NoticeCategory::latest()->get();
        $data['divisions'] = Division::with(['districts', 'thanas', 'unions', 'stands'])->latest()->get();
        return view('backend.yearly_notice.create', $data);
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


        $save->save();
        return redirect()->route('yearly_notice.index')->with('success', 'Yearly notice created successfully');
    }
    public function update($id)
    {
        $data['yearly_notice'] = YearlyNotice::findOrFail($id);

        $data['categories'] = NoticeCategory::latest()->get();
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::where('division_id', YearlyNotice::findOrFail($id)->division_id)->get();
        $data['thanas'] = Thana::where('district_id', YearlyNotice::findOrFail($id)->district_id)->get();
        $data['unions'] = Union::where('thana_id', YearlyNotice::findOrFail($id)->thana_id)->get();
        $data['stands'] = Stand::where('union_id', YearlyNotice::findOrFail($id)->union_id)->get();
        return view('backend.yearly_notice.edit', $data);
    }
    public function update_store(YearlyNoticeRequest $request, $id): RedirectResponse
    {
        $update = YearlyNotice::findOrFail($id);

        $update->division_id = $request->division_id;
        $update->district_id = $request->district_id;
        $update->thana_id = $request->thana_id;
        $update->union_id = $request->union_id;
        $update->stand_id = $request->stand_id;
        $update->title = $request->title;
        $update->date = $request->date;
        $update->notice_category_id = $request->notice_category_id;
        $update->status = $request->status ?? 0;

        if ($request->hasFile('file')) {
            if ($update->file && \Storage::disk('public')->exists($update->file)) {
                \Storage::disk('public')->delete($update->file);
            }

            $file = $request->file('file');
            $filename = ($request->name ?? 'notice_') . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs("notices/", $filename, 'public');
            $update->file = $path;
        }

        $update->save();

        return redirect()->route('yearly_notice.index')->with('success', 'Yearly notice updated successfully');
    }
    public function status($id): RedirectResponse
    {
        $yearly_notice_status = YearlyNotice::findOrFail($id);
        if ($yearly_notice_status->status == 1) {
            $yearly_notice_status->status = 0;
        } else {
            $yearly_notice_status->status = 1;
        }

        $yearly_notice_status->save();
        return redirect()->route('yearly_notice.index')->with('success', 'Yearly notice status updated successfully');
    }
    public function delete($id): RedirectResponse
    {
        $yearly_notice_status = YearlyNotice::findOrFail($id);
        $yearly_notice_status->delete();

        return redirect()->route('yearly_notice.index')->with('success', 'Yearly notice deleted successfully');
    }
}
