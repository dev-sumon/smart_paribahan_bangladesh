<?php

namespace App\Http\Controllers\Backend;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function division(Request $request, $id): JsonResponse
    {
        $districts = District::where('division_id', $id)->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $districts
        ]);
    }
    public function district(Request $request, $id): JsonResponse
    {
        $district = District::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $district
        ]);
    }
}
