@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <br>
        <div id="error" class="alert alert-info container">{{ session()->get('message') }}</div>
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
        <h3 class="text-center titler">Quản lý Phân Trại: {{$area->name}}</h3>
        <div class="d-flex">
            <h5 class="mr-2">Ngày nhập</h5>
            <form action="{{route('show_area', $area->id)}}" class="mr-2">
                <input id="getdate" type="date" name="date" value="{{$date}}" required>
                <button type="submit">Lọc</button>
            </form>
            <form action="export" method="post">
                @csrf
                <input type="text" name="id_area_ex" value="{{$area->id}}" class="d-none">
                <input type="text" name="name_area_ex" value="{{$area->name}}" class="d-none">
                <input type="date" name="date_ex" value="{{$date}}" class="d-none">
                <button class="btn btn-sm btn-success" type="submit">Xuất Excel</button>
            </form>
        </div>
        <br>
        <table class="table">
            {{--        <thead>--}}
            <tr>
                <th>Nhà cung cấp</th>
                <th>Tên hàng</th>
                <th>Đơn vị tính</th>
                <th>Số lượng</th>
{{--                <th>Đơn giá</th>--}}
{{--                <th>Thành tiền</th>--}}
                <th>Ghi chú</th>
                <th>Hành động</th>
            </tr>
            {{--        </thead>--}}
            @foreach($products as $item)
                {{--        <tbody>--}}
                <tr>
                    <td>
                        <label for="supplier" id="supplier">{{$item->supplier}}</label>
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
{{--                    <td>--}}
{{--                        <label for="price"--}}
{{--                               id="price">{{$item->total_price == null ? "" : number_format($item->price,0,"",".")}}</label>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <label for="total_price"--}}
{{--                               id="total_price">{{$item->total_price == null ? "" : number_format($item->total_price,0,"",".")}}</label>--}}
{{--                    </td>--}}
                    <td>
                        <label for="note" id="note">{{$item->note}}</label>
                    </td>
                    <td>
                        <a href="{{asset('product/'.$area->id.'/'.$item->id)}}" class="btn btn-warning btn-sm"
                           title="Sửa" style="float: left; margin-right: 6px;">Sửa</a>
                        <form action="{{route('deleteProduct')}}" method="POST">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            @csrf
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')"
                                    class="btn btn-danger btn-sm" title="Xóa">Xoá
                            </button>
                        </form>
                    </td>
                </tr>
                {{--        </tbody>--}}
            @endforeach
            {{--        <tr>--}}
            {{--            <th>--}}
            {{--                <label for="total_price_all" id="total_price_all">Tổng:</label>--}}
            {{--            </th>--}}
            {{--            <td colspan="7">--}}
            {{--                <label for="total_price_all" id="total_price_all">{{$total_price_all}} VNĐ</label>--}}
            {{--            </td>--}}
            {{--        </tr>--}}
            <tr>
                <td colspan="8"></td>
            </tr>
        </table>
        <div class="container border">
            <h4 class="p-2 bold">Thêm mới</h4>
            <form action="{{route('postProduct')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="date_create">Ngày nhập</label>
                        <input type="date" name="date_create" class="form-control" id="date_create" value="{{$date}}"
                               required>
                        <input type="text" name="type_area_id" value="{{$area->id}}" hidden>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="supplier">Nhà cung cấp</label>
                        <input type="text" list="ncc" name="supplier" class="form-control" id="supplier" required>
                        <datalist id="ncc">
                            @foreach($ncc as $key)
                                <option value="{{$key->name}}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="i1">Tên hàng</label>
                        <input list="browsers" name="name" class="form-control" id="i1" required>
                        <datalist id="browsers">
                            <option value="Gạo">
                            <option value="Thịt lợn">
                            <option value="Thịt bò">
                            <option value="Thịt gà">
                            <option value="Thịt vịt">
                            <option value="Giò bò">
                            <option value="Giò lợn">
                            <option value="Giò thủ">
                            <option value="Trứng gà">
                            <option value="Trứng vịt">
                            <option value="Cá">
                            <option value="Tôm">
                            <option value="Cua">
                            <option value="Cải bắp">
                            <option value="Cải xanh">
                            <option value="Súp lơ">
                            <option value="Rau muống">
                            <option value="Bí đỏ">
                            <option value="Bí đao">
                            <option value="Cà chua">
                            <option value="Mướp">
                            <option value="Mướp đắng">
                            <option value="Dưa chuột">
                            <option value="Măng">
                            <option value="Giá đỗ">
                            <option value="Đậu phụ">
                        </datalist>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="i2">Đơn vị tính</label>
                        <input type="text" class="form-control" id="i2" name="type_caculating" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="i3">Số lượng</label>
                        <input type="number" class="form-control" id="i3" step="any" name="total">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="i4">Đơn giá</label>
                        <input type="number" class="form-control" id="i4" step="any" name="price">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="i5">Ghi chú</label>
                        <input type="text" class="form-control" id="i5" name="note">
                    </div>
                    <div class="form-group col-md-4" style="margin-top: 30px;">
                        <input type="submit" class="form-control btn btn-success" value="Thêm">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
