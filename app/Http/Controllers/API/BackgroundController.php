<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Background;
use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 3);

        if($id)
        {
            $background = Background::find($id);

            if($background)
                return ResponseFormatter::success($background, 'Gambar berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Gambar tidak ada', 404);

        }

        $background = Background::get();
        return ResponseFormatter::success($background, 'Gambar berhasil diambil');
        
    }
}
