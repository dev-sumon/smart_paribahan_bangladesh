<?php

namespace App\Http\Controllers\FieldWorker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FieldWorkerYearlyNoticeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('field_worker');
    // }
    public function index():View
    {
        return view('field_worker.yearly_notice.index');
    }
}
