<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\HomepageRequest;
use Yajra\DataTables\Facades\DataTables;

class HomepageController extends Controller
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
            $query = Homepage::query();

            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        <a href="'. route('dashboard.homepage.edit', $item->id) .'" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                            Edit
                        </a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        // $route = Route::current()->getA;
        // dd($route);
        return view('pages.dashboard.homepage.index');
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
    public function store(HomepageRequest $request)
    {
        // $data = $request->all();

        // Homepage::create($data);

        // return redirect()->route('dashboard.homepage.index');
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
    public function edit(Homepage $homepage)
    {
        return view('pages.dashboard.homepage.edit', [
            'item' => $homepage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomepageRequest $request, Homepage $homepage)
    {
        $data = $request->all();

        $homepage->update($data);

        return redirect()->route('dashboard.homepage.index');
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
