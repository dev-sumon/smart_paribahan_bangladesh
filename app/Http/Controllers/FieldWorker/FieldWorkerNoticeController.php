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
use Illuminate\Support\Facades\Storage;

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

    public function update($id): View
    {
        $data['notice'] = Notice::findOrFail($id);
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['notice']->division_id)->get();
        $data['thanas'] = Thana::where('district_id', $data['notice']->district_id)->get();
        $data['unions'] = Union::where('thana_id', $data['notice']->thana_id)->get();
        $data['stands'] = Stand::where('union_id', $data['notice']->union_id)->get();
        $data['categories'] = NoticeCategory::latest()->get();


        return view('field_worker.notice.edit', $data);
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

        $update->save();
        return redirect()->route('field_worker.notice.index');
    }
}
