<div class="row" style="text-align: center">
    <div class="col-md-6">
        <b>Trại giam Phú Sơn 4</b>
        <b>Đội Hậu cần - Tài vụ</b>
    </div>
    <div class="col-md-6">
        <b>BẢNG KÊ NHẬP HÀNG TƯƠI SỐNG</b>
        <b>Tháng: {{$date}}</b>
        <b>Phân trại số: {{$area->name}}</b>
    </div>
    <div class="col-md-12">
        <table>
            <tr>
                <th>Ngày</th>
                <th>Tên hàng hóa</th>
                <th>ĐVT</th>
                <th>Số lượng</th>
                <th>Ghi chú</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{$product->date_create}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->type_caculating}}</td>
                <td>{{$product->total}}</td>
                <td>{{$product->note}}</td>
            </tr>
            @endforeach
        </table>
        <div class="p-5 row">
            <div class="col-md-6">
                <b>Người nhận</b>
            </div>
            <div class="col-md-6">
                <b>Người giao</b>
            </div>
        </div>
    </div>
</div>
