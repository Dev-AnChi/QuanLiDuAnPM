<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\package;
use Illuminate\Http\Request;
use App\Models\voucher;

class voucher_adminController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $packages = package::get();
        return view('admin.voucher.create',compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     *
     */


    public function store(Request $request)
    {
       $packs = $request->input('pack');
       $packs = array_filter($packs, static fn($pack) => $pack['tile'] ?? false);


        $urlImage = 'image'.time().'-'.$request->tenvoucher.'.'.$request->anh->extension();
        $request->anh->move(public_path('images'), $urlImage);

        $voucher = voucher::create([
                'tenvoucher' => $request->input('tenvoucher'),
                'anh' => $urlImage,
                'giatri' => $request->input('giatri')
        ]);
        $voucher->save();


          $voucher->packages()->attach(
              $packs
          );


        return redirect()->route('voucher.index');
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
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

        $voucher = voucher::find($id);

       $all_pac = package::query()->get();

       $arr_checked = array ();

       foreach ($all_pac as $v)
       {
          foreach ($voucher->packages as $p)
          {
             if ($v->id === $p->id)
             {
                $arr_checked[] = $p->id;
             }
          }
       }
       $all_pac_except = $all_pac->except($arr_checked);


       return view('admin.voucher.edit', [
           'voucher' => $voucher,
           'all_pac_except' => $all_pac_except,
           ]

       );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
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


       $packs = $request->input('pack');
       $packs = array_filter($packs, static fn($pack) => $pack['tile'] ?? false);

       $voucher = voucher::query()->find($id);
       $voucher->packages()->sync(
           $packs
       );


       return redirect()->route('voucher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $voucher = voucher::find($id);
        $voucher->packages()->detach();
        $voucher->delete();    
        return redirect()->route('voucher.index');
    }
}
