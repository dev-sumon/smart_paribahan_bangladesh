<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(): View
    {
        return view('backend.admin.index');
    }
    public function create(): View
    {
        return view('backend.admin.create');
    }
    public function store(AdminRequest $request): RedirectResponse
    {

        $this->authorize('create', Admin::class);

        $save = new Admin();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = $request->password;
        $save->status = $request->status ?? 0;
        $save->save();
        return redirect()->route('admin.index');
    }
}
