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
            <table class="table">
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
                            <a href="{{asset('/area/'.$item->id)}}" class="btn btn-success btn-sm mr-2">Quản lý</a>
                            <form action="{{route('deleteArea', $item->id)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">

                                @csrf
                                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')"
                                        class="btn btn-danger btn-sm" title="Xóa">Xóa</button>
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
            <form action="{{route('postArea')}}" method="POST" class="p-2 row" >
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
                    <button type="submit" class="btn btn-success" id="i6" style="margin-top: 30px;">Thêm phân trại</button>
                </div>
            </form>
        </div>
            <br>
        <div>
            <div>
                <h4 style="float: left">Thống kê ngày: </h4>
                <form action="" method="get" style="float: left; margin-right: 12px;">
                    <input type="date" name="date" value="{{isset($date) ? $date : now()->format('yy-m-d')}}" required>
                    <button type="submit">Xem</button>
                </form>
                <form action="exportmonth" method="post">
                    @csrf
                    <input type="date" name="date_ex" value="{{$date}}" class="d-none" >
                    <button class="btn btn-sm btn-success" type="submit">Xuất Excel</button>
                </form>
            </div>
            <div>
                <table class="table">
                    <tr>
                        <th>Ngày</th>
                        <th>Tên hàng</th>
                        <th>Đơn vị tính</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Ghi chú</th>
                    </tr>
                    @foreach($products as $item)
                    <tr>
                        <td>
                            <label for="time_create" id="time_create">{{$item->created_at->format('d/m/yy')}}</label>
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
                            <label for="price" id="price">{{$item->total_price == null ? "" : number_format($item->price,0,"",".")}}</label>
                        </td>
                        <td>
                            <label for="total_price" id="total_price">{{$item->total_price == null ? "" : number_format($item->total_price,0,"",".")}}</label>
                        </td>
                        <td>
                            <label for="note" id="note">{{$item->note}}</label>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

