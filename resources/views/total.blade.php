@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Thống Kê Phân Trại Số {{$area->name}}</h1>
</div>
<table class="table table-bordered container" id="counting_price"">
    <tr>
        <th>NGÀY NHẬP</th>
        <th>
            <form action="" method="GET">
                <input type="date" name="date" max="{{now()->format('yy-m-d')}}" value="<?php echo $date;?>">
                <button type="submit">Lọc</button>
            </form>
        </th>
        <th><a href="">Xuất Excel</a></th>
    </tr>
    <tr>
        <th>Thời gian nhập</th>
        <th>Tên hàng</th>
        <th>Đơn vị tính</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
        <th>Ghi chú</th>
    </tr>
    @php
        $products = \App\Product::where('type_area_id', $id)->where('date_create', $date)->get();
        $total_price_all = 0;

        foreach($products as $item){
            $total_price_all = $total_price_all + $item->total_price;
        }
    @endphp
    @foreach($products as $item)
    <tr>
        <td>
            <label for="time_create" id="time_create">{{$item->date_create}}</label>
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
    </tr>
    @endforeach
    <tr>
        <th>
            <label for="total_price_all" id="total_price_all">Tổng</label>
        </th>

        <th></th>
        <th></th>
        <th></th>

        <td>
            <label for="total_price_all" id="total_price_all">{{$total_price_all}} VNĐ</label>
        </td>
    </tr>
</table>
@endsection