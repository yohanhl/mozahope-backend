<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 3);

        if($id)
        {
            $about = About::find($id);

            if($about)
                return ResponseFormatter::success($about, 'About berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data tidak ada', 404);

        }

        $about = About::get();
        return ResponseFormatter::success($about, 'About berhasil diambil');
        
    }
}
