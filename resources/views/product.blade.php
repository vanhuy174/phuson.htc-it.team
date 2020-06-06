@extends('layouts.app')

@section('content')
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
    <form action="{{route('postProduct')}}" method="POST">
        @csrf
        <table class="table table-bordered container" id="counting_price" name="counting_price">
            <tr>
                <th>NGÀY NHẬP</th>
                <th><input type="date" name="date_create" id="date_create" value="{{now()->format('yy-m-d')}}" max="{{now()->format('yy-m-d')}}"></th>
            </tr>
            <tr>
                <th>Phân trại số</th>
                <th>
                    <div class="form-group">
                        <select class="form-control" name="type_area_id">
                            @foreach($areas as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </th>
            </tr>
            <tr>
                <th>Tên hàng</th>
                <th>Đơn vị tính</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Ghi chú</th>
                <th>Hành động</th>
            </tr>
            <tr>
                <th><input type="text" name="name" id="name" value="" required></th>
                <th><input type="text" name="type_caculating" id="type_caculating" value="" required></th>
                <th><input type="number" step="any" name="total" id="total" value="" required></th>
                <th><input type="number" step="any" name="price" id="price" value="" required></th>
                <th><input type="text" id="note" name="note" value=""></th>
                <th><button class="ml-auto" type="submit">Thêm</button></th>
            </tr>
        </table>
    </form>

@endsection

