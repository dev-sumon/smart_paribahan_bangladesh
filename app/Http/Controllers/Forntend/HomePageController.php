<?php

namespace App\Http\Controllers\Forntend;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index(){

        $data['divisions'] = Division::latest()->get();

        return view('forntend.home.index', $data);
    }
}
