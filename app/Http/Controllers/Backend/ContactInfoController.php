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
        $data['contacts'] = ContactInfo::latest()->get();
        return view('backend.contact_page.index', $data);
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
    public function status($id): RedirectResponse
    {
        $contact = ContactInfo::findOrFail($id);
        if($contact->status == 1){
            $contact->status = 0;
        }else{
            $contact->status = 1;
        }
        $contact->save();
        return redirect()->route('contact.index');
    }
    public function update($id): View
    {
        $data['contact'] = ContactInfo::findOrFail($id);
        return view('backend.contact_page.edit', $data);
    }
    public function update_store(ContactInfoRequest $request, $id): RedirectResponse
    {
        $update = ContactInfo::findOrFail($id);

        $update->title = $request->title;
        $update->description = $request->description;
        $update->address = $request->address;
        $update->phone = $request->phone;
        $update->email = $request->email;
        $update->status = $request->status ?? 0;

        $update->save();
        return redirect()->route('contact.index');

    }
    public function delete($id): RedirectResponse
    {
        $contact = ContactInfo::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.index');
    }
    public function detalis($id)
    {
        $data['contact'] = ContactInfo::findOrFail($id);
        return view('backend.contact_page.show', $data);
    }
}
