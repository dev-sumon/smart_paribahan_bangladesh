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
        // Stand-এর সাথে সম্পর্কিত Vehicle-এর vehicle_type_id বের করা
        $vehicle_type_ids = Vehicle::where('stand_id', $stand_id)->pluck('vehicle_type_id')->unique();

        // উক্ত vehicle_type_id থেকে VehicleType-এর তথ্য বের করা
        $vehicle_types = VehicleType::whereIn('id', $vehicle_type_ids)->get(['id', 'name']);

        return response()->json($vehicle_types);
    }
}
