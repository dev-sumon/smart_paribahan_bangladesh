<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DivisionReqest;
use App\Models\Division;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index(): View
    {
        return view('backend.division.index');
    }
    public function create(): View
    {
        return view('backend.division.create');
    }
    public function store(DivisionReqest $request): RedirectResponse
    {
        $save = new Division();

        $save->division = $request->division;
        $save->status = $request->status ?? 0;

        $save->save();
        return redirect()->route('division.index');
    }
}
