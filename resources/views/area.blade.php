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
            <h3 class="text-center">DANH SÁCH PHÂN TRẠI</h3>
            <table class="table" id="tblarea">
                <tr>
                    <th scope="col">Tên phân trại</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Chức năng</th>
                </tr>
                <tbody>
                @foreach($areas as $key => $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->discription}}</td>
                        <td class="d-flex">
                            <a href="{{route('show_area', $item->id)}}" class="btn btn-success btn-sm mr-2">Quản lý</a>
                            <a href="{{route('edit_area', $item->id)}}" class="btn btn-success btn-sm mr-2">Sửa</a>
                            <form action="{{route('deleteArea', $item->id)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')"
                                        class="btn btn-danger btn-sm" title="Xóa">Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <div class="border ">
            <h6 class="p-2">Thêm mới phân trại</h6>
            <form action="{{route('postArea')}}" method="POST" class="p-2 row">
                @csrf
                <div class="form-group col-md-4">
                    <label for="i4">Phân trại số:</label>
                    <input type="text" class="form-control" id="i4" name="name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="i5">Mô tả:</label>
                    <input type="text" class="form-control" id="i5" name="discription">
                </div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success" id="i6" style="margin-top: 30px;">Thêm phân trại
                    </button>
                </div>
            </form>
        </div>
        <br>
        <div>
            <div class=" justify-content-between">
                <h4 style="float: left">Thống kê ngày: </h4>
                <form action="" method="get" style="float: left; padding: 0 12px 0 12px;">
                    <input type="date" name="date" value="{{isset($date) ? $date : now()->format('yy-m-d')}}" required>
                    <button type="submit">Xem</button>
                </form>
                <form action="exportday" method="post" class="float-right">
                    @csrf
                    <input type="date" name="date" value="{{$date}}" class="d-none">
                    <button class="btn btn-sm btn-success highlight" type="submit">Xuất Excel</button>
                </form>
            </div>
        </div>
        <br><br>
        <ul class="nav nav-tabs float-left" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#menu">Sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Nhà cung cấp</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="menu" class="tab-pane active">
                <table class="table">
                    <tr>
                        {{--                            <th>Ngày</th>--}}
                        <th>Tên hàng</th>
                        <th>Đơn vị tính</th>
                        <th>Số lượng</th>
                        {{--                        <th>Đơn giá</th>--}}
                        {{--                        <th>Thành tiền</th>--}}
                        <th>Ghi chú</th>
                    </tr>
                    @foreach($products as $item)
                        <tr>
                            {{--                                <td>--}}
                            {{--                                    <label for="time_create" id="time_create">{{$item->date_create}}</label>--}}
                            {{--                                </td>--}}
                            <td>
                                <label for="name" id="name">{{$item->name}}</label>
                            </td>
                            <td>
                                <label for="type_caculating"
                                       id="type_caculating">{{$item->type_caculating}}</label>
                            </td>
                            <td>
                                <label for="total" id="total">{{$item->total}}</label>
                            </td>
                            {{--                        <td>--}}
                            {{--                            <label for="price" id="price">{{$item->total_price == null ? "" : number_format($item->price,0,"",".")}}</label>--}}
                            {{--                        </td>--}}
                            {{--                        <td>--}}
                            {{--                            <label for="total_price" id="total_price">{{$item->total_price == null ? "" : number_format($item->total_price,0,"",".")}}</label>--}}
                            {{--                        </td>--}}
                            <td>
                                <label for="note" id="note">{{$item->note}}</label>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div id="menu1" class="tab-pane">
                <br><br>
                <div>
                    @foreach($ncc as $i => $value)
                        <br>
                        <h4>Nhà cung cấp: {{$i}}</h4>
                        <table class="table">
                            <tr>
                                {{--                        <th>NCC</th>--}}
                                <th>Tên hàng</th>
                                <th>Đơn vị tính</th>
                                <th>Số lượng</th>
                                {{--                        <th>Đơn giá</th>--}}
                                {{--                        <th>Thành tiền</th>--}}
                                <th>Ghi chú</th>
                            </tr>
                            @foreach(group_product($value) as $item)
                                <tr>
                                    {{--                            <td>--}}
                                    {{--                                <label for="time_create" id="time_create">{{$item->supplier}}</label>--}}
                                    {{--                            </td>--}}
                                    <td>
                                        <label for="name" id="name">{{$item->name}}</label>
                                    </td>
                                    <td>
                                        <label for="type_caculating"
                                               id="type_caculating">{{$item->type_caculating}}</label>
                                    </td>
                                    <td>
                                        <label for="total" id="total">{{$item->total}}</label>
                                    </td>
                                    {{--                            <td>--}}
                                    {{--                                <label for="price" id="price">{{$item->total_price == null ? "" : number_format($item->price,0,"",".")}}</label>--}}
                                    {{--                            </td>--}}
                                    {{--                            <td>--}}
                                    {{--                                <label for="total_price" id="total_price">{{$item->total_price == null ? "" : number_format($item->total_price,0,"",".")}}</label>--}}
                                    {{--                            </td>--}}
                                    <td>
                                        <label for="note" id="note">{{$item->note}}</label>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                            </tr>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

