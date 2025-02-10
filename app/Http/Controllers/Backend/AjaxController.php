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
    // public function vehicle(Request $request, $id): JsonResponse
    // {
    //     $vehicles = Vehicle::where('stand_id', $id)->latest()->get();
    //     return response()->json([
    //         'success' => true,
    //         'data' => $vehicles
    //     ]);
    // }
    // public function vehiclesLicense(Request $request, $id): JsonResponse
    // {
    //     $licenses = Vehicle::where('id', $id)->pluck('license_number');
    //     return response()->json([
    //         'success' => true,
    //         'data' => $licenses
    //     ]);
    // }
    public function ownerVehicles(Request $request, $id): JsonResponse
    {
        $owner = Owner::with('vehicles')->find($id);

        return response()->json([
            'success' => true,
            'data' => $owner ? $owner->vehicles : null
        ]);
    }

}
