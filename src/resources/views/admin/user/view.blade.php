@extends('admin.layouts.app')
@section('title' , 'SG - Hago - Thành viên')
@push('style')
<style>
        
        #imagePreview{
            border-radius: 50%;
            width: 200px;
            height: 200px;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <h1>Chi tiết</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title">{{$user->username}}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="POST" id="uploadAvatar"  enctype='multipart/form-data' action="{{route('update-user-avatar' , $user->id)}}">
                                    @csrf
                                    <div class="col-12">
                                        <div class="img_preview_wrap text-center">
                                            <img src="{{asset($user->avatar)}}" id="imagePreview" alt="Preview Image"  class="hide img-fluid" />
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="field-3">
                                            <button class="btn btn-primary my-2" type="button" id="btn-upload">Chọn ảnh đại diện</button>
                                        </label>
                                        <input type="file" style="display: none"  name="avatar" id="field-3">
                                    </div>
                                    @error('avatar')
                                    <span class="help-block text-danger">{{$message}}</span>
                                    @enderror
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="{{route('updateUser' , $user->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username" >Họ và tên:</label>
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                        @error('name')
                                            <span class="help-block text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Chức vụ:</label>
                                        <select name="role" id="" class="form-control">
                                            <option value="1" @if($user->role == 1) selected @endif>Admin</option>
                                            <option value="2" @if($user->role == 2) selected @endif>Kiểm duyệt viên</option>
                                            <option value="3" @if($user->role == 3) selected @endif>Thành viên</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" >Tên Hago:</label>
                                        <input type="text" name="name_hago" class="form-control" value="{{$user->name_hago}}">
                                        @error('name_hago')
                                            <span class="help-block text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="username" >Tên Hago:</label>
                                        <input type="text" name="id_hago" class="form-control" value="{{$user->id_hago}}">
                                        @error('id_hago')
                                            <span class="help-block text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="username" >Cấp vip(lưu ý : cấp vip khi tham gia gia tộc):</label>
                                        <input type="number" name="vip" class="form-control" value="{{$user->vip}}">
                                        @error('vip')
                                            <span class="help-block text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Thay đổi</button>
                            <a href="{{route('resetPassword' , $user->id)}}" class="btn btn-primary">Đặt lại mật khẩu</a>
                        </div>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
<script>
        $('#btn-upload').click(function () {
            $('#field-3').click()
        })
        $('#field-3').change(function() {
            readImgUrlAndPreview(this);
            $('form#uploadAvatar').submit();
            function readImgUrlAndPreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').removeClass('hide').attr('src', e.target.result);
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

    </script>
@endpush