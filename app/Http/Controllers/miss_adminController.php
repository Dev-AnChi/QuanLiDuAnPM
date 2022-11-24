<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\miss;

class miss_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $misss = miss::all();
        return view('admin.miss.index', ['misss' => $misss]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.miss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $miss = miss::create([
            'tennv' => $request->input('tennv'),
            'chitietnv' => $request->input('chitietnv'),
            'soluotdcnhan' => $request->input('soluotdcnhan')
        ]);
        $miss->save();
        return redirect('miss');
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
    public function edit($id)
    {
        //
        $miss = miss::find($id);
        return view('admin.miss.edit', ['miss' => $miss]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        miss::where('id', $id)->update([
            'tennv' => $request->input('tennv'),
            'chitietnv' => $request->input('chitietnv'),
            'soluotdcnhan' => $request->input('soluotdcnhan')
        ]);
        return redirect('miss');
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
        $miss = miss::find($id);
        $miss->delete();    
        return redirect('miss');
    }
}
