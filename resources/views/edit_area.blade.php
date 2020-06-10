@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa thông tin phân trại</h1>
        <form action="{{route('update_area')}}" method="POST" class="p-2 row" >
            @csrf
            <div class="form-group col-md-4">
                <label for="i4">Phân trại số:</label>
                <input type="text" class="form-control d-none" id="i4" name="id" value="{{$area->id}}" required>
                <input type="text" class="form-control" id="i4" name="name" value="{{$area->name}}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="i5">Mô tả:</label>
                <input type="text" class="form-control" id="i5" name="discription" value="{{$area->discription}}" >
            </div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" id="i6" style="margin-top: 30px;">Sửa phân trại</button>
            </div>
        </form>
    </div>
@endsection