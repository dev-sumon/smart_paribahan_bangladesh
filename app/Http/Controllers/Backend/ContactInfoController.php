<?php

namespace App\Http\Controllers\Backend;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactInfoRequest;

class ContactInfoController extends Controller
{
    public function index(): View
    {
        return view('backend.contact_page.index');
    }
    public function create(): View
    {
        return view('backend.contact_page.create');
    }
    public function store(ContactInfoRequest $request): RedirectResponse
    {
        $save = new ContactInfo();
        $save->title = $request->title;
        $save->description = $request->description;
        $save->address = $request->address;
        $save->phone = $request->phone;
        $save->email = $request->email;
        $save->status = $request->status ?? 0;

        $save->save();
        return redirect()->route('contact.index');
    }
}
