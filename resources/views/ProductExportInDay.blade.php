<table>
    <tr>
        <th colspan="3" style="text-align: center; font-weight: bold; font-size: 11px;">Trại giam Phú Sơn 4</th>
        <th colspan="4" style="text-align: center; font-weight: bold; font-size: 9px;">BẢNG KÊ NHẬP HÀNG TƯƠI SỐNG</th>
    </tr>
    <tr>
        <th colspan="3" style="text-align: center; font-weight: bold; font-size: 9px;">Đội Hậu Cần - Tài Vụ</th>
        <th colspan="4" style="text-align: center; font-weight: bold; font-size: 9px;">Ngày: {{$date}}</th>
    </tr>
</table>
<table class="table">
    <tr>
        <th style="border: 2px solid #000000; width: 9px; font-size: 9px;">Ngày</th>
        <th style="border: 2px solid #000000; width: 20px; font-size: 9px;">Tên hàng hóa</th>
        <th style="border: 2px solid #000000; width: 5px; font-size: 9px;">ĐVT</th>
        <th style="border: 2px solid #000000; width: 7px; font-size: 9px;">Số lượng</th>
        <th style="border: 2px solid #000000; width: 11px; font-size: 9px;">Đơn giá</th>
        <th style="border: 2px solid #000000; width: 13px; font-size: 9px;">Thành tiền</th>
        <th style="border: 2px solid #000000; width: 10px; font-size: 9px;">Ghi chú</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td style="border: 2px solid #000000; font-size: 9px;">{{$product->created_at->format('d/m/yy')}}</td>
            <td style="border: 2px solid #000000; font-size: 9px;">{{$product->name}}</td>
            <td style="border: 2px solid #000000; font-size: 9px;">{{$product->type_caculating}}</td>
            <td style="border: 2px solid #000000; font-size: 9px;">{{$product->total}}</td>
            <td style="border: 2px solid #000000; font-size: 9px;">{{$product->price}}</td>
            <td style="border: 2px solid #000000; font-size: 9px;">{{$product->total_price}}</td>
            <td style="border: 2px solid #000000; font-size: 9px;">{{$product->note}}</td>
        </tr>
    @endforeach
</table>
<table>
    <tr>
        <th colspan="3" style="text-align: center; font-weight: bold; font-size: 9px;">Người nhận</th>
        <th colspan="4" style="text-align: center; font-weight: bold; font-size: 9px;">Người giao</th>
    </tr>
</table>
