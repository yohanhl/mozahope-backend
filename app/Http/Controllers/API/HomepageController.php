<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Homepage;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 3);
        $title = $request->input('title');

        if($id)
        {
            $homepage = Homepage::find($id);

            if($homepage)
                return ResponseFormatter::success($homepage, 'Homepage berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data tidak ada', 404);

        }

        $homepage = Homepage::latest()->get();
        return ResponseFormatter::success($homepage, 'Homepage berhasil diambil');
        
    }
}
