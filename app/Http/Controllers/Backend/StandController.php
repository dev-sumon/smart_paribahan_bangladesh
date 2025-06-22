<?php

namespace App\Http\Controllers\Backend;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Requests\StandRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StandController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(): View
    {
        $data['stands'] = Stand::latest()->get();
        return view('backend.stand.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        return view('backend.stand.create', $data);
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
        $save->status = $request->has('status') ? $request->status : 0;



        $location = $request->location;

        if (!Str::contains($location, 'www.google.com/maps/embed?pb=')) {
            return redirect()->back()->withErrors(['location' => 'Please provide a valid Google Maps Embed link.']);
        }

        $save->location = $location;

        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $img) {
                $filename = Str::slug($request->title) . '_' . time() . '_' . $img->getClientOriginalName();
                $path = $img->storeAs('stands', $filename, 'public');
                $imagePaths[] = $path;
            }
        }

        $save->image = json_encode($imagePaths);

        $save->save();
        return redirect()->route('stand.index')->with('success', 'Stand created successfully!');
    }
    public function update($slug): View
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union')->where('slug', $slug)->firstOrFail();
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['stand']->division_id)->get();
        $data['thanas'] = Thana::where('district_id', $data['stand']->district_id)->get();
        $data['unions'] = Union::where('thana_id', $data['stand']->thana_id)->get();
        return view('backend.stand.edit', $data);
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



        $update->save();
        return redirect()->route('stand.index')->with('success', 'Stand updated successfully!');
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
        return redirect()->route('stand.index')->with('success', 'Stand status updated successfully!');
    }
    public function delete($slug): RedirectResponse
    {
        $stand = Stand::where('slug', $slug)->firstOrFail();
        $stand->delete();

        return redirect()->route('stand.index')->with('success', 'Stand deleted successfully!');
    }
    public function detalis($slug): View
    {
        $data['stand'] = Stand::with('division', 'district', 'thana', 'union')->where('slug', $slug)->firstOrFail();
        return view('backend.stand.show', $data);
    }
}
