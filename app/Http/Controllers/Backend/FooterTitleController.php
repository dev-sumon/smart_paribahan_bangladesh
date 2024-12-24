<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterTitleRequest;
use App\Models\FooterTitle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FooterTitleController extends Controller
{
    public function index(): View
    {
        $data['titles'] = FooterTitle::latest()->get();
        return view('backend.footer_title.index', $data);
    }
    public function create(): View
    {
        return view('backend.footer_title.create');
    }
    public function store(FooterTitleRequest $request): RedirectResponse
    {
        $save = new FooterTitle();

        $save->title = $request->title;
        $save->status = $request->status ?? 0;

        $save->save();
        return redirect()->route('FooterTitle.index');
    }
}
