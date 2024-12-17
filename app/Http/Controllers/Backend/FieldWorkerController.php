<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FieldWorkRequest;
use App\Models\FieldWorker;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FieldWorkerController extends Controller
{
    public function index(): View
    {
        $data['workers'] = FieldWorker::latest()->get();
        return view('backend.field_worker.index', $data);
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
    public function update($id): View
    {
        $data['worker'] = FieldWorker::findOrFail($id);
        return view('backend.field_worker.edit', $data);
    }
    public function update_store(FieldWorkRequest $request, $id): RedirectResponse
    {
        $update = FieldWorker::findOrFail($id);

        $update->name = $request->name;
        $update->phone = $request->phone;
        $update->email = $request->email;
        $update->nid = $request->nid;
        $update->father_name = $request->father_name;
        $update->mother_name = $request->mother_name;
        $update->address = $request->address;
        $update->status = $request->status ?? 0;
        $update->password = bcrypt($request->password);


        if($request->hasFile('image'));
            if($update->iamge && Storage::exists($update->image)){
                Storage::delete($update->image);
            }
            $image = $request->file('image');
            $filename = $request->name . time(). '.' .$image->getClientOriginalExtension();
            $path = $image->storeAs("worker/", $filename, 'public');
            $update->image = $path;
        

        $update->save();
        return redirect()->route('worker.index');
    }
    public function status($id): RedirectResponse
    {
        $worker = FieldWorker::findOrFail($id);

        if($worker->status == 1){
            $worker->status = 0;
        }else{
            $worker->status = 1;
        }
    
        $worker->save();
        return redirect()->route('worker.index');
    }
}
