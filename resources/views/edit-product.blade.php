@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa thông tin thực phẩm</h1>
        <form action="{{route('save_product')}}" method="POST">
            @csrf
            <div class="form-row">
                <input type="text" name="id_area" value="{{$id_area}}" hidden>
                <input type="text" name="id" value="{{$product->id}}" hidden>
                <div class="form-group col-md-4">
                    <label for="supplier">Nhà cung cấp</label>
                    <input type="text" list="ncc"  name="supplier" class="form-control" id="supplier" value="{{$product->supplier}}" required>
                    <datalist id="ncc">
                        @foreach($ncc as $key)
                            <option value="{{$key->name}}">
                        @endforeach
                    </datalist>
                </div>
                <div class="form-group col-md-4">
                    <label for="i1">Tên hàng</label>
                    <input list="browsers" name="name" class="form-control" id="i1" value="{{$product->name}}" required>
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
                    <input type="text" class="form-control" id="i2" name="type_caculating" value="{{$product->type_caculating}}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="i3">Số lượng</label>
                    <input type="number" class="form-control" id="i3" step="any" value="{{$product->total}}" name="total">
                </div>
                <div class="form-group col-md-4">
                    <label for="i4">Đơn giá</label>
                    <input type="number" class="form-control" id="i4" step="any" value="{{$product->price}}" name="price">
                </div>
                <div class="form-group col-md-4">
                    <label for="i5">Ghi chú</label>
                    <input type="text" class="form-control" id="i5" value="{{$product->note}}" name="note" >
                </div>
                <div class="form-group col-md-4" style="margin-top: 30px;">
                    <input type="submit" class="form-control btn btn-success" value="Sửa">
                </div>
            </div>
        </form>
    </div>
@endsection

