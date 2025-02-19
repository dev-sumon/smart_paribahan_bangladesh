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
    public function index()
    {

        $data['divisions'] = Division::with('districts','thanas','unions','stands','stands.vehicleTypes')->latest()->get();
        $data['faqs'] = Faq::latest()->get();
        $data['districts'] = District::latest()->get();

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
        $vehicle_types = VehicleType::where('stand_id', $stand_id)->get(['id', 'name']);

        return response()->json($vehicle_types);
    }










    public function search(Request $request)
    {

        // dd($request->all());


        $data['divisions'] = Division::with(['districts', 'thanas', 'unions', 'stands.vehicleTypes.vehicles'])->latest()->get();

        if ($request->vehicle_type_id) {
            $data['vehicle_type'] = VehicleType::with(['stand.division', 'stand.district', 'stand.thana', 'stand.union', 'vehicles'])->findOrFail($request->vahicle_type_id);
            return view('forntend.cng_info.vehicle', $data);
        } elseif ($request->stand_id) {
            $data['stand'] = Stand::with(['division', 'district', 'thana', 'union', 'vehicleTypes.vehicles'])->findOrFail($request->stand_id);
            return view('forntend.cng_info.stand', $data);
        } elseif ($request->union_id) {
            $data['union'] = Union::with(['division', 'district', 'thana', 'stands.vehicleTypes.vehicles'])->findOrFail($request->union_id);
            return view('forntend.cng_info.union', $data);
        } elseif ($request->thana_id) {
            $data['thana'] = Thana::with(['division', 'district', 'unions', 'stands.vehicleTypes.vehicles'])->latest()->findOrFail($request->thana_id);
            return view('forntend.cng_info.thana', $data);
        } elseif ($request->district_id) {
            $data['district'] = District::with(['thanas', 'unions', 'stands.vehicleTypes.vehicles'])->findOrFail($request->district_id);
            return view('forntend.cng_info.district', $data);
        }
        if ($request->division_id) {
            $data['division'] = Division::with(['districts', 'thanas', 'unions', 'stands.vehicleTypes.vehicles'])->findOrFail($request->division_id);
            return view('forntend.cng_info.division', $data);
        }
    }
    public function showStand($id)
    {
        $data['stand'] = Stand::with('vehicles')->findOrFail($id);

        return view('forntend.cng_info.stand', $data);
    }
}
