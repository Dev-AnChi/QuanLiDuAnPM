<?php

namespace App\Http\Controllers;

use App\Models\miss;
use App\Models\package;
use App\Models\User;
use App\Models\voucher;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   public function getLogin(): Factory|View|Application
   {
      return view('mylogin.login');//return ra trang login để đăng nhập
   }
   public function postLogin(Request $request)
   {
      $arr = [
          'email' => $request->email,
          'password' => $request->password,
      ];
      if ($request->remember === trans('remember.Remember Me')) {
         $remember = true;
      } else {
         $remember = false;
      }

      session()->push('a','123') ;

      if (Auth::guard('loyal_customer')->attempt($arr)) {

         return view('mylogin.results');
      } else {

         dd('tài khoản và mật khẩu chưa chính xác');

      }
   }

   public function dashboard()
   {
      $user = User::query()->get()->count();
      $voucher = voucher::query()->get()->count();
      $pac = package::query()->get()->count();
      $quay = User::query()->get();
      $s = 0;
      foreach ($quay as $q)
      {
         $s += $q->vouchers2->count();

      }
      return View('admin.general.dashboard',
      compact(
          'user',
          'voucher',
          'pac',
          'quay',
          's',
      ));
   }

   public function report()
   {


      $users =
          DB::table('user_voucher')
              ->join('users','users.id','=','user_voucher.user_id')
              ->join('vouchers','vouchers.id','=','user_voucher.voucher_id')
              ->select('users.name','vouchers.tenvoucher','vouchers.giatri','user_voucher.created_at')
              ->orderBy('user_voucher.created_at','desc')
         ->paginate('10');

      return View('admin.general.report',compact(
          'users',
      ));
   }


   public function gethistory()
   {
      $id = Auth::id();
      $user = User::query()->find($id)->vouchers();
      return View('lichsu',[
          'user' => $user->paginate(6),
      ]);
   }

   public  function  getmiss()
   {
      $miss = miss::get();
      return view('nhiemvu',compact('miss'));
   }
}
