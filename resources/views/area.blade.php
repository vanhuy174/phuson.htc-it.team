@extends('layouts.app')

@section('content')
    <form action="{{route('postArea')}}" method="POST">
        @csrf
        <table class="container">
            <tr>
                <th>Phân trại số:
                    <input type="number" min="1" name="type_area" id="type_area" value="1" required>
                    <button type="submit">Thêm</button>
                </th>
            </tr>
        </table>
    </form>

    <div class="container">
        <h1 class="text-center">DANH SÁCH PHÂN TRẠI</h1>
    </div>
    <table class="table table-bordered container">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên phân trại</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>

            @foreach($areas as $key => $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>
                        <form action="area/{{$item->id}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="{{asset('area/'.$item->id)}}" target="_blank">Thống kê</a>
                            @csrf
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
@endsection

