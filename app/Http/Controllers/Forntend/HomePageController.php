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










    public function search(Request $request)
    {
        $data = [];

    if($request->vehicle_type_id){
        $data['vahicle_type'] = VehicleType::with(['stand.division','stand.district','stand.thana','stand.union','vahicles'])->findOrFail($request->vahicle_type_id);
        return view('vahicles',$data);
    }elseif($request->stand_id){
        $data['stands']= Stand::with(['division','district','thana','union' ,'vahiclesTypes.vahicles'])->findOrFail($request->stand_id);
        return view('forntend.cng_info.index',$data);
    }elseif($request->union_id){
        $data['unions']= Union::with(['division','district','thana','stands.vahiclesTypes.vahicles'])->findOrFail($request->union_id);
        return view('unions',$data);
    }elseif($request->thana_id){
        $data['thanas']= Thana::with(['division','district','unions','stands.vahiclesTypes.vahicles'])->latest()->findOrFail($request->thana_id);
        return view('thanas',$data);
    }elseif($request->district_id){
        $data['districts']= District::with(['division','thanas','unions','stands.vahiclesTypes.vahicles'])->latest()->findOrFail($request->district_id);
        return view('districts',$data);
    }if($request->division_id){
        $data['divisions']= Division::with(['districts','thanas','unions','stands.vahiclesTypes.vahicles'])->findOrFail($request->division_id);
        return view('divisions',$data);
    }
        // $data = [];
        // if($request->division_id){

        // }
        // $data['stands'] = Stand::query()
        // ->when($request->division_id, function ($query) use ($request) {
        //     return $query->where('division_id', $request->division_id);
        // })
        // ->when($request->district_id, function ($query) use ($request) {
        //     return $query->where('district_id', $request->district_id);
        // })
        // ->when($request->thana_id, function ($query) use ($request) {
        //     return $query->where('thana_id', $request->thana_id);
        // })
        // ->when($request->union_id, function ($query) use ($request) {
        //     return $query->where('union_id', $request->union_id);
        // })
        // ->get();

        // return view('forntend.cng_info.index', $data);
    }
    public function showStand($id)
    {
        $data['stand'] = Stand::with('vehicles')->findOrFail($id);

        return view('forntend.cng_info.stand', $data);
    }
}
