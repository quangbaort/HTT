<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        dd(123);
    }
    public function logout()
    {
        Auth::logout();
        toast('Bạn đã thoát','error','top-right');
        return redirect(route('userLogin'));
    }
}
