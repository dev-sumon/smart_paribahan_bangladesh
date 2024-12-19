<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index(): View
    {
        return view('backend.contact_page.index');
    }
    
}
