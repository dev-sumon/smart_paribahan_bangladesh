<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Models\Driver;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(): View
    {
        $data['drivers'] = Driver::latest()->get();
        return view('backend.driver.index', $data);
    }
    public function create(): View
    {
        return view('backend.driver.create');
    }
    public function store(DriverRequest $request): RedirectResponse
    {
        $save = new Driver();

        $save->name = $request->name;
        $save->description = $request->description;
        $save->designation = $request->designation;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->vehicles_license = $request->vehicles_license;
        $save->driving_license = $request->driving_license;
        $save->blood_group = $request->blood_group;
        $save->password = $request->password;
        $save->status = $request->status ?? 0;


        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time(). '.' .$image->getClientOriginalExtension();
            $path = $image->storeAs("driver/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('driver.index');
    }
}
