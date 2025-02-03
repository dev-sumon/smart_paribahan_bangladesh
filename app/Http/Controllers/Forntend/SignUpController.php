<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index(): View
    {
        return view('forntend.sign_up.index');
    }
}
