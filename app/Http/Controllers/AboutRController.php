<?php

namespace App\Http\Controllers;

use App\Models\AboutR;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRRequest;
use Yajra\DataTables\Facades\DataTables;

class AboutRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = AboutR::query();

            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        <a href="'. route('dashboard.aboutr.edit', $item->id) .'" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                            Edit
                        </a>
                        <form class="inline-block" action="'. route('dashboard.aboutr.destroy', $item->id).'" method="POST">
                        <button class="bg-red-500 text-white rounded-md px-2 py-1 m-2">
                            Hapus
                        </button>
                    '. method_field('delete'). csrf_field().'
                    </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.aboutr.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.aboutr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRRequest $request)
    {
        $data = $request->all();

        AboutR::create($data);

        return redirect()->route('dashboard.aboutr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutR $aboutr)
    {
        return view('pages.dashboard.aboutr.edit', [
            'item' => $aboutr
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRRequest $request, AboutR $aboutr)
    {
        $data = $request->all();

        $aboutr->update($data);

        return redirect()->route('dashboard.aboutr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutR $aboutr)
    {
        $aboutr->delete();
        return redirect()->route('dashboard.aboutr.index');
    }
}
