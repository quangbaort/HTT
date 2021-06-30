@extends('admin.layouts.app')
@section('title' , 'HTT - Thành viên')
@push('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <style>
        .hide {
            display: none;
        }
        #imagePreview{
            border-radius: 50%;
            width: 200px;
            height: 200px;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h1>Thành viên</h1>
            </div>
            <div class="col-6 my-2 justify-content-end text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#con-close-modal"> <i class="mdi mdi-account-plus"></i> Thêm mới</button>
            </div>
        </div>
        <diiv class="row">
            <div class="table-responsive">
                <table id="example" class="" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID thành viêb</th>
                            <th>Tên đăng nhập</th>
                            <th>Chúc vụ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->role}}</td>
                                <td>
                                    <a href="" class="px-2" title="Xóa"> <i class="mdi mdi-delete text-danger"></i></a>
                                    <a href="" title="Sửa"> <i class="mdi mdi-account-edit text-success"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </diiv>
    </div>
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add-user" action="{{route('add-user')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm mới thành viên</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tên tài khoản</label>
                                    <input type="text" autocomplete="false" class="form-control @error('username') @enderror" name="username" id="field-1" placeholder="baonq">
                                    <span class="help-block"></span>
                                    @error('username')
                                    <span class="help-block">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Mật khẩu</label>
                                    <input type="password" autocomplete="false" class="form-control @error('password') @enderror" name="password" id="field-2" placeholder="*****">
                                </div>
                                @error('password')
                                <span class="help-block">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" class="control-label">Chức vụ</label>
                                    <select name="role"  class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="2">Kiểm duyệt</option>
                                        <option value="3">Thành viên</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="field-3">
                                        <button class="btn btn-primary" type="button" id="btn-upload">Chọn ảnh đại diện</button>
                                    </label>
                                    <input type="file" style="display: none"  name="avatar" id="field-3">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="img_preview_wrap text-center">
                                    <img src="" id="imagePreview" alt="Preview Image"  class="hide img-fluid" />
                                </div>
                            </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light" id="submit">Lưu</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@include('vendor.sweetalert.alert')
@push('script')
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        $('#btn-upload').click(function () {
            $('#field-3').click()
        })
        $('#field-3').change(function() {
            readImgUrlAndPreview(this);

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
    <script>
        var users = @json($users);
        let arrUserName = [];
        for(let i = 0; i < users.length; i++){
            arrUserName.push(users[i].username)
        }
        $('input[name=username]').keyup(function () {
            var username = $(this).val()
            if(arrUserName.includes(username)){
                $(this).css('border' , '1px solid red')
                $(this).next().text('Tên tài khoản đã tồn tại')
                $('button[type=submit]').attr('disabled' , true)
            } else {
                $(this).css('border' , '1px solid #ccc')
                $('button[type=submit]').attr('disabled' , false)
                $(this).next().text('')
            }
        })
    </script>
@endpush
@endsection
