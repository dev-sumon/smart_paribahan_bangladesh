<?php

namespace App\Http\Controllers\StandManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StandManagerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('stand_manager');
    }
    public function dashboard()
    {
        $data['stand_manager'] = Auth::guard('stand_manager')->user();
        return view('stand_manager.dashboard.dashboard', $data);
    }
}
