@extends('admin.layouts.app')
@section('title' , 'HTT - Thành viên')
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
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title">{{$user->username}}</p>
                    </div>
                    <div class="card-body">
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
                    
                        <form action="{{route('updateUser' , $user->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username" >Tên đăng nhập</label>
                                <input type="text" name="username" class="form-control" value="{{$user->username}}">
                                @error('username')
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