@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('updateProfile')}}" method="POST">
            @csrf
            <fieldset class="p-4 border shadow">
                <legend>Thông tin cá nhân</legend>
                <div class="row mb-2">
                    <label class="col-3">Họ và Tên: <span style="color: red;">*</span></label>
                    <input class="col-5" type="text" name="name" value="{{auth()->user()->name}}" required>
                </div>

                <div class="row mb-2">
                    <label class="col-3">Email : <span style="color: red;">*</span></label>
                    <input class="col-5" type="email" name="email" value="{{auth()->user()->email}}" required>
                </div>

                <div class="row mb-2">
                    <label class="col-3">Mật khẩu mới : </label>
                    <input class="col-5" type="password" name="new_password" value="" placeholder="Chỉ nhập mật khẩu khi bạn muốn sửa mật khẩu">
                </div>

                <div class="row mb-2">
                    <label class="col-3">Xác nhận mật mới : </label>
                    <input class="col-5" type="password" name="confirm_password" value="" placeholder="Chỉ nhập mật khẩu khi bạn muốn sửa mật khẩu">
                </div>

                <div class="row mb-2 pt-3">
                    <label for="" class="col-3"></label>
                    <button class="col-5 bg-primary p-2 text-white container m-0" type="submit">Lưu thông tin</button>
                </div>
            </fieldset>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection