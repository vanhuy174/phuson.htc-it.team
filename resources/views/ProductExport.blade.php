<table>
    <tr>
        <th colspan="3" style="text-align: center; font-weight: bold;">Trại giam Phú Sơn 4</th>
        <th colspan="4" style="text-align: center; font-weight: bold;">BẢNG KÊ NHẬP HÀNG TƯƠI SỐNG</th>
    </tr>
    <tr>
        <th colspan="3" style="text-align: center; font-weight: bold;">Đội Hậu Cần - Tài Vụ</th>
        <th colspan="4" style="text-align: center; font-weight: bold;">Tháng: {{$date}}</th>
    </tr>
    <tr>
        <th colspan="3" style="text-align: center; font-weight: bold;"></th>
        <th colspan="4" style="text-align: center; font-weight: bold;">Phân trại số: {{$area->name}}</th>
    </tr>
</table>
<table class="table">
    <tr>
        <th style="border: 2px solid #000000; width: 10px;">Ngày</th>
        <th style="border: 2px solid #000000; width: 20px;">Tên hàng hóa</th>
        <th style="border: 2px solid #000000; width: 7px;">ĐVT</th>
        <th style="border: 2px solid #000000; width: 8px;">Số lượng</th>
        <th style="border: 2px solid #000000; width: 12px;">Đơn giá</th>
        <th style="border: 2px solid #000000; width: 13px;">Thành tiền</th>
        <th style="border: 2px solid #000000; width: 10px;">Ghi chú</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td style="border: 2px solid #000000;">{{$product->created_at}}</td>
            <td style="border: 2px solid #000000;">{{$product->name}}</td>
            <td style="border: 2px solid #000000;">{{$product->type_caculating}}</td>
            <td style="border: 2px solid #000000;">{{$product->total}}</td>
            <td style="border: 2px solid #000000;">{{$product->price}}</td>
            <td style="border: 2px solid #000000;">{{$product->total_price}}</td>
            <td style="border: 2px solid #000000;">{{$product->note}}</td>
        </tr>
    @endforeach
</table>
<table>
    <tr>
        <th colspan="3" style="text-align: center; font-weight: bold;">Người nhận</th>
        <th colspan="4" style="text-align: center; font-weight: bold;">Người giao</th>
    </tr>
</table>
