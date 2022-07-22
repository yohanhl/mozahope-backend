<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AboutR;
use Illuminate\Http\Request;

class AboutRController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 3);

        if($id)
        {
            $about = AboutR::find($id);

            if($about)
                return ResponseFormatter::success($about, 'About berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data tidak ada', 404);

        }

        $about = AboutR::get();
        return ResponseFormatter::success($about, 'About berhasil diambil');
        
    }
}
