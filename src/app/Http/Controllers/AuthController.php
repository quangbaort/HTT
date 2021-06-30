<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class AuthController extends Controller
{
    public function index()
    {
        return view('user.login');
    }
    public function loginPost(AuthRequest $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
            'role' => 1
        ];
        if(Auth::attempt($credentials)):
            toast('đăng nhập thành công','success','top-right');
            return redirect(route('dashboard'));
        else:
            toast('Sai tên tài khoản hoặc mật khẩu','error','top-right');
            return back();
        endif;

    }
}
