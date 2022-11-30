<?php

namespace App\Http\Controllers;

use App\Models\voucher;
use Illuminate\Http\Request;

class voucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $vouchers = voucher::all();
        return view('admin.voucher.index', ['vouchers' => $vouchers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $urlImage = 'image'.time().'-'.$request->tenvoucher.'.'.$request->anh->extension();
        $request->anh->move(public_path('images'), $urlImage);

        $voucher = voucher::create([
                'tenvoucher' => $request->input('tenvoucher'),
                'anh' => $urlImage,
                'giatri' => $request->input('giatri')
        ]);
        $voucher->save();
        return redirect('voucher');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $voucher = voucher::find($id);
        return view('admin.voucher.edit', ['voucher' => $voucher]);
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
        if($request->file('anh') != null){
            $urlImage = 'image'.time().'-'.$request->tenvoucher.'.'.$request->anh->extension();
            $request->anh->move(public_path('images'), $urlImage);

            voucher::where('id', $id)->update([
                'tenvoucher' => $request->input('tenvoucher'),
                'anh' => $urlImage,
                'giatri' => $request->input('giatri')
            ]);
        }
        else{
            voucher::where('id', $id)->update([
                'tenvoucher' => $request->input('tenvoucher'),
                'giatri' => $request->input('giatri')
            ]);
        }
        
        return redirect('voucher');
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
        $voucher = voucher::find($id);
        $voucher->delete();    
        return redirect('voucher');
    }
}
