<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(): View
    {
        $data['admins'] = Admin::latest()->get();
        return view('backend.admin.index', $data);
    }
    public function create(): View
    {
        return view('backend.admin.create');
    }
    public function store(AdminRequest $request): RedirectResponse
    {

        // $this->authorize('create', Admin::class);

        $save = new Admin();
        $save->name = $request->name;
        $save->father_name = $request->father_name;
        $save->mother_name = $request->mother_name;
        $save->nid = $request->nid;
        $save->email = $request->email;
        $save->password = bcrypt($request->password);
        $save->status = $request->has('status') ? $request->status : 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("admins/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('admin.index');
    }

    public function update($id): View
    {
        $data['admin'] = Admin::findOrFail($id);
        return view('backend.admin.edit', $data);
    }

    public function update_store(AdminRequest $request, $id): RedirectResponse
    {
        $update = Admin::findOrFail($id);
        $update->name = $request->name;
        $update->father_name = $request->father_name;
        $update->mother_name = $request->mother_name;
        $update->nid = $request->nid;
        $update->email = $request->email;
        if ($request->password) {
            $update->password = $request->password;
        }
        $update->status = $request->status ?? 0;

        if ($request->hasFile('image')) {
            if ($update->iamge && Storage::exists($update->image)) {
                Storage::delete($update->image);
            }
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("admins/", $filename, 'public');
            $update->image = $path;
        };


        $update->save();
        return redirect()->route('admin.index');
    }
    public function status($id): RedirectResponse
    {
        $admin = Admin::findOrFail($id);
        if ($admin->status == 1) {
            $admin->status = 0;
        } else {
            $admin->status = 1;
        }
        $admin->save();
        return redirect()->route('admin.index');
    }
    public function delete($id): RedirectResponse
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();


        return redirect()->route('admin.index');
    }
    public function detalis($id): View
    {
        $data['admin'] = Admin::findOrFail($id);
        return view('backend.admin.show', $data);
    }
}
