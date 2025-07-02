<?php

namespace App\Http\Controllers\Backend;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Notice;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\NoticeCategory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(): View
    {
        $data['notices'] = Notice::latest()->get();
        return view('backend.notice.index', $data);
    }
    public function create(): View
    {
        $data['categories'] = NoticeCategory::latest()->get();
        $data['divisions'] = Division::with(['districts', 'thanas', 'unions', 'stands'])->latest()->get();
        return view('backend.notice.create', $data);
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


        $save->created_by_id = Auth::guard('admin')->id();
        $save->created_by_guard = 'admin';
        $save->save();
        return redirect()->route('notice.index')->with('success', 'Notice created successfully');
    }
    public function update($id): View
    {

        $data['notice'] = Notice::findOrFail($id);
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['notice']->division_id)->get();
        $data['thanas'] = Thana::where('district_id', $data['notice']->district_id)->get();
        $data['unions'] = Union::where('thana_id', $data['notice']->thana_id)->get();
        $data['stands'] = Stand::where('union_id', $data['notice']->union_id)->get();
        $data['categories'] = NoticeCategory::latest()->get();



        return view('backend.notice.edit', $data);
    }
    public function update_store(NoticeRequest $request, $id): RedirectResponse
    {
        $update = Notice::findOrFail($id);

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
            if ($update->iamge && Storage::exists($update->file)) {
                Storage::delete($update->file);
            }
            $file = $request->file('file');
            $filename = $request->name . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs("notices/", $filename, 'public');
            $update->file = $path;
        }
        ;

        $update->updated_by_id = Auth::guard('admin')->id();
        $update->updated_by_guard = 'admin';
        $update->save();
        return redirect()->route('notice.index')->with('success', 'Notice updated successfully');
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
        return redirect()->route('notice.index')->with('success', 'Notice status updated successfully');
    }
    public function delete($id): RedirectResponse
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return redirect()->route('notice.index')->with('success', 'Notice deleted successfully');
    }
    public function detalis($id): view
    {
        $data['notice'] = Notice::with('noticeCategory')->findOrFail($id);
        return view('backend.notice.show', $data);
    }
}
