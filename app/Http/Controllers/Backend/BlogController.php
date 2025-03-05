<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(): View
    {
        $data['blogs'] = Blog::latest()->get();
        return view('backend.blog.index', $data);
    }
    public function create(): View
    {
        return view('backend.blog.create');
    }
    public function store(BlogRequest $request): RedirectResponse
    {
        $save = new Blog();
        $save->title = $request->title;
        $save->description = $request->description;
        $save->status = $request->status ?? 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("blog/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('blog.index');
    }
    public function update($id): View
    {
        $data['blog'] = Blog::findOrFail($id);
        return view('backend.blog.edit', $data);
    }
    public function update_store(BlogRequest $request, $id): RedirectResponse
    {
        $update = Blog::findOrFail($id);

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
        return redirect()->route('blog.index');
    }
    public function status($id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        if($blog->status == 1){
            $blog->status = 0;
        }else{
            $blog->status = 1;
        }
        $blog->save();
        return redirect()->route('blog.index');
    }
    public function delete($id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blog.index');
    }
    public function detalis($id): View
    {
        $data['blog'] = Blog::findOrFail($id);
        return view('backend.blog.show', $data);
    }
}
