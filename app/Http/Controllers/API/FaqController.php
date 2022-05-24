<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 3);

        if($id)
        {
            $faq = Faq::find($id);

            if($faq)
                return ResponseFormatter::success($faq, 'FAQ berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data tidak ada', 404);

        }

        $faq = Faq::get();
        return ResponseFormatter::success($faq, 'FAQ berhasil diambil');
        
    }
}
