<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterRequest;
use App\Models\Footer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class FooterController extends Controller
{
    public function index(): View
    {
        $data['footers'] = Footer::latest()->get();
        return view('backend.footer.index', $data);
    }
    public function create(): View
    {
        return view('backend.footer.create');
    }
    public function store(FooterRequest $request): RedirectResponse
    {
        $save = new Footer();

        $save->description = $request->description;
        $save->phone = $request->phone;
        $save->email = $request->email;
        $save->status = $request->status ?? 0;


        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $filename = $request->name . time(). '.' .$logo->getClientOriginalExtension();
            $path = $logo->storeAs("footer/", $filename, 'public');
            $save->logo = $path;
        }


        if($request->hasFile('goole_play')){
            $goole_play = $request->file('goole_play');
            $filename = $request->name . time(). '.' .$goole_play->getClientOriginalExtension();
            $path = $goole_play->storeAs("footer/", $filename, 'public');
            $save->goole_play = $path;
        }


        if($request->hasFile('app_store')){
            $app_store = $request->file('app_store');
            $filename = $request->name . time(). '.' .$app_store->getClientOriginalExtension();
            $path = $app_store->storeAs("footer/", $filename, 'public');
            $save->app_store = $path;
        }

        $save->save();
        return redirect()->route('footer.index');
    }
}
