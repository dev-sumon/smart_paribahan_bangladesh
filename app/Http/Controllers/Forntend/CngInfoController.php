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
    // public function cng_stand(): View
    // {
    //     return view('forntend.cng_info.stand');
    // }
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

    // public function cng_stand(Request $request)
    // {
    //     $query = Stand::query();

    //     if ($request->filled('division_id')) {
    //         $query->where('division_id', $request->division_id);
    //     }
    //     if ($request->filled('district_id')) {
    //         $query->where('district_id', $request->district_id);
    //     }
    //     if ($request->filled('thana_id')) {
    //         $query->where('thana_id', $request->thana_id);
    //     }
    //     if ($request->filled('union_id')) {
    //         $query->where('union_id', $request->union_id);
    //     }
    //     if ($request->filled('stand_id')) {
    //         $query->where('id', $request->stand_id);
    //     }

    //     $data['stands'] = $query->get();

    //     return view('forntend.cng_info.stand', $data);
    // }
    // public function searchStands(Request $request)
    // {
    //     $division_id = $request->division_id;
    //     $district_id = $request->district_id;
    //     $thana_id = $request->thana_id;
    //     $union_id = $request->union_id;
    //     $stand_id = $request->stand_id;
    //     $vehicle_type_id = $request->vehicle_type_id;

    //     $stands = Stand::where('division_id', $division_id)
    //                    ->where('district_id', $district_id)
    //                    ->where('thana_id', $thana_id)
    //                    ->where('union_id', $union_id)
    //                    ->where('stand_id', $stand_id)
    //                    ->where('vehicle_type_id', $vehicle_type_id)
    //                    ->get();
    //                    $data['stands_with_vehicles'] = $stands->map(function ($stand) use ($vehicle_type_id) {
    //                     $vehicles = $stand->vehicles()->where('vehicle_type_id', $vehicle_type_id)->get();
    //                     $stand->vehicles = $vehicles;
    //                     return $stand;
    //                 });

    //     return view('forntend.cng_info.index', $data);
    // }
    // public function showStand($id)
    // {
    //     $data['stand'] = Stand::findOrFail($id);

    //     return view('forntend.cng_info.stand', $data);
    // }
    public function cng_stand($id)
    {
        $data['stands'] = Stand::findOrFail($id);
        return view('forntend.cng_info.stand', $data);
    }
}
