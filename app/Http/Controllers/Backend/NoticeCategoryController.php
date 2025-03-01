<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\NoticeCategory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\NoticeCategoryRequest;

class NoticeCategoryController extends Controller
{
    public function index(): View
    {
        $data['categories'] = NoticeCategory::latest()->get();
        return view('backend.notice_category.index', $data);
    }
    public function create(): View
    {
        return view('backend.notice_category.create');
    }
    public function store(NoticeCategoryRequest $request): RedirectResponse
    {
        $save = new NoticeCategory();

        $save->name = $request->name;
        $save->status = $request->status ?? 1;

        $save->save();

        return redirect()->route('notice_category.index');
    }
    public function update($id): View
    {
        $data['category'] = NoticeCategory::findOrFail($id);
        return view('backend.notice_category.edit', $data);
    }
    public function update_store(NoticeCategoryRequest $request, $id): RedirectResponse
    {
        $update = NoticeCategory::findOrFail($id);
        $update->name = $request->name;
        $update->status = $reques->status ?? 1;

        $update->save();
        return redirect()->route('notice_category.index');
    }
    public function status($id): RedirectResponse
    {
        $category = NoticeCategory::findOrFail($id);
        if($category->status == 1){
            $category->status = 0;
        }else{
            $category->status = 1;
        }

        $category->save();

        return redirect()->route('notice_category.index');
    }
    public function delete($id): RedirectResponse
    {
        $category = NoticeCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('notice_category.index');
    }
    public function detalis($id): View
    {
        $data['category'] = NoticeCategory::findOrFail($id);
        return view('backend.notice_category.show', $data);
    }
}
