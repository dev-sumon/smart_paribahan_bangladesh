<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\District;
use App\Models\Division;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FieldWorkerStandController extends Controller
{
    public function __construct()
    {
        $this->middleware('field_worker');
    }
    public function index(): View
    {
        $data['stands'] = Stand::latest()->get();
        return view('field_worker.stand.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        return view('field_worker.stand.create', $data);
    }
    public function store(StandRequest $request): RedirectResponse
    {
        $save = new Stand();
        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->title = $request->title;
        $save->slug = $request->slug;
        $save->description = $request->description;
        // $save->location = $request->location;
        $save->status = $request->has('status') ? $request->status : 0;



        $location = $request->location;

        if (!Str::contains($location, 'www.google.com/maps/embed?pb=')) {
            return redirect()->back()->withErrors(['location' => 'Please provide a valid Google Maps Embed link.']);
        }

        $save->location = $location;

        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $img) {
                // $filename = Str::slug($request->title) . '_' . time() . '_' . $img->getClientOriginalName();
                $filename = Str::slug($request->title) . '_' . time() . '_' . $img->getClientOriginalName();
                $path = $img->storeAs('stands', $filename, 'public');
                $imagePaths[] = $path;
            }
        }

        $save->image = json_encode($imagePaths);
        // setCreator($save);
        $save->created_by_id = Auth::guard('field_worker')->id();
        $save->created_by_guard = 'field_worker';
        $save->save();
        return redirect()->route('field_worker.stand.index')->with('success', 'Stand Created By Field Worker');
    }
    public function update($slug): View
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union')->where('slug', $slug)->firstOrFail();
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['stand']->division_id)->get();
        $data['thanas'] = Thana::where('district_id', $data['stand']->district_id)->get();
        $data['unions'] = Union::where('thana_id', $data['stand']->thana_id)->get();
        return view('field_worker.stand.edit', $data);
    }
    public function update_store(StandRequest $request, $slug): RedirectResponse
    {
        $update = Stand::where('slug', $slug)->firstOrFail();
        $update->division_id = $request->division_id;
        $update->district_id = $request->district_id;
        $update->thana_id = $request->thana_id;
        $update->union_id = $request->union_id;
        $update->title = $request->title;
        $update->slug = $request->slug;
        $update->description = $request->description;
        $update->status = $request->status ?? 0;

        $location = $request->location;
        if (!Str::contains($location, 'www.google.com/maps/embed?pb=')) {
            return redirect()->back()->withErrors(['location' => 'Please provide a valid Google Maps Embed link.']);
        }
        $update->location = $location;


        // if ($request->hasFile('image')) {
        //     if ($update->iamge && Storage::exists($update->image)) {
        //         Storage::delete($update->image);
        //     }
        //     $image = $request->file('image');
        //     $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
        //     $path = $image->storeAs("stands/", $filename, 'public');
        //     $update->image = $path;
        // }
        // ;

        if ($request->hasFile('image')) {
            // পুরানো ইমেজ ডিলিট করতে চাইলে এখানে কোড লিখুন
            if ($update->image) {
                foreach (json_decode($update->image) as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }

            $imagePaths = [];
            foreach ($request->file('image') as $img) {
                $filename = Str::slug($request->title) . '_' . time() . '_' . $img->getClientOriginalName();
                $path = $img->storeAs('stands', $filename, 'public');
                $imagePaths[] = $path;
            }

            // নতুন ইমেজ path গুলো JSON আকারে সেভ করা হচ্ছে
            $update->image = json_encode($imagePaths);
        }

        $update->updated_by_id = Auth::guard('field_worker')->id();
        $update->updated_by_guard = 'field_worker';
        $update->save();
        return redirect()->route('field_worker.stand.index')->with('success', 'Stand Updated By Field Worker');
    }
    public function status($slug): RedirectResponse
    {
        $stand = Stand::where('slug', $slug)->firstOrFail();
        if ($stand->status == 1) {
            $stand->status = 0;
        } else {
            $stand->status = 1;
        }
        $stand->save();
        return redirect()->route('field_worker.stand.index')->with('success', 'Stand Status Updated By Field Worker');
    }
    public function delete($slug): RedirectResponse
    {
        $stand = Stand::where('slug', $slug)->firstOrFail();
        $stand->delete();

        return redirect()->route('field_worker.stand.index');
    }
    public function detalis($slug): View
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union')->where('slug', $slug)->firstOrFail();
        return view('field_worker.stand.show', $data)->with('success', 'Stand Deleted By Field Worker');
    }

}
