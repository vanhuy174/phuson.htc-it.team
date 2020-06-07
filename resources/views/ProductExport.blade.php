<table>
    <div class="row" style="text-align: center">
        <tr class="col-md-6">
            <th>Trại giam Phú Sơn 4</th>
            <th></th>
            <th>BẢNG KÊ NHẬP HÀNG TƯƠI SỐNG</th>
        </tr>
        <tr class="col-md-6">
            <th>Đội Hậu Cần - Tài Vụ</th>
            <th></th>
            <th>Tháng: {{$date}}</th>
        </tr>
        <tr>
            <th>Phân trại số: {{$area->name}}</th>
        </tr>
        <tr></tr>
        <tr>
            <th>Ngày</th>
            <th>Tên hàng hóa</th>
            <th>ĐVT</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
            <th>Ghi chú</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product->created_at}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->type_caculating}}</td>
                <td>{{$product->total}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->total_price}}</td>
                <td>{{$product->note}}</td>
            </tr>
        @endforeach
        <tr></tr>
        <tr class="p-5 row">
            <th>Người nhận</th>
            <th></th>
            <th>Người giao</th>
        </tr>
    </div>
</table>
