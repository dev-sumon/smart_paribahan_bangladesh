<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index(): View
    {
        $data['notices'] = Notice::latest()->get();
        return view('backend.notice.index', $data);
    }
    public function create(): View
    {
        return view('backend.notice.create');
    }
    public function store(NoticeRequest $request): RedirectResponse
    {
        $save = new Notice();

        $save->title = $request->title;
        $save->date = $request->date;
        $save->category = $request->category;
        $save->status = $request->status ?? 0;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $request->name . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs("notices/", $filename, 'public');
            $save->file = $path;
        }        

        $save->save();
        return redirect()->route('notice.index');
    }
}
