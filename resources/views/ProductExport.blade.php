<table>
    <tr>
        <th colspan="3" style="text-align: center; font-family: 'Times New Roman', Times, serif;  font-weight: bold; font-size: 14px;">Trại giam Phú Sơn 4</th>
        <th colspan="4" style="text-align: center; font-family: 'Times New Roman', Times, serif;  font-weight: bold; font-size: 14px;">BẢNG KÊ NHẬP HÀNG TƯƠI SỐNG</th>
    </tr>
    <tr>
        <th colspan="3" style="text-align: center; font-family: 'Times New Roman', Times, serif;  font-weight: bold; font-size: 14px;">Đội Hậu Cần - Tài Vụ</th>
        <th colspan="4" style="text-align: center; font-family: 'Times New Roman', Times, serif;  font-weight: bold; font-size: 14px;">Ngày: {{date('d/m/Y', strtotime($date))}}</th>
    </tr>
    <tr>
        <th colspan="3" style="text-align: center; font-family: 'Times New Roman', Times, serif;  font-weight: bold; font-size: 14px;"></th>
        <th colspan="4" style="text-align: center; font-family: 'Times New Roman', Times, serif;  font-weight: bold; font-size: 14px;">Phân trại số: {{$area->name}}</th>
    </tr>
</table>
<table class="table">
    <tr>
        <th style="text-align: center; font-family: 'Times New Roman', Times, serif; font-weight: bold; border: 2px solid #000000; width: 12px; font-size: 12px;">Ngày</th>
        <th style="text-align: center; font-family: 'Times New Roman', Times, serif; font-weight: bold; border: 2px solid #000000; width: 18px; font-size: 12px;">Tên hàng hóa</th>
        <th style="text-align: center; font-family: 'Times New Roman', Times, serif; font-weight: bold; border: 2px solid #000000; width: 8px; font-size: 12px;">ĐVT</th>
        <th style="text-align: center; font-family: 'Times New Roman', Times, serif; font-weight: bold; border: 2px solid #000000; width: 10px; font-size: 12px;">Số lượng</th>
        <th style="text-align: center; font-family: 'Times New Roman', Times, serif; font-weight: bold; border: 2px solid #000000; width: 14px; font-size: 12px;">Đơn giá</th>
        <th style="text-align: center; font-family: 'Times New Roman', Times, serif; font-weight: bold; border: 2px solid #000000; width: 18px; font-size: 12px;">Thành tiền</th>
        <th style="text-align: center; font-family: 'Times New Roman', Times, serif; font-weight: bold; border: 2px solid #000000; width: 12px; font-size: 12px;">Ghi chú</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td style="text-align: center; font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; font-size: 12px;">{{$product->created_at->format('d/m/yy')}}</td>
            <td style="text-align: center; font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; font-size: 12px;">{{$product->name}}</td>
            <td style="text-align: center; font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; font-size: 12px;">{{$product->type_caculating}}</td>
            <td style="text-align: center; font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; font-size: 12px;">{{$product->total}}</td>
            <td style="text-align: center; font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; font-size: 12px;">{{$product->price}}</td>
            <td style="text-align: center; font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; font-size: 12px;">{{$product->total_price}}</td>
            <td style="text-align: center; font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; font-size: 12px;">{{$product->note}}</td>
        </tr>
    @endforeach
</table>
<table>
    <tr>
        <th colspan="3" style="text-align: center; font-family: 'Times New Roman', Times, serif;  font-weight: bold; font-size: 14px;">Người nhận</th>
        <th colspan="4" style="text-align: center; font-family: 'Times New Roman', Times, serif;  font-weight: bold; font-size: 14px;">Người giao</th>
    </tr>
</table>
