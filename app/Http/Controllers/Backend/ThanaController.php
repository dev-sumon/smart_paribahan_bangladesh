<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ThanaController extends Controller
{
    public function index(): View
    {
        return view('backend.thana.index');
    }
}
