<?php

namespace App\Http\Controllers\Driver;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Vehicle;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('driver');
    }
    public function division(Request $request, $id): JsonResponse
    {
        $districts = District::where('division_id', $id)->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $districts
        ]);
    }
    public function district(Request $request, $id): JsonResponse
    {
        $district = District::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $district
        ]);
    }
    public function thana(Request $request, $id): JsonResponse
    {
        $thanas = Thana::where('district_id', $id)->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $thanas
        ]);
    }
    public function union(Request $request, $id): JsonResponse
    {
        $unions = Union::where('thana_id', $id)->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $unions
        ]);
    }
    public function stand(Request $request, $id): JsonResponse
    {
        $stands = Stand::where('union_id', $id)->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $stands
        ]);
    }
    public function vehicle(Request $request, $id): JsonResponse
    {
        $vehicles = Vehicle::where('stand_id', $id)->whereNull('driver_id')->latest()->get()
        ->whereNull('driver_id')
        ->pluck('license_number');
        return response()->json([
            'success' => true,
            'data' => $vehicles
        ]);
    }
    public function vehiclesLicense(Request $request, $id): JsonResponse
    {
        $licenses = Vehicle::where('id', $id)
        ->whereNull('driver_id')
        ->pluck('license_number');
        return response()->json([
            'success' => true,
            'data' => $licenses
        ]);
    }
    // public function getVehicles(Request $request, $stand_id)
    // {
    //     $vehicles = Vehicle::where('stand_id', $stand_id)
    //         ->whereNull('driver_id') // শুধু অব্যবহৃত গাড়ি দেখাবে
    //         ->get(['id', 'name', 'license_number']);

    //     $data = [];
    //     foreach ($vehicles as $vehicle) {
    //         $data[$vehicle->id] = [
    //             'name' => $vehicle->name,
    //             'license_number' => $vehicle->license_number
    //         ];
    //     }

    //     return response()->json($data);
    // }
    public function getVehicles($stand_id)
    {
        // vehicle_type সহ তথ্য সংগ্রহ করা হচ্ছে
        $vehicleTypes = Vehicle::where('stand_id', $stand_id)->pluck('vehicle_type', 'id');
        return response()->json($vehicleTypes);
    }


}
