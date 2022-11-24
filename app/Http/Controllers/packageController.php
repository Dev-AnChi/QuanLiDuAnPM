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
                 'code' => 201,
                 'data' => 'hết lượt quay',
             ],201);
      }


      --$user->soluotquay;
     $user->save();


      $pac = package::query()->find($id);

      $data= array ();
      foreach ($pac->vouchers as $p) {
         $data[$p->id] = $p->pivot->tile;
      }

      $biasRandom = new BiasRandom();
      $biasRandom->setData($data);
      $temp = $biasRandom->random();

      $voucher = voucher::query()->findOrFail($temp)->first();

      return response()->json(
      [
          'code' => 200,
          'data' => [
              'id' =>   $temp,
              'name' => $voucher->tenvoucher,
          ],
      ]);
   }

   public function show($id)
   {
      $pac = package::query()->findOrFail($id)->vouchers;

      return view('quaythuong',compact('pac'));
   }
}
