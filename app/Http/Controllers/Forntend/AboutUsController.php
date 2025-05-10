<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        return view('forntend.about_us.index');
    }
}
