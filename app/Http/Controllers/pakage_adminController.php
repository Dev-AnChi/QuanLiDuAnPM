<?php

namespace App\Http\Controllers;

use App\Models\voucher;
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

        $packages = package::get();
        return view('admin.package.index', ['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vouchers = voucher::query()->get();
        return view('admin.package.create',compact('vouchers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $vouchers = $request->input('multiselect');



        $urlImage = 'image'.time().'-'.$request->ten.'.'.$request->anh->extension();
        $request->anh->move(public_path('images'), $urlImage);

        $package = package::create([
                'ten' => $request->input('ten'),
                'anh' => $urlImage,
        ]);
        $package->save();

       if(!is_null($vouchers))
       {
          $package->vouchers()->attach(
              $vouchers
          );
       }


        return redirect()->route('package.index');
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
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

        $package = package::find($id);

        $all_voucher = voucher::query()->get();

         $arr_checked = array ();
         foreach ($all_voucher as $v)
         {
            foreach ($package->vouchers as $p)
            {
               if ($v->id === $p->id)
               {
                  $arr_checked[] = $p->id;
               }
            }
         }

        $all_voucher_except = $all_voucher->except($arr_checked);

        return view('admin.package.edit', [
            'package'=> $package,
            'all_voucher_except' => $all_voucher_except,
        ]);
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
       $vouchers = $request->input('multiselect');
       $packs = $request->input('pack');

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
       $package = package::query()->find($id);
      if (!is_null($packs))
      {
         $packs = array_filter($packs, static fn($pack) => $pack['tile'] ?? false);
         $package->vouchers()->sync(
             $packs
         );
      }

          $package->vouchers()->attach(
              $vouchers
          );


        return redirect()->route('package.index');
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

        $package = package::find($id);
        $package->vouchers()->detach();
        $package->delete();    
        return redirect()->route('package.index');
    }
}
