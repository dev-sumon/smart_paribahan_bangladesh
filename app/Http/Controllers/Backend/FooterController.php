<?php

namespace App\Http\Controllers\Backend;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\FooterRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
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
    public function update($id): View
    {
        $data['footer'] = Footer::findOrFail($id);
        return view('backend.footer.edit', $data);
    }
    public function update_store(FooterRequest $request, $id): RedirectResponse
    {
        $update = Footer::findOrFail($id);

        $update->description = $request->description;
        $update->phone = $request->phone;
        $update->email = $request->email;
        $update->status = $request->status ?? 0;



        if($request->hasFile('logo'));
        if($update->logo && Storage::exists($update->logo)){
            Storage::delete($update->logo);
        }
        $logo = $request->file('logo');
        $filename = $request->name . time() . '.' . $logo->getClientOriginalExtension();
        $path = $logo->storeAs("footer/", $filename, 'public');
        $update->logo = $path;




        if($request->hasFile('goole_play'));
        if($update->goole_play && Storage::exists($update->goole_play)){
            Storage::delete($update->goole_play);
        }
        $goole_play = $request->file('goole_play');
        $filename = $request->name . time() . '.' . $goole_play->getClientOriginalExtension();
        $path = $goole_play->storeAs("footer/", $filename, 'public');
        $update->goole_play = $path;



        if($request->hasFile('app_store'));
        if($update->app_store && Storage::exists($update->app_store)){
            Storage::delete($update->app_store);
        }
        $app_store = $request->file('app_store');
        $filename = $request->name . time() . '.' . $app_store->getClientOriginalExtension();
        $path = $app_store->storeAs("footer/", $filename, 'public');
        $update->app_store = $path;

       

        $update->save();
        return redirect()->route('footer.index');
    }
}
