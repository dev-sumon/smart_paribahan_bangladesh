<?php

namespace App\Http\Controllers\FieldWorker;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Owner;
use App\Models\Stand;
use App\Models\Union;
use App\Models\Driver;
use App\Models\Notice;
use App\Models\Vehicle;
use App\Models\Division;
use App\Models\BloodGroup;
use App\Models\FieldWorker;
use App\Models\YearlyNotice;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FieldWorkRequest;
use Illuminate\Support\Facades\Storage;

class FieldWorkerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('field_worker');
    }

    public function dashboard()
    {
        $data['worker'] = Auth::guard('field_worker')->user();

        // $data['stand_manager'] = Auth::guard('stand_manager')->user();
        // $now = Carbon::now();

        // $today = $now->copy()->startOfDay();
        // $yesterday = $now->copy()->subDay()->startOfDay();

        // $thisWeekStart = $now->copy()->startOfWeek();
        // $lastWeekStart = $now->copy()->subWeek()->startOfWeek();
        // $lastWeekEnd = $lastWeekStart->copy()->endOfWeek();

        // $thisMonthStart = $now->copy()->startOfMonth();
        // $lastMonthStart = $now->copy()->subMonth()->startOfMonth();
        // $lastMonthEnd = $lastMonthStart->copy()->endOfMonth();

        // $thisYearStart = $now->copy()->startOfYear();
        // $lastYearStart = $now->copy()->subYear()->startOfYear();
        // $lastYearEnd = $lastYearStart->copy()->endOfYear();

        // $data = [];

        // $data['today_serial'] = VehicleSerial::whereDate('created_at', $today)->count();
        // $data['yesterday_serial'] = VehicleSerial::whereDate('created_at', $yesterday)->count();
        // $data['serial_diff'] = $data['today_serial'] - $data['yesterday_serial'];

        // // ✅ Advertisement হিসাব
        // // $data['this_week_ads'] = Advertisement::whereBetween('created_at', [$thisWeekStart, $now])->count();
        // // $data['last_week_ads'] = Advertisement::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->count();
        // // $data['ads_diff'] = $data['this_week_ads'] - $data['last_week_ads'];

        // $data['this_month_notice'] = Notice::whereBetween('created_at', [$thisMonthStart, $now])->count();
        // $data['last_month_notice'] = Notice::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        // $data['monthly_notice_diff'] = $data['this_month_notice'] - $data['last_month_notice'];

        // $data['this_year_notice'] = Notice::whereBetween('created_at', [$thisYearStart, $now])->count();
        // $data['last_year_notice'] = Notice::whereBetween('created_at', [$lastYearStart, $lastYearEnd])->count();
        // $data['yearly_notice_diff'] = $data['this_year_notice'] - $data['last_year_notice'];



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


        // driver
        $data['today_driver'] = Driver::whereDate('created_at', $today)->count();
        $data['yesterday_driver'] = Driver::whereDate('created_at', $yesterday)->count();
        $data['driver_diff'] = $data['today_driver'] - $data['yesterday_driver'];

        // owner
        $data['today_owner'] = Owner::whereDate('created_at', $today)->count();
        $data['yesterday_owner'] = Owner::whereDate('created_at', $yesterday)->count();
        $data['owner_diff'] = $data['today_owner'] - $data['yesterday_owner'];


        // stand
        $data['this_week_stand'] = Stand::whereBetween('created_at', [$thisWeekStart, $now])->count();
        $data['last_week_stand'] = Stand::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->count();
        $data['stand_diff'] = $data['this_week_stand'] - $data['last_week_stand'];


        // union
        $data['this_week_union'] = Union::whereBetween('created_at', [$thisWeekStart, $now])->count();
        $data['last_week_union'] = Union::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->count();
        $data['union_diff'] = $data['this_week_union'] - $data['last_week_union'];

        // notice
        $data['this_month_notice'] = Notice::whereBetween('created_at', [$thisMonthStart, $now])->count();
        $data['last_month_notice'] = Notice::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        $data['monthly_notice_diff'] = $data['this_month_notice'] - $data['last_month_notice'];


        // notice year
        $data['this_year_notice'] = YearlyNotice::whereBetween('created_at', [$thisYearStart, $now])->count();
        $data['last_year_notice'] = YearlyNotice::whereBetween('created_at', [$lastYearStart, $lastYearEnd])->count();
        $data['yearly_notice_diff'] = $data['this_year_notice'] - $data['last_year_notice'];

        return view('field_worker.dashboard.dashboard', $data);
    }

    public function field_worker_update($id)
    {
        $data['worker'] = Auth::guard('field_worker')->user();
        return view('field_worker.field_worker_update.index', $data);
    }
    public function updateDashboard(FieldWorkRequest $request, $id): RedirectResponse
    {
        $update = FieldWorker::findOrFail($id);

        $update->name = $request->name;
        $update->phone = $request->phone;
        $update->email = $request->email;
        $update->nid = $request->nid;
        $update->father_name = $request->father_name;
        $update->mother_name = $request->mother_name;
        $update->address = $request->address;


        if ($request->hasFile('image')) {
            if ($update->image && Storage::exists($update->image)) {
                Storage::delete($update->image);
            }
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("worker/", $filename, 'public');
            $update->image = $path;
        }

        $update->update();
        return redirect()->route('f.home');
    }
    public function index(): View
    {
        return view('field_worker.pages.index');
    }
    public function driverCreate(): View
    {
        $data['divisions'] = Division::with(['districts', 'thanas', 'unions', 'stands', 'owners'])->latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('field_worker.pages.driver', $data);
    }
    public function driverStore(DriverRequest $request)
    {
        $save = new Driver();

        $save->name = $request->name;
        $save->description = $request->description;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->owner_id = $request->owner_id;
        $save->blood_group_id = $request->blood_group_id;
        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->vehicle_id = $request->vehicle_id;
        $save->stand_id = $request->stand_id;
        $save->driving_license = $request->driving_license;
        $save->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("driver/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();

        if ($request->vehicle_id) {
            Vehicle::where('id', $request->vehicle_id)->update(['driver_id' => $save->id]);
        }

        return redirect()->route('f.home');
    }
    public function blogCreate(): View
    {
        return view('field_worker.pages.blog');
    }
    public function blogStore(BlogRequest $request): RedirectResponse
    {
        $save = new Blog();
        $save->title = $request->title;
        $save->description = $request->description;
        $save->creator = auth('admin')->user()->name;
        $save->status = $request->status ?? 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("blog/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('f.blog.index');
    }
}
