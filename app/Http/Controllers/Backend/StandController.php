<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StandRequest;
use App\Models\Stand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class StandController extends Controller
{
    public function index(): View
    {
        $data['stands'] = Stand::latest()->get();
        return view('backend.stand.index', $data);
    }
    public function create(): View
    {
        return view('backend.stand.create');
    }
    public function store(StandRequest $request): RedirectResponse
    {



        $save = new Stand();
        $save->name = $request->name;
        $save->description = $request->description;
        $save->location = $request->location;
        $save->status = $request->has('status') ? $request->status : 0;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("stands/", $filename, 'public');
            $save->image = $path;
        }


        $save->save();

        return redirect()->route('stand.index');
    }
}
