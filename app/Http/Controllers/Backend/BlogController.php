<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('backend.blog.index');
    }
    public function create(): View
    {
        return view('backend.blog.create');
    }
}
