<?php

namespace App\Http\Controllers\StandManager;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Notice;
use App\Models\District;
use App\Models\Division;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\NoticeCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StandManagerNoticeController extends Controller
{
    public function standManagerIndex(Request $request): View
    {
        $standId = auth('stand_manager')->user()->stand_id;
        $data['notices'] = Notice::where('stand_id', $standId)->latest()->get();
        return view('stand_manager.notice.index', $data);
    }
    public function create(Request $request): View
    {
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::latest()->get();
        $data['thanas'] = Thana::latest()->get();
        $data['unions'] = Union::latest()->get();
        $data['stands'] = Stand::latest()->get();
        $data['categories'] = NoticeCategory::latest()->get();
        return view('stand_manager.notice.create', $data);
    }
    public function store(NoticeRequest $request): RedirectResponse
    {
        $save = new Notice();

        $save->title = $request->title;
        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        // $save->stand_id = $request->stand_id;
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
        return redirect()->route('stand_manager.notice.stand.manager.index')->with('success', 'Notice created successfully by Stand Manager');
    }

    public function update($id): View
    {
        $data['notice'] = Notice::with('division', 'district', 'thana')->findOrFail($id);
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['notice']->division_id)->get();
        $data['thanas'] = Thana::where('district_id', $data['notice']->district_id)->get();
        $data['unions'] = Union::where('thana_id', $data['notice']->thana_id)->get();
        $data['stands'] = Stand::where('union_id', $data['notice']->union_id)->get();
        $data['categories'] = NoticeCategory::latest()->get();
        return view('stand_manager.notice.edit', data: $data);
    }
    public function update_store(NoticeRequest $request, $id): RedirectResponse
    {
        $update = Notice::findOrFail($id);


        $update->title = $request->title;
        $update->division_id = $request->division_id;
        $update->district_id = $request->district_id;
        $update->thana_id = $request->thana_id;
        $update->union_id = $request->union_id;
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


        $update->updated_by_id = Auth::guard('stand_manager')->id();
        $update->updated_by_guard = 'stand_manager';
        $update->save();

        return redirect()->route('stand_manager.notice.stand.manager.index')->with('success', 'Notice updated successfully by Stand Manager');
    }
    public function status($id): RedirectResponse
    {
        $notice = Notice::findOrFail($id);
        if ($notice->status == 1) {
            $notice->status = 0;
        } else {
            $notice->status = 1;
        }
        $notice->save();
        return redirect()->route('stand_manager.notice.stand.manager.index')->with('success', 'Notice status updated successfully by Stand Manager');
    }
    public function delete($id): RedirectResponse
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return redirect()->route('stand_manager.notice.stand.manager.index')->with('success', 'Notice deleted successfully by Stand Manager');
    }
    public function detalis($id): view
    {
        $data['notice'] = Notice::with('noticeCategory')->findOrFail($id);
        return view('stand_manager.notice.show', $data);
    }

}
