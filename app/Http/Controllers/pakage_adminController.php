<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\package;

class pakage_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packages = package::all();
        return view('admin.package.index', ['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.package.create');
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
        $urlImage = 'image'.time().'-'.$request->ten.'.'.$request->anh->extension();
        $request->anh->move(public_path('images'), $urlImage);

        $package = package::create([
                'ten' => $request->input('ten'),
                'anh' => $urlImage,
        ]);
        $package->save();
        return redirect('package');
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
        $package = package::find($id);
        return view('admin.package.edit', ['package' => $package]);
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
        if($request->file('anh') != null){
            $urlImage = 'image'.time().'-'.$request->ten.'.'.$request->anh->extension();
            $request->anh->move(public_path('images'), $urlImage);

            package::where('id', $id)->update([
                'ten' => $request->input('ten'),
                'anh' => $urlImage,
            ]);
        }
        else{
            package::where('id', $id)->update([
                'ten' => $request->input('ten'),
            ]);
        }
        
        return redirect('package');
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
        $package = package::find($id);
        $package->delete();    
        return redirect('package');
    }
}
