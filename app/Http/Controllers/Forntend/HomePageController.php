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

        // $data['divisions'] = Division::latest()->get();
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

    // public function vehicle_types($stand_id)
    // {
    //     $vehicle_types = VehicleType::where('stand_id', $stand_id)->pluck('name', 'id');
    //     return response()->json($vehicle_types);
    // }
    // public function vehicle_types($stand_id)
    // {
    //     $vehicle_types = Vehicle::where('stand_id', $stand_id)->with('vehicleType')->get()->pluck('vehicleType.name', 'vehicleType.id');

    //     return response()->json($vehicle_types);
    // }
    // public function vehicle_types($stand_id)
    // {
    //     $vehicle_types = Vehicle::where('stand_id', $stand_id)
    //         ->with('vehicleType') // VehicleType সম্পর্ক আনবে
    //         ->get()
    //         ->pluck('vehicleType.name', 'vehicleType.id'); // VehicleType টেবিলের নাম রিটার্ন করবে

    //     return response()->json($vehicle_types);
    // }
    // public function vehicleTypes($stand_id)
    // {
    //     $vehicles = Vehicle::where('stand_id', $stand_id)->with('vehicleType')->get();
    //     return response()->json($vehicles);
    // }
    public function vehicleTypes($stand_id)
    {
        // স্ট্যান্ডের উপর ভিত্তি করে সকল গাড়ির ধরন নিয়ে আসা
        $vehicles = Vehicle::where('stand_id', $stand_id)
                            ->with('vehicleType') // vehicleType সম্পর্কিত তথ্যও লোড
                            ->get();

        // শুধু vehicle_types এর নাম নিয়ে JSON আউটপুট পাঠানো
        $vehicle_types = $vehicles->map(function ($vehicle) {
            return [
                'id' => $vehicle->vehicleType->id, // VehicleType এর id
                'name' => $vehicle->vehicleType->name, // VehicleType এর name
            ];
        });

        return response()->json($vehicle_types);
    }

}
