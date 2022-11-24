<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
      //kiểm tra trường remember có được chọn hay không

      session()->push('a','123') ;

      if (Auth::guard('loyal_customer')->attempt($arr)) {

         return view('mylogin.results');
         //..code tùy chọn
         //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
      } else {

         dd('tài khoản và mật khẩu chưa chính xác');

         //...code tùy chọn
         //đăng nhập thất bại hiển thị đăng nhập thất bại
      }
   }
}
