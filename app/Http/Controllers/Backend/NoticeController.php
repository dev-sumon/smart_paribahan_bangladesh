<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function update($id): View
    {
        $data['notice'] = Notice::findOrFail($id);
        return view('backend.notice.edit', $data);
    }
    public function update_store(NoticeRequest $request, $id): RedirectResponse
    {
        $update = Notice::findOrFail($id);

        $update->title = $request->title;
        $update->date = $request->date;
        $update->category = $request->category;
        $update->status = $request->status ?? 0;


        if ($request->hasFile('file')) {
            if ($update->file && Storage::exists($update->file)) {
                Storage::delete($update->file);
            }
    
            $file = $request->file('file');
            $filename = $request->name . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs("notices/", $filename, 'public');
            $update->file = $path;
        }
        $update->save();
        return redirect()->route('notice.index');
    }
    public function status($id): RedirectResponse
    {
        $notice = Notice::findOrFail($id);
        if($notice->status == 1){
            $notice->status = 0;
        }else{
            $notice->status = 1;
        }
        $notice->save();
        return redirect()->route('notice.index');
    }
    public function delete($id): RedirectResponse
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return redirect()->route('notice.index');
    }
    public function detalis($id): view
    {
        $data['notice'] = Notice::findOrFail($id);
        return view('backend.notice.show', $data);
    }
}
