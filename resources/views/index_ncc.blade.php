@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Danh sách nhà cung cấp</h3>
        <br>
        <table class="table">
            <tr>
                <th>Tên nhà cung cấp</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
            @foreach($ncc as $key)
                <tr>
                    <td>{{$key->name}}</td>
                    <td>{{$key->discription}}</td>
                    <td class="d-flex">
                        <a href="ncc/{{$key->id}}" class="btn btn-success btn-sm mr-2">Sửa</a>
                        <form action="ncc/delete/{{$key->id}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')"
                                    class="btn btn-danger btn-sm" title="Xóa">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        <div class="border ">
            <h6 class="p-2">Thêm mới nhà cung cấp</h6>
            <form action="/ncc" method="POST" class="p-2 row" >
                @csrf
                <div class="form-group col-md-4">
                    <label for="i4">Tên nhà cung cấp:</label>
                    <input type="text" class="form-control" id="i4" name="name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="i5">Mô tả:</label>
                    <input type="text" class="form-control" id="i5" name="discription">
                </div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success" id="i6" style="margin-top: 30px;">Thêm nhà cung cấp</button>
                </div>
            </form>
        </div>
    </div>
@endsection
