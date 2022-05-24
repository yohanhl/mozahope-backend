<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
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
            $query = Faq::query();

            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        <a href="'. route('dashboard.faq.edit', $item->id) .'" class="bg-gray-500 text-white rounded-md px-2 py-1 m-2">
                            Edit
                        </a>
                        <form class="inline-block" action="'. route('dashboard.faq.destroy', $item->id).'" method="POST">
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
        return view('pages.dashboard.faq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $data = $request->all();

        Faq::create($data);

        return redirect()->route('dashboard.faq.index');
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
    public function edit(Faq $faq)
    {
        return view('pages.dashboard.faq.edit', [
            'item' => $faq
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $data = $request->all();

        $faq->update($data);

        return redirect()->route('dashboard.faq.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('dashboard.faq.index');
    }
}
