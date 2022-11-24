<?php

namespace App\Http\Controllers;

use App\Models\package;
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


   public function get($id): JsonResponse
   {
      $pac = package::query()->find($id);
      $data= array ();
      foreach ($pac->vouchers as $p) {
         $data[$p->id] = $p->pivot->tile;
      }

      $biasRandom = new BiasRandom();
      $biasRandom->setData($data);

      return response()->json(
      [
          'code' => 200,
          'data' => $biasRandom->random(),
      ]);
   }

   public function show($id)
   {
      $pac = package::query()->findOrFail($id)->vouchers;

      return view('quaythuong',compact('pac'));
   }
}
