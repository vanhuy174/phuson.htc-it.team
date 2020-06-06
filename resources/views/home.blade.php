@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <a href="{{asset("/area")}}" target="_blank">Phân trại</a>
                <a href="{{asset("/product")}}" target="_blank">Sản phẩm</a>
            </div>
        </div>
    </div>
</div>
@endsection
