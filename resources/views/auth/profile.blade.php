@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('updateProfile')}}" method="POST">
            @csrf
            <fieldset class="p-4 border shadow">
                <legend>Thông tin cá nhân :</legend>
                <div class="row mb-2">
                    <label class="col-3">Họ và Tên* : </label>
                    <input class="col-5" type="text" name="name" value="{{auth()->user()->name}}" required>
                </div>

                <div class="row mb-2">
                    <label class="col-3">Email* : </label>
                    <input class="col-5" type="email" name="email" value="{{auth()->user()->email}}" required>
                </div>

                <div class="row mb-2">
                    <label class="col-3">Mật khẩu mới : </label>
                    <input class="col-5" type="password" name="new_password" value="">
                </div>

                <div class="row mb-2">
                    <label class="col-3">Xác nhận mật mới : </label>
                    <input class="col-5" type="password" name="confirm_password" value="">
                </div>

                <button class="bg-primary p-2 text-white container" type="submit">Lưu thông tin</button>
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