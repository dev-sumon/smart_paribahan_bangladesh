<?php

namespace App\Http\Controllers\Forntend;

use App\Models\Division;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\VehicleSerial;
use App\Http\Controllers\Controller;

class VehicleSerialController extends Controller
{
    public function index(Request $request): View
    {
        $standId = $request->stand_id;

        $data['serials'] = VehicleSerial::with('vehicle')
            ->where('stand_id', $standId)
            ->whereIn('status', [1, 2])
            ->orderBy('check_in', 'asc')
            ->take(10)
            ->get();

             $data['stand_id'] = $standId;
        return view('forntend.driver_serial.index', $data);
    }
    public function search(): View
    {
        $data['divisions'] = Division::with(['districts', 'thanas', 'unions', 'stands'])->latest()->get();
        return view('forntend.driver_serial.search', $data);
    }
    public function show(Request $request): View
    {
        $query = VehicleSerial::with('vehicle')
            ->whereIn('status', [1, 2]);

        if ($request->filled('division_id')) {
            $query->where('division_id', $request->division_id);
        }
        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }
        if ($request->filled('thana_id')) {
            $query->where('thana_id', $request->thana_id);
        }
        if ($request->filled('union_id')) {
            $query->where('union_id', $request->union_id);
        }
        if ($request->filled('stand_id')) {
            $query->where('stand_id', $request->stand_id);
        }

        $data['serials'] = $query->orderBy('check_in', 'asc')->get();
        return view('forntend.driver_serial.index', $data);
    }
    public function checkIn()
    {
        $data['divisions'] = Division::with(['districts', 'thanas', 'unions', 'stands', 'owners'])->latest()->get();
        return view('forntend.driver_serial.check_in', $data);
    }
    public function checkInStore(Request $request)
    {
        $driver = auth('driver')->user();

        $existing = VehicleSerial::where('driver_id', $driver->id)
            ->where('status', '!=', 0)
            ->first();

        if ($existing) {
            return back()->with('error', 'You already have an active or pending check-in. Please check out first.');
        }

        $save = new VehicleSerial();

        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->stand_id = $request->stand_id;
        $save->check_in = now();
        $save->check_out = null;
        $today = now()->toDateString();
        $lastSerial = VehicleSerial::where('stand_id', $request->stand_id)
            ->whereDate('check_in', $today)
            ->max('serial');

        $save->serial = $lastSerial ? $lastSerial + 1 : 1;
        $save->driver_id = $driver->id;
        $save->status = 1;
        $save->save();

        return redirect()->route('driver.serial.index', ['stand_id' => $request->stand_id]);
    }

    public function standWiseSerials()
    {
        $data['serials'] = VehicleSerial::with('stand', 'driver')
            ->whereNull('check_out')
            ->orderBy('serial', 'asc')
            ->get();

        return view('stand_manager.serial.index', $data);
    }
    public function checkOut(Request $request, $id)
    {
        $serial = VehicleSerial::findOrFail($id);

        $request->validate([
            'status' => 'required|in:0,1,2',
        ]);

        $serial->status = $request->status;

        if ($request->status == 0 && !$serial->check_out) {
            $serial->check_out = now();
        }
        $serial->save();
        return back()->with('success', 'Serial status updated successfully.');
    }
}
