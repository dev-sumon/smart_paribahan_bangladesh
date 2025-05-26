<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Blog;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FieldWorkerBlogController extends Controller
{
        public function index(): View
    {
        $data['blogs'] = Blog::latest()->get();
        return view('field_worker.blog.index', $data);
    }
}
