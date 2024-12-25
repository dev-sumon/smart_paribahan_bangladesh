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
    public function update($id): View
    {
        $data['title'] = FooterTitle::findOrFail($id);
        return view('backend.footer_title.edit', $data);
    }
    public function update_store(FooterTitleRequest $request, $id): RedirectResponse
    {
        $update = FooterTitle::findOrFail($id);

        $update->title = $request->title;
        $update->status = $request->status ?? 0;

        $update->save();
        return redirect()->route('FooterTitle.index');
    }
    public function status($id): RedirectResponse
    {
        $title = FooterTitle::findOrFail($id);
        if($title->status == 1){
            $title->status = 0;
        }else{
            $title->status = 1;
        }
        
        $title->save();

        return redirect()->route('FooterTitle.index');
    }
}
