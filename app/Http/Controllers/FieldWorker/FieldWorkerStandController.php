<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Stand;
use App\Models\Division;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FieldWorkerStandController extends Controller
{
    public function index(): View
    {
        $data['stands'] = Stand::latest()->get();
        return view('field_worker.stand.index', $data);
    }
        public function create(): View
    {
        $data['divisions'] = Division::latest()->get();
        return view('field_worker.stand.create', $data);
    }
}
