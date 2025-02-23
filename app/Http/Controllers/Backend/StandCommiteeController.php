<?php

namespace App\Http\Controllers\Backend;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class StandCommiteeController extends Controller
{
    public function index(): View
    {
        return view('backend.stand_commitee.index');
    }
    public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        return view('backend.stand_commitee.create', $data);
    }
}
