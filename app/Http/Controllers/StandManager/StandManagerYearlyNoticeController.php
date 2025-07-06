<?php

namespace App\Http\Controllers\StandManager;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\District;
use App\Models\Division;
use Illuminate\View\View;
use App\Models\YearlyNotice;
use Illuminate\Http\Request;
use App\Models\NoticeCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\YearlyNoticeRequest;


class StandManagerYearlyNoticeController extends Controller
{
    public function index(): View
    {
        $standId = auth('stand_manager')->user()->stand_id;

        $data['yearly_notices'] = YearlyNotice::where('stand_id', $standId)->latest()->get();
        // $data['yearly_notices'] = YearlyNotice::latest()->get();
        return view('stand_manager.yearly_notice.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::latest()->get();
        $data['thanas'] = Thana::latest()->get();
        $data['unions'] = Union::latest()->get();
        $data['stands'] = Stand::latest()->get();
        $data['categories'] = NoticeCategory::latest()->get();
        return view('stand_manager.yearly_notice.create', $data);
    }
    public function store(YearlyNoticeRequest $request): RedirectResponse
    {
        $save = new YearlyNotice();

        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->title = $request->title;
        $save->date = $request->date;
        $save->notice_category_id = $request->notice_category_id;
        $save->status = $request->status ?? 0;

        $save->stand_id = Auth::guard('stand_manager')->user()->stand_id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $request->name . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs("notices/", $filename, 'public');
            $save->file = $path;
        }


        $save->created_by_id = Auth::guard('stand_manager')->id();
        $save->created_by_guard = 'stand_manager';
        $save->save();
        return redirect()->route('stand_manager.yearly_notice.index')->with('success', 'Yearly created successfully by Stand Manager');
    }
    public function update($id): View
    {
        $data['yearly_notice'] = YearlyNotice::findOrFail($id);

        $data['categories'] = NoticeCategory::latest()->get();
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::where('division_id', YearlyNotice::findOrFail($id)->division_id)->get();
        $data['thanas'] = Thana::where('district_id', YearlyNotice::findOrFail($id)->district_id)->get();
        $data['unions'] = Union::where('thana_id', YearlyNotice::findOrFail($id)->thana_id)->get();
        $data['stands'] = Stand::where('union_id', YearlyNotice::findOrFail($id)->union_id)->get();


        return view('stand_manager.yearly_notice.edit', $data);
    }
    public function update_store(YearlyNoticeRequest $request, $id)
    {
        $update = YearlyNotice::findOrFail($id);

        $update->division_id = $request->division_id;
        $update->district_id = $request->district_id;
        $update->thana_id = $request->thana_id;
        $update->union_id = $request->union_id;
        // $update->stand_id = $request->stand_id;
        $update->title = $request->title;
        $update->date = $request->date;
        $update->notice_category_id = $request->notice_category_id;
        $update->status = $request->status ?? 0;

        $update->stand_id = Auth::guard('stand_manager')->user()->stand_id;


        if ($request->hasFile('file')) {
            if ($update->iamge && Storage::exists($update->file)) {
                Storage::delete($update->file);
            }
            $file = $request->file('file');
            $filename = $request->name . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs("notices/", $filename, 'public');
            $update->file = $path;
        }
        ;


        $update->updated_by_id = Auth::guard('stand_manager')->id();
        $update->updated_by_guard = 'stand_manager';
        $update->save();
        return redirect()->route('stand_manager.yearly_notice.index')->with('success', 'Yearly Notice updated successfully by Stand Manager');
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
        return redirect()->route('stand_manager.yearly_notice.index')->with('success', 'Yearly notice status updated successfully by Stand Manager');
    }
    public function delete($id): RedirectResponse
    {
        $yearly_notice_status = YearlyNotice::findOrFail($id);
        $yearly_notice_status->delete();

        return redirect()->route('stand_manager.yearly_notice.index')->with('success', 'Yearly notice deleted successfully by Stand Manager');
    }
    public function detalis($id): View
    {
        $data['yearly_notice'] = YearlyNotice::with('noticeCategory', 'division', 'district', 'thana', 'union')->findOrFail($id);
        //  $data['union'] = Union::with('division', 'district', 'thana')->findOrFail($id);
        return view('stand_manager.yearly_notice.show', $data);
    }
}
