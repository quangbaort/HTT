<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\AvatarRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $users  = User::all();
        return view('admin.user.index' , compact('users'));
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
        // dd($request->all());
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
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('user.profile' , compact('user'));
    }
    public function updateProfile(ProfileRequest $request)
    {
        $data = $request->all();
        User::find(Auth::user()->id)->update($data);
        toast('Thành công rồi đấy, vừa lòng mày chưa? :D','success','top-right');
        return back();
    }
    public function updateUser(UpdateUserRequest $request , $id)
    {
        dd($request->all());
        $data = $request->all();
        User::find($id)->update($data);
        toast('Thành công rồi đấy, vừa lòng mày chưa? :D','success','top-right');
        return back();
        // if($request->password)

    }
    public function viewUser(Request $request , $id)
    {
        $user = User::find($id);
        return view('admin.user.view' , compact('user'));
    }
    public function changePassword (PasswordRequest $request)
    {
        $passwordOld = $request->password_old;
        $passwordOfUser = Auth::user()->password;
        if(Hash::check($passwordOld , $passwordOfUser)){
            $passwordNew = Hash::make($request->password_new);
            User::find(Auth::user()->id)->update([
               'password' => $passwordNew
            ]);
            toast('Thành công rồi đấy, vừa lòng mày chưa? :D','success','top-right');
            return back();
        }
    }
    public function uploadAvatar(AvatarRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $path = $image->store('public/avatar');
            $data['avatar'] = Storage::url($path);
        }
        User::find(Auth::user()->id)->update($data);
        toast('Thành công rồi đấy,vừa lòng mày chưa? :D','success','top-right');
        return back();
    }
    public function UpdateUserAvatar(AvatarRequest $request , $id)
    {
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $path = $image->store('public/avatar');
            $data['avatar'] = Storage::url($path);
        }
        User::find($id)->update($data);
        toast('Thành công rồi đấy,vừa lòng mày chưa? :D','success','top-right');
        return back();
    }
    public function resetPassword(Request $request , $id)
    {
        $password = Hash::make('HTTVIP');
        User::find($id)->update([
            'password' => $password
        ]);
        toast('Thành công rồi đấy,vừa lòng mày chưa? :D','success','top-right');
        return back();
    }
    public function deleteUser(Request $request ,$id)
    {
        User::find($id)->delete();
        toast('Thành công rồi đấy,vừa lòng mày chưa? :D','success','top-right');
        return back();
    }

}
