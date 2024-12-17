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
        return view('backend.notice.index');
    }
    public function create(): View
    {
        return view('backend.notice.create');
    }
   
}
