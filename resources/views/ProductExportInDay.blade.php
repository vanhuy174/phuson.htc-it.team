<table>
    <tr>
        <th colspan="3" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: bold; font-size: 14px;">Trại giam Phú Sơn 4</th>
        <th colspan="4" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: bold; font-size: 14px;">BẢNG KÊ NHẬP HÀNG TƯƠI SỐNG</th>
    </tr>
    <tr>
        <th colspan="3" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: bold; font-size: 14px;">Đội Hậu Cần - Tài Vụ</th>
        <th colspan="4" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: bold; font-size: 14px;">Ngày: {{date('d/m/Y', strtotime($date))}}</th>
    </tr>
</table>
<table class="table">
    <tr>
        <th style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; width: 12px; text-align: center; font-size: 12px; font-weight: bold;">Ngày</th>
        <th style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; width: 18px; text-align: center; font-size: 12px; font-weight: bold;">Tên hàng hóa</th>
        <th style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; width: 8px; text-align: center; font-size: 12px; font-weight: bold;">ĐVT</th>
        <th style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; width: 10px; text-align: center; font-size: 12px; font-weight: bold;">Số lượng</th>
        <th style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; width: 14px; text-align: center; font-size: 12px; font-weight: bold;">Đơn giá</th>
        <th style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; width: 18px; text-align: center; font-size: 12px; font-weight: bold;">Thành tiền</th>
        <th style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; width: 12px; text-align: center; font-size: 12px; font-weight: bold;">Ghi chú</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; text-align: center; font-size: 12px;">{{$product->created_at->format('d/m/yy')}}</td>
            <td style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; text-align: center; font-size: 12px;">{{$product->name}}</td>
            <td style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; text-align: center; font-size: 12px;">{{$product->type_caculating}}</td>
            <td style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; text-align: center; font-size: 12px;">{{$product->total}}</td>
            <td style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; text-align: center; font-size: 12px;">{{$product->price}}</td>
            <td style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; text-align: center; font-size: 12px;">{{$product->total_price}}</td>
            <td style="font-family: 'Times New Roman', Times, serif; border: 2px solid #000000; text-align: center; font-size: 12px;">{{$product->note}}</td>
        </tr>
    @endforeach
</table>
<table>
    <tr>
        <th colspan="3" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: bold; font-size: 14px;">Người nhận</th>
        <th colspan="4" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: bold; font-size: 14px;">Người giao</th>
    </tr>
</table>
