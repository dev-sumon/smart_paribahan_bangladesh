<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
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
        $save->slug = $request->slug;
        $save->description = $request->description;
        // $save->creator = auth('admin')->user()->name;
        $save->status = $request->status ?? 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("blog/", $filename, 'public');
            $save->image = $path;
        }


        $save->created_by_id = Auth::guard('admin')->id();
        $save->created_by_guard = 'admin';
        $save->save();
        return redirect()->route('blog.index')->with('success', 'Blog created successfully');
    }
    public function update($slug): View
    {
        $data['blog'] = Blog::where('slug',$slug)->firstOrFail();
        return view('backend.blog.edit', $data);
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

        

        $update->updated_by_id = Auth::guard('admin')->id();
        $update->updated_by_guard = 'admin';
        $update->save();
        return redirect()->route('blog.index')->with('success', 'Blog updated successfully');
    }
    public function status($slug): RedirectResponse
    {
         $blog= Blog::where('slug',$slug)->firstOrFail();
        if($blog->status == 1){
            $blog->status = 0;
        }else{
            $blog->status = 1;
        }
        $blog->save();
        return redirect()->route('blog.index')->with('success', 'Blog status update successfully');
    }
    public function delete($slug): RedirectResponse
    {
        $blog = Blog::where('slug',$slug)->firstOrFail();
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully');
    }
    public function detalis($slug): View
    {
        $data['blog'] = Blog::where('slug',$slug)->firstOrFail();
        return view('backend.blog.show', $data);
    }
}
