<?php

namespace App\Http\Controllers\Forntend;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Owner;
use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\District;
use App\Models\Division;
use App\Models\ContactInfo;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class HomePageController extends Controller
{
    public function index()
    {

        $data['contact'] = ContactInfo::first();
        $data['divisions'] = Division::with('districts','thanas','unions','stands','stands.vehicleTypes')->latest()->get();
        $data['faqs'] = Faq::latest()->get();
        $data['districts'] = District::latest()->get();
        $data['blogs'] = Blog::latest()->take(3)->get();

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
        $stands = Stand::where('union_id', $union_id)->pluck('title', 'id');
        return response()->json($stands);
    }
    public function vehicleTypes($stand_id)
    {
        $vehicle_types = VehicleType::where('stand_id', $stand_id)->get(['id', 'name']);

        return response()->json($vehicle_types);
    }
    public function vehicles($stand_id)
    {
        $vehicle_types = Vehicle::where('vehicle_type_id', $stand_id)->get(['id', 'name']);

        return response()->json($vehicle_types);
    }










    public function search(Request $request)
    {

        // dd($request->all());


        $data['divisions'] = Division::with(['districts', 'thanas', 'unions', 'stands.vehicleTypes.vehicles'])->latest()->get();

        if ($request->vehicle_type_id) {
            $data['vehicle_type'] = VehicleType::with(['stand.division', 'stand.district', 'stand.thana', 'stand.union', 'vehicles'])->findOrFail($request->vehicle_type_id);
            return view('forntend.cng_info.vehicle', $data);
        } elseif ($request->stand_id) {
            $data['stand'] = Stand::with(['division', 'district', 'thana', 'union', 'vehicleTypes.vehicles', 'notices'])->findOrFail($request->stand_id);
            return view('forntend.cng_info.stand', $data);
        } elseif ($request->union_id) {
            $data['union'] = Union::with(['division', 'district', 'thana', 'stands.vehicleTypes.vehicles', 'notices'])->findOrFail($request->union_id);
            return view('forntend.cng_info.union', $data);
        } elseif ($request->thana_id) {
            $data['thana'] = Thana::with(['division', 'district', 'unions', 'stands.vehicleTypes.vehicles', 'notices'])->latest()->findOrFail($request->thana_id);
            return view('forntend.cng_info.thana', $data);
        } elseif ($request->district_id) {
            $data['district'] = District::with(['thanas', 'unions', 'stands.vehicleTypes.vehicles', 'notices'])->findOrFail($request->district_id);
            return view('forntend.cng_info.district', $data);
        }
        if ($request->division_id) {
            $data['division'] = Division::with(['districts', 'thanas', 'unions', 'stands.vehicleTypes.vehicles', 'notices'])->findOrFail($request->division_id);
            return view('forntend.cng_info.division', $data);
        }

    }
    public function showStand($slug)
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union', 'vehicleTypes.vehicles')->where('slug',$slug)->firstOrFail();
        $data['divisions'] = Division::all();
        $data['page_slug'] = 'map';
        return view('forntend.cng_info.map', $data);
    }
    public function showStandIntro($slug)
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union', 'vehicleTypes.vehicles')->where('slug',$slug)->firstOrFail();
        $data['divisions'] = Division::all();
        $data['page_slug'] = 'intro';
        return view('forntend.cng_info.stand_intro', $data);
    }
    public function standCommitee($slug)
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union', 'vehicleTypes.vehicles', 'commitees')->where('slug',$slug)->firstOrFail();
        $data['divisions'] = Division::all();
        $data['page_slug'] = 'commitee';
        return view('forntend.cng_info.stand_community', $data);
    }
    public function standDriver($slug)
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union', 'vehicleTypes.vehicles', 'drivers', 'notices')->where('slug',$slug)->firstOrFail();
        $data['divisions'] = Division::all();
        $data['page_slug'] = 'driver';
        return view('forntend.cng_info.driver_list', $data);
    }
    public function standOwner($slug)
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union', 'vehicleTypes.vehicles', 'owners.vehicles', 'owners.vehicles.vehicleType', 'owners', 'notices')->where('slug',$slug)->firstOrFail();
        $data['divisions'] = Division::all();
        $data['page_slug'] = 'owner';
        return view('forntend.cng_info.owner_list', $data);
    }
    public function ownerProfile($slug)
    {
        $data['owner'] = Owner::with('division', 'district', 'thana', 'union', 'vehicles')->where('slug',$slug)->firstOrFail();
        return view('forntend.cng_info.owner_details', $data);
    }
    public function driverProfile($slug)
    {
        $data['driver'] = Driver::with('division', 'district', 'thana', 'union', 'vehicles')->where('slug',$slug)->firstOrFail();
        return view('forntend.cng_info.driver_details', $data);
    }












    public function standNotice($slug)
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union', 'vehicleTypes.vehicles', 'notices')->latest()->where('slug',$slug)->firstOrFail();
        return view('forntend.cng_info.notice', $data);
    }
    public function divisionNotice($id)
    {
        $data['division_notice'] = Stand::with(['division', 'district', 'thana', 'union', 'vehicleTypes.vehicles', 'notices' => function ($query) {$query->latest();}
    ])->findOrFail($id);
        return view('forntend.cng_info.division_notice', $data);
    }
    public function districtNotice($id)
    {
        $data['district_notice'] = Stand::with(['division', 'district', 'thana', 'union', 'vehicleTypes.vehicles', 'notices' => function ($query) {$query->latest();}
    ])->findOrFail($id);
        return view('forntend.cng_info.district_notice', $data);
    }
    public function thanaNotice($id)
    {
        $data['thana_notice'] = Stand::with(['division', 'district', 'thana', 'union', 'vehicleTypes.vehicles', 'notices' => function ($query) {$query->latest();}
    ])->findOrFail($id);
        return view('forntend.cng_info.thana_notice', $data);
    }
    public function unionNotice($id)
    {
        $data['union_notice'] = Stand::with(['division', 'district', 'thana', 'union', 'vehicleTypes.vehicles', 'notices' => function ($query) {$query->latest();}
    ])->findOrFail($id);
        return view('forntend.cng_info.union_notice', $data);
    }





    // public function driverProfileSearch(Request $request){
    //     $query = $request->input('query');

    //     $data['vehicles'] = Vehicle::where('vehicle_licence', 'LIKE', "%{$query}%")->get();
    //     $data['drivers'] = Driver::where('driving_license', 'LIKE', "%{$query}%")->orWhere('phone', 'LIKE', "%{$query}%")->get();
    //     if ($data['vehicles']->count() > 0 || $data['drivers']->count() > 0) {
    //         return view('forntend.cng_info.search_info', $data);
    //     }

    //     return view('forntend.cng_info.error');
    // }
    public function driverProfileSearch(Request $request)
    {
        $query = $request->input('query');

        $data['vehicles'] = Vehicle::where('vehicle_licence', 'LIKE', "%{$query}%")->get();
        $data['drivers'] = Driver::where('phone', 'LIKE', "%{$query}%")->get();

        if ($data['vehicles']->count() > 0 || $data['drivers']->count() > 0) {
            return view('forntend.cng_info.search_info', $data);
        }
        return view('forntend.cng_info.error');
    }

}
