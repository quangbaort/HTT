<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    public function index()
    {
        $users  = User::all();
        return view('admin.user' , compact('users'));
    }
    public function update(UserRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $path = $image->store('public/avatar');
            $data['avatar'] = Storage::url($path);
        }
        User::create($data);
        toast('Thêm mới thành viên thành công','success','top-right');
    }
    public function addUser(UserRequest $request)
    {

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $path = $image->store('public/avatar');
            $data['avatar'] = Storage::url($path);
        }
        User::create($data);
        toast('Thêm mới thành viên thành công','success','top-right');
        return back();
    }

}
