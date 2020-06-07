@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <br> <div id="error" class="alert alert-info container">{{ session()->get('message') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <ul style="overflow-y: scroll; max-height: 250px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container">
    <h1 class="text-center">Thống Kê Phân Trại: {{$area->name}}</h1>
    <table class="table table-bordered container" id="counting_price" >
        <tr>
            <th>NGÀY NHẬP</th>
            <th>
                <form action="" method="GET">
                    <input id="getdate" type="date" name="date" value="{{$date}}" max="{{now()->format('yy-m-d')}}" required>
                    @csrf
                    <button type="submit">Lọc</button>
                </form>
            </th>
            <th>
                <form action="export" method="post">
                    @csrf
                    <input type="text" name="id_area_ex" value="{{$area->id}}" class="d-none">
                    <input type="text" name="name_area_ex" value="{{$area->name}}" class="d-none">
                    <input type="date" name="date_ex" value="{{$date}}" class="d-none" >
                    <button class="btn btn-sm btn-success" type="submit">Xuất Excel</button>
                </form>
            </th>
        </tr>
        <tr>
            <th>Thời gian nhập</th>
            <th>Tên hàng</th>
            <th>Đơn vị tính</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
            <th>Ghi chú</th>
            <th>Hành động</th>
        </tr>
        @foreach($products as $item)
        <tr>
            <td>
                <label for="time_create" id="time_create">{{$item->created_at}}</label>
            </td>
            <td>
                <label for="name" id="name">{{$item->name}}</label>
            </td>
            <td>
                <label for="type_caculating" id="type_caculating">{{$item->type_caculating}}</label>
            </td>
            <td>
                <label for="total" id="total">{{$item->total}}</label>
            </td>
            <td>
                <label for="price" id="price">{{$item->price}}</label>
            </td>
            <td>
                <label for="total_price" id="total_price">{{$item->total_price}} VNĐ</label>
            </td>
            <td>
                <label for="note" id="note">{{$item->note}}</label>
            </td>
            <td class="d-flex justify-content-around">
                <a href="{{asset('area/'.$area->id.'/'.$item->id)}}" class="btn btn-warning btn-sm" title="Sửa">Sửa</a>
                <form action="{{asset('area/'.$area->id.'/'.$item->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    @csrf
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')"
                       class="btn btn-danger btn-sm" title="Xóa">Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <th>
                <label for="total_price_all" id="total_price_all">Tổng:</label>
            </th>
            <td>
                <label for="total_price_all" id="total_price_all">{{$total_price_all}} VNĐ</label>
            </td>
        </tr>
    </table>
    <div class="container border">
        <h4 class="p-2 bold">Thêm mới</h4>
        <form action="{{route('postProduct')}}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="i0">Ngày nhập</label>
                    <input type="date" name="date_create" class="form-control" id="i0" max="{{now()->format('yy-m-d')}}" value="{{now()->format('yy-m-d')}}" required>
                    <input type="text"  name="type_area_id" value="{{$area->id}}" hidden>
                </div>
                <div class="form-group col-md-4">
                    <label for="i1">Tên hàng</label>
                    <input type="text" name="name" class="form-control" id="i1" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="i2">Đơn vị tính</label>
                    <input type="text" class="form-control" id="i2" name="type_caculating" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="i3">Số lượng</label>
                    <input type="number" class="form-control" id="i3" step="any" name="total" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="i4">Đơn giá</label>
                    <input type="number" class="form-control" id="i4" step="any" name="price" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="i5">Ghi chú</label>
                    <input type="text" class="form-control" id="i5" name="note" >
                </div>
                <div class="form-group col-md-4">
                    <input type="submit" class="form-control btn btn-success" value="Thêm">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
