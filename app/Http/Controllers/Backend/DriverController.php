<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(): View
    {
        $data['drivers'] = Driver::latest()->get();
        return view('backend.driver.index', $data);

    }
}
