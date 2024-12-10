<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $save->email = $request->email;
        $save->password = bcrypt($request->password);
        $save->status = $request->has('status') ? $request->status : 0;
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
        $update->email = $request->email;
        if($request->password){
            $update->password = $request->password;
        }
        $update->status = $request->status ?? 0;
        
        $update->save();
        return redirect()->route('admin.index');
    }
    public function status($id){
        $admin = Admin::findOrFail($id);
        if($admin->status ==1){
            $admin->status =0;
        }else{
            $admin->status = 1;
        }
        $admin->save();
        return redirect()->route('admin.index');
    }
    public function delete($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();


        return redirect()->route('admin.index');
    }
    public function detalis($id){
        $data['admin'] = Admin::findOrFail($id);
        return view('backend.admin.show', $data);
    }
}
