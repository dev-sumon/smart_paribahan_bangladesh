<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CngInfoController extends Controller
{
    public function index(): View
    {
        return view('forntend.cng_info.index');
    }
    public function cng_stand(): View
    {
        return view('forntend.cng_info.stand');
    }
    public function map(): View
    {
        return view('forntend.cng_info.map');
    }
}
