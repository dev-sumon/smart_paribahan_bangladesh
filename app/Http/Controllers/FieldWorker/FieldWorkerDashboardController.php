<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\FieldWorker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FieldWorkRequest;
use Illuminate\Support\Facades\Storage;

class FieldWorkerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('field_worker');
    }

    public function dashboard(){
        $data['worker'] = Auth::guard('field_worker')->user();
        return view('field_worker.dashboard', $data);
    }
    public function updateDashboard(FieldWorkRequest $request, $id): RedirectResponse
    {
        $update = FieldWorker::findOrFail($id);

        $update->name = $request->name;
        $update->phone = $request->phone;
        $update->email = $request->email;
        $update->nid = $request->nid;
        $update->father_name = $request->father_name;
        $update->mother_name = $request->mother_name;
        $update->address = $request->address;


        if ($request->hasFile('image')) {
            if ($update->image && Storage::exists($update->image)) {
                Storage::delete($update->image);
            }
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("worker/", $filename, 'public');
            $update->image = $path;
        }

        $update->update();
        return redirect()->route('f.home');
    }
}
