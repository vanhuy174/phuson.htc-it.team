@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa thông tin thực phẩm</h1>
        <table class="table table-bordered container" id="counting_price" name="counting_price">
            <tr>
                <th>Tên hàng</th>
                <th>Đơn vị tính</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Ghi chú</th>
                <th>Hành động</th>
            </tr>
            <form action="{{asset('area/'.$id.'/'.$product->id)}}" method="POST">
                <tr>
                    @csrf
                    <th><input type="text" name="name" id="name" value="{{$product->name}}" required></th>
                    <th><input type="text" name="type_caculating" id="type_caculating" value="{{$product->type_caculating}}" required></th>
                    <th><input type="number" step="any" name="total" id="total" value="{{$product->total}}" required></th>
                    <th><input type="number" step="any" name="price" id="price" value="{{$product->price}}" required></th>
                    <th><input type="text" id="note" name="note" value="{{$product->note}}"></th>
                    <th><button class="btn btn-sm btn-primary" type="submit">Lưu</button></th>
                </tr>
            </form>
        </table>
    </div>
@endsection

