@extends('admin.layouts.app')
@section('title' , 'HTT - Thông tin của mày')
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
        <h1>Thông tin Của mày</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">Thông tin của mày nè</p>
                        </div>
                        <form action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                            <div class="col-12">
                                <div class="img_preview_wrap text-center">
                                    <img src="{{asset($user->avatar)}}" id="imagePreview" alt="Preview Image"  class="hide img-fluid" />
                                </div>
                            </div>
                            <div class="col-12 text-center my-2">
                                <div class="form-group">
                                    <label for="field-3">
                                        <button class="btn btn-primary" type="button" id="btn-upload">Chọn ảnh đại diện</button>
                                    </label>
                                    <input type="file" style="display: none"  name="avatar" id="field-3">
                                </div>
                            </div>
                            
                                <div class="form-group">
                                    <label for="username">Tên tài khoản</label>
                                    <input type="text" class="form-control" value="{{$user->username}}" name="username">
                                    <span class="help-block text-danger"></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <button class="btn btn-primary">Thay đổi</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('script')
<script>
    var users = @json($user);
    $('input[name=username]').keyup(function () {
            var username = $(this).val()
            if(username == users.username){
                $(this).css('border' , '1px solid red')
                $(this).next().text('Tên tài khoản đã tồn tại')
                $('button[type=submit]').attr('disabled' , true)
            } else {
                $(this).css('border' , '1px solid #ccc')
                $('button[type=submit]').attr('disabled' , false)
                $(this).next().text('')
            }
        })
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
@endpush
@endsection