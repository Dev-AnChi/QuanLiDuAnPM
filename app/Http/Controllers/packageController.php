<?php

namespace App\Http\Controllers;


use App\Models\package;

use App\Models\User;
use App\Models\voucher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


use wataridori\BiasRandom\BiasRandom;

class packageController extends Controller
{

   public function index()
   {

      $pac = package::query()->get();
      return view('chongoi',compact('pac'));
   }


   public function get($userid,$id): JsonResponse
   {

      $user = User::query()->findOrFail($userid);


      if ($user->soluotquay <= 0)
      {
         return response()->json(
             [
                 'code' => 200,
                 'data' => 'hết lượt quay',
             ],200);
      }


      --$user->soluotquay;
     $user->save();


      $pac = package::query()->find($id);

      $data= array ();
      $i = 0;


      foreach ($pac->vouchers as $p) {
         $data[$p->id] = $p->pivot->tile;
      }

      $biasRandom = new BiasRandom();
      $biasRandom->setData($data);
      $id_quay_duoc = $biasRandom->random();
      $voucher = voucher::query()->findOrFail($id_quay_duoc[0]);

      $index = array_search($id_quay_duoc[0],array_keys($data));

      $user->vouchers()->attach(
              $id_quay_duoc[0]
      );

      return response()->json(
      [
          'code' => 200,
          'data' => [
              'id' =>   $index,
              'name' => $voucher->tenvoucher,
          ],
      ]);
   }

   public function show($id)
   {
      $pac = package::query()->findOrFail($id);

      return view('quaythuong',compact('pac'));
   }
}
