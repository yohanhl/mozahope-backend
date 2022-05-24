<?php

namespace App\Http\Controllers;

use App\Models\Background;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BackgroundRequest;
use Yajra\DataTables\Facades\DataTables;

class BackgroundController extends Controller
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
            $query = Background::query();

            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        <a href="'. route('dashboard.background.edit', $item->id) .'" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                            Edit
                        </a>
                    ';
                })
                ->editColumn('image', function($item){
                    return '<img style="max-width: 150px;" src="'. Storage::url($item->image) .'"/>';
                })
                ->rawColumns(['action', 'image'])
                ->make();
                
        }

        return view('pages.dashboard.background.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BackgroundRequest $request)
    {
        //
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
    public function edit(Background $background)
    {
        return view('pages.dashboard.background.edit', [
            'item' => $background
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BackgroundRequest $request, Background $background)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('public/gallery');

        $background->update($data);

        return redirect()->route('dashboard.background.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
