<?php

namespace App\Http\Controllers\Forntend;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Vehicle;
use App\Models\District;
use App\Models\Division;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;

class HomePageController extends Controller
{
    public function index(){

        $data['divisions'] = Division::with('districts.thanas.unions.stands.vehicles')->latest()->get();
        $data['faqs'] = Faq::latest()->get();

        return view('forntend.home.index', $data);
    }
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
    public function vehicleTypes($stand_id)
    {
        $vehicle_type_ids = Vehicle::where('stand_id', $stand_id)->pluck('vehicle_type_id')->unique();
        $vehicle_types = VehicleType::whereIn('id', $vehicle_type_ids)->get(['id', 'name']);
        return response()->json($vehicle_types);
    }










    public function searchStands(Request $request)
    {
        $division_id = $request->division_id;
        $district_id = $request->district_id;
        $thana_id = $request->thana_id;
        $union_id = $request->union_id;
        $stand_id = $request->stand_id;
        $vehicle_type_id = $request->vehicle_type_id;

        $stands = Stand::where('division_id', $division_id)
                       ->where('district_id', $district_id)
                       ->where('thana_id', $thana_id)
                       ->where('union_id', $union_id)
                       ->where('stand_id', $stand_id)
                       ->where('vehicle_type_id', $vehicle_type_id)
                       ->get();
                       $data['stands_with_vehicles'] = $stands->map(function ($stand) use ($vehicle_type_id) {
                        $vehicles = $stand->vehicles()->where('vehicle_type_id', $vehicle_type_id)->get();
                        $stand->vehicles = $vehicles; 
                        return $stand;
                    });

        return view('forntend.cng_info.index', $data);
    }
    public function showStand($id)
    {
        $data['stand'] = Stand::findOrFail($id);

        return view('forntend.cng_info.stand', $data);
    }
}
