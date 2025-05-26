<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Blog;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class FieldWorkerBlogController extends Controller
{
        public function index(): View
    {
        $data['blogs'] = Blog::latest()->get();
        return view('field_worker.blog.index', $data);
    }
        public function create(): View
    {
        return view('field_worker.blog.create');
    }
    public function store(BlogRequest $request): RedirectResponse
    {
        $save = new Blog();
        $save->title = $request->title;
        $save->slug = $request->slug;
        $save->description = $request->description;
        $save->creator = auth('admin')->user()->name;
        $save->status = $request->status ?? 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("blog/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('field_worker.blog.index');
    }
        public function update($slug): View
    {
        $data['blog'] = Blog::where('slug',$slug)->firstOrFail();
        return view('field_worker.blog.edit', $data);
    }
    public function update_store(BlogRequest $request, $slug): RedirectResponse
    {
        $update = Blog::where('slug',$slug)->firstOrFail();

        $update->title = $request->title;
        $update->description = $request->description;
        $update->status = $request->status ?? 0;

        if ($request->hasFile('image')) {
            if ($update->image && Storage::disk('public')->exists($update->image)) {
                Storage::disk('public')->delete($update->image);
            }
        
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('blog', $filename, 'public');
            $update->image = $path;
        }

        

        $update->save();
        return redirect()->route('field_worker.blog.index');
    }
}
