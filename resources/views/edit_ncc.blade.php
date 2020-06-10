@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa thông tin nhà cung cấp</h1>
        <form action="save_ncc" method="POST" class="p-2 row" >
            @csrf
            <div class="form-group col-md-4">
                <label for="i4">Tên nhà cung cấp:</label>
                <input type="text" class="form-control d-none" id="i4" name="id" value="{{$ncc->id}}" required>
                <input type="text" class="form-control" id="i4" name="name" value="{{$ncc->name}}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="i5">Mô tả:</label>
                <input type="text" class="form-control" id="i5" name="discription" value="{{$ncc->discription}}" >
            </div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" id="i6" style="margin-top: 30px;">Sửa nhà cung cấp</button>
            </div>
        </form>
    </div>
@endsection