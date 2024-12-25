<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class FooterController extends Controller
{
    public function index(): View
    {
        return view('backend.footer.index');
    }
}
