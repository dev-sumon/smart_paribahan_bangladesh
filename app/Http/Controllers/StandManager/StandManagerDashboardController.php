<?php

namespace App\Http\Controllers\StandManager;

use Carbon\Carbon;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Models\VehicleSerial;
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
        $now = Carbon::now();

        $today = $now->copy()->startOfDay();
        $yesterday = $now->copy()->subDay()->startOfDay();

        $thisWeekStart = $now->copy()->startOfWeek();
        $lastWeekStart = $now->copy()->subWeek()->startOfWeek();
        $lastWeekEnd = $lastWeekStart->copy()->endOfWeek();

        $thisMonthStart = $now->copy()->startOfMonth();
        $lastMonthStart = $now->copy()->subMonth()->startOfMonth();
        $lastMonthEnd = $lastMonthStart->copy()->endOfMonth();

        $thisYearStart = $now->copy()->startOfYear();
        $lastYearStart = $now->copy()->subYear()->startOfYear();
        $lastYearEnd = $lastYearStart->copy()->endOfYear();

        $data = [];

        $data['today_serial'] = VehicleSerial::whereDate('created_at', $today)->count();
        $data['yesterday_serial'] = VehicleSerial::whereDate('created_at', $yesterday)->count();
        $data['serial_diff'] = $data['today_serial'] - $data['yesterday_serial'];

        // ✅ Advertisement হিসাব
        // $data['this_week_ads'] = Advertisement::whereBetween('created_at', [$thisWeekStart, $now])->count();
        // $data['last_week_ads'] = Advertisement::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->count();
        // $data['ads_diff'] = $data['this_week_ads'] - $data['last_week_ads'];

        $data['this_month_notice'] = Notice::whereBetween('created_at', [$thisMonthStart, $now])->count();
        $data['last_month_notice'] = Notice::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        $data['monthly_notice_diff'] = $data['this_month_notice'] - $data['last_month_notice'];

        $data['this_year_notice'] = Notice::whereBetween('created_at', [$thisYearStart, $now])->count();
        $data['last_year_notice'] = Notice::whereBetween('created_at', [$lastYearStart, $lastYearEnd])->count();
        $data['yearly_notice_diff'] = $data['this_year_notice'] - $data['last_year_notice'];



        return view('stand_manager.dashboard.dashboard', $data);
    }
}
