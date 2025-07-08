<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Models\Owner;
use App\Models\Division;
use App\Models\BloodGroup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class OwnerSignupController extends Controller
{
    public function signupForm():View
    {
        $data['divisions'] = Division::with( ['districts', 'thanas', 'unions', 'stands'])->latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('owner.auth.signup', $data);
    }

    public function register(OwnerRequest $request)
    {
        $save = new Owner();

        // $save->name = $request->name;
        $save->title = $request->title;

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;

        while (Owner::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $save->slug = $slug;
        $save->designation = $request->designation;
        $save->description = $request->description;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->blood_group_id = $request->blood_group_id;
        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->stand_id = $request->stand_id;
        $save->password = Hash::make($request->password);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time(). '.' .$image->getClientOriginalExtension();
            $path = $image->storeAs("owner/", $filename, 'public');
            $save->image = $path;
        }
        // dd($save);

        $save->save();
        return redirect()->route('owner.login')->with('success','Your account created successfully');
    }
}
