<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function index(): View
    {
        return view('forntend.blog.blog');
    }
    public function inner_blog(): View
    {
        return view('forntend.blog.inner_blog.index');
    }
}
