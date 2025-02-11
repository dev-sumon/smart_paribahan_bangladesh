<?php

namespace App\Http\Controllers\Forntend;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Vehicle;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class CngInfoController extends Controller
{
    public function district($division_id)
    {
        $districts = District::where('division_id', $division_id)->pluck('district', 'id');
        return response()->json($districts);
    }

    public function thana($district_id)
    {
        $thanas = Thana::where('district_id', $district_id)->pluck('thana', 'id');
        return response()->json($thanas);
    }

    public function union($thana_id)
    {
        $unions = Union::where('thana_id', $thana_id)->pluck('union', 'id');
        return response()->json($unions);
    }

    public function stand($union_id)
    {
        $stands = Stand::where('union_id', $union_id)->pluck('name', 'id');
        return response()->json($stands);
    }

    public function vehicle($stand_id)
    {
        $vehicles = Vehicle::where('stand_id', $stand_id)->pluck('name', 'id');
        return response()->json($vehicles);
    }

    public function index(): View
    {
        $data['divisions'] = Division::latest()->get();
        return view('forntend.cng_info.index', $data);
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
