<?php

namespace App\Http\Controllers\Backend;

use App\Models\Owner;
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
        $this->middleware('admin');
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
    // public function standVehicles(Request $request, $id): JsonResponse
    // {
    //     $vehicles = Vehicle::where('stand_id', $id)->latest()->get();

    //     return response()->json([
    //         'success' => true,
    //         'data' => $vehicles
    //     ]);
    // }
    // public function standVehicles(Request $request, $id): JsonResponse
    // {
    //     $stand = Stand::with(['vehicles' => function ($query) {
    //         $query->whereNull('driver_id')->whereNull('owner_id');
    //     }])->findOrFail($id);

    //     return response()->json([
    //         'success' => true,
    //         'data' => $stand->vehicles
    //     ]);
    // }




    public function standVehicles(Request $request, $id): JsonResponse
    {
        $stand = Stand::with([
            'vehicles' => function ($query) {
                $query->whereNull('driver_id')   // শুধু driver_id null চেক হবে
                    ->with('vehicleType');     // vehicleType relation load হবে
            }
        ])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $stand->vehicles
        ]);
    }



    public function getVehiclesByStand($stand_id)
    {
        $vehicles = Vehicle::where('stand_id', $stand_id)->get();
        return response()->json($vehicles);
    }
    public function vehiclesLicense(Request $request, $id): JsonResponse
    {
        $vehicle = Vehicle::findOrFail($id);
        if ($vehicle->owner) {
            return response()->json([
                'success' => true,
                'data' => $vehicle->owner->vehicles_license
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Owner not found for this vehicle'
        ]);
    }

    public function getVehicleTypesByStand($id): JsonResponse
    {
        $stand = Stand::with([
            'vehicles.vehicleType' // vehicles এর সাথে তার vehicleType রিলেশন
        ])->findOrFail($id);

        $vehicleTypes = $stand->vehicles
            ->pluck('vehicleType')
            ->unique('id') // ডুপ্লিকেট রিমুভ করার জন্য
            ->values();     // reindex array

        return response()->json([
            'success' => true,
            'data' => $vehicleTypes
        ]);
    }

}
