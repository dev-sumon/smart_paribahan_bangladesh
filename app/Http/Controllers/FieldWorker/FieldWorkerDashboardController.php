<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\FieldWorker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FieldWorkerDashboardController extends Controller
{
    public function dashboard($id){
        $data['driver'] = FieldWorker::findOrFail($id);
        return view('field_worker.dashboard', $data);
    }
}
