<?php

namespace App\Http\Controllers\Forntend;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class BlogPageController extends Controller
{
    public function index(Request $request): View
    {

        // $query = Blog::query();

        // if ($request->has('search') && $request->search != '') {
        //     $query->where('title', 'like', '%' . $request->search . '%');
        // }

        // $data['blogs'] = Blog::latest()->paginate(3);
        $query = Blog::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $data['blogs'] = $query->latest()->paginate(3);
        return view('forntend.blog.blog', $data);
    }
    public function inner_blog(Request $request, $slug): View
    {

        $data['blog'] = Blog::where('slug', $slug)->firstOrFail();

        $query = Blog::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $data['blogs'] = $query->latest()->take(3)->get();

        return view('forntend.blog.inner_blog.index', $data);

        // $data['blog'] = Blog::where('slug', $slug)->firstOrFail();
        // $data['blogs'] = Blog::latest()->get()->take('3');
        // // $data['blog'] = Blog::where('id', $id)->first();
        // return view('forntend.blog.inner_blog.index', $data);
    }
}
