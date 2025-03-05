<?php

namespace App\Http\Controllers\Forntend;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class BlogPageController extends Controller
{
    public function index(): View
    {
        $data['blogs'] = Blog::latest()->paginate(3);
        return view('forntend.blog.blog', $data);
    }
    public function inner_blog($id): View
    {
        $data['blog'] = Blog::find($id);
        // $data['blog'] = Blog::where('id', $id)->first();
        return view('forntend.blog.inner_blog.index', $data);
    }
}
