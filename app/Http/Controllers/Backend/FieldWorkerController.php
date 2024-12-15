<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\FieldWorkRequest;
use App\Models\FieldWorker;
use Illuminate\Http\RedirectResponse;

class FieldWorkerController extends Controller
{
    public function index(): View
    {
        return view('backend.field_worker.index');
    }
    public function create(): View
    {
        return view('backend.field_worker.create');
    }
    public function store(FieldWorkRequest $request): RedirectResponse
    {
        $save = new FieldWorker();

        $save->name = $request->name;
        $save->phone = $request->phone;
        $save->email = $request->email;
        $save->nid = $request->nid;
        $save->father_name = $request->father_name;
        $save->mother_name = $request->mother_name;
        $save->address = $request->address;
        $save->status = $request->status ?? 0;
        $save->password = bcrypt($request->password);


        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time(). '.' .$image->getClientOriginalExtension();
            $path = $image->storeAs("worker/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('worker.index');
    }
}
