<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index():View
    {
        $data['contacts'] = ContactInfo::latest()->get();
        return view('forntend.contact.index', $data);
    }

}
