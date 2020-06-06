@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <h1 class="text-center">DANH SÁCH PHÂN TRẠI</h1>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Tên phân trại</th>
                    <th scope="col">Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($areas as $key => $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>
                            {{--                        <form action="area/{{$item->id}}" method="post">--}}
                            {{--                            @csrf--}}
                            {{--                            <a href="{{asset("product/".$item->id)}}" class="btn btn-success btn-sm">Quản lý</a>--}}
                            <a href="{{asset('area/'.$item->id)}}" class="btn btn-success btn-sm">Quản lý</a>
                            <a href="area/{{$item->id}}" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')"
                               class="btn btn-danger btn-sm" title="Xóa">Xoá</a>
                            {{--                            <input type="hidden" name="_method" value="DELETE">--}}
                            {{--                            <button type="submit" class="btn btn-success">Xóa</button>--}}
                            {{--                        </form>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    <hr>
        <div class="border ">
            <h4 class="p-2">Thêm mới phân trại</h4>
            <form action="{{route('postArea')}}" method="POST" class="p-2">
                @csrf
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Phân trại số:</label>
                    <div class="col-sm-10 row">
                        <input type="text" name="name" class="form-control col-lg-3" id="inputPassword"
                               placeholder="Phân trại 1" required>
                        <button type="submit" class="btn btn-success ml-3" id="inputPassword">Thêm phân trại</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

