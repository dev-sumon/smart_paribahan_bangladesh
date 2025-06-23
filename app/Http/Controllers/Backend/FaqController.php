<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class FaqController extends Controller
{
    public function index(): view
    {
        $data['faqs'] = Faq::latest()->get();
        return view('backend.faq.index', $data);
    }
    public function create(): view{
        return view('backend.faq.create');
    }
    public function store(FaqRequest $request): RedirectResponse
    {
        $save = new Faq();

        $save->question = $request->question;
        $save->answer = $request->answer;
        $save->status = $request->status ?? 0 ;

        $save->save();
        return redirect()->route('faq.index')->with('success', 'FAQ created successfully!');
    }
    public function update($id): View
    {
        $data['faq'] = Faq::findOrFail($id);
        return view('backend.faq.edit', $data);
    }
    public function update_store(FaqRequest $request, $id): RedirectResponse
    {
        $update = Faq::findOrFail($id);
        $update->question = $request->question;
        $update->answer = $request->answer;
        $update->status = $request->status ?? 0;

        $update->save();
        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully!');
    }
    public function status($id): RedirectResponse
    {
        $faq = Faq::findOrFail($id);
        if($faq->status == 1){
            $faq->status = 0;
        }else{
            $faq->status = 1;
        }

        $faq->save();
        return redirect()->route('faq.index')->with('success', 'FAQ status updated successfully!');
    }
    public function delete($id): RedirectResponse
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully!');
    }
    public function detalis($id): view
    {
        $data['faq'] = Faq::findOrFail($id);
        return view('backend.faq.show', $data);
    }
}
