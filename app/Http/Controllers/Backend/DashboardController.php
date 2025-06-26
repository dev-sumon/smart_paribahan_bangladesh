<?php

namespace App\Http\Controllers\Backend;

use App\Models\FieldWorker;
use App\Models\Notice;
use App\Models\Owner;
use App\Models\Stand;
use App\Models\StandManager;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Vehicle;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function dashboard(){
        $data['admin'] = Auth::guard('admin')->user();
        $data['field_worker'] = FieldWorker::count();
        $data['stand_manager'] = StandManager::count();
        $data['division'] = Division::count();
        $data['district'] = Division::count();
        $data['thana'] = Thana::count();
        $data['union'] = Union::count();
        $data['stand'] = Stand::count();
        $data['driver'] = Stand::count();
        $data['owner'] = Owner::count();
        $data['vehicle'] = Vehicle::count();
        $data['notice'] = Notice::count();
        return view('backend.dashboard.index', $data);
    }
}
