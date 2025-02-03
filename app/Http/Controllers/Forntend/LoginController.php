<?php

namespace App\Http\Controllers\Forntend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('forntend.login.index');
    }
}
