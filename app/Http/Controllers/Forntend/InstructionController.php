<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    public function index()
    {
        $data['faqs'] = Faq::latest()->get();
        return view('forntend.instructions.idex', $data);
    }
    
}
