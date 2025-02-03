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
    public function community(): View
    {
        return view('forntend.cng_info.stand_community');
    }
    Public function owner(): View
    {
        return view('forntend.cng_info.owner_list');
    }
    public function driver(): View
    {
        return view('forntend.cng_info.driver_list');
    }
    public function notice(): View
    {
        return view('forntend.cng_info.notice');
    }
}
