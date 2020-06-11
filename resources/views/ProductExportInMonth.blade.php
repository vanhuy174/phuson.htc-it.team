<table>
    <tr>
        <th colspan="3" style="text-align: center; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Trại giam Phú Sơn 4</th>
        <th colspan="4" style="text-align: center; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif;">BẢNG KÊ NHẬP HÀNG TƯƠI SỐNG</th>
    </tr>
    <tr>
        <th colspan="3" style="text-align: center; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Đội Hậu Cần - Tài Vụ</th>
        <th colspan="4" style="text-align: center; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Tháng: {{$date}}</th>
    </tr>
</table>
<table class="table">
    <tr>
        <th style="text-align: center; border: 2px solid #000000; font-weight: bold; width: 12px; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Ngày</th>
        <th style="text-align: center; border: 2px solid #000000; font-weight: bold; width: 18px; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Tên hàng hóa</th>
        <th style="text-align: center; border: 2px solid #000000; font-weight: bold; width: 8px; font-size: 12px; font-family: 'Times New Roman', Times, serif;">ĐVT</th>
        <th style="text-align: center; border: 2px solid #000000; font-weight: bold; width: 10px; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Số lượng</th>
        <th style="text-align: center; border: 2px solid #000000; font-weight: bold; width: 14px; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Đơn giá</th>
        <th style="text-align: center; border: 2px solid #000000; font-weight: bold; width: 18px; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Thành tiền</th>
        <th style="text-align: center; border: 2px solid #000000; font-weight: bold; width: 12px; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Ghi chú</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->created_at->format('d/m/yy')}}</td>
            <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->name}}</td>
            <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->type_caculating}}</td>
            <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->total}}</td>
            <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->price}}</td>
            <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->total_price}}</td>
            <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->note}}</td>
        </tr>
    @endforeach
</table>
<table>
    <tr>
        <th colspan="3" style="text-align: center; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Người nhận</th>
        <th colspan="4" style="text-align: center; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Người giao</th>
    </tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="7"></td>
    </tr>
</table>
<table>
    <tr>
        <th colspan="7" style="text-align: center; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif;">BẢNG THỐNG KÊ THEO NHÀ CUNG CẤP TRONG THÁNG</th>
    </tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="7"></td>
    </tr>
</table>
@foreach($ncc as $i => $value)
    <table>
        <tr>
            <th colspan="7" style="font-size:14px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Nhà cung cấp: {{$i}}</th>
        </tr>
    </table>
    <table class="table">
        <tr>
            <th style="text-align: center; border: 2px solid #000000; width: 12px; font-weight: bold; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Ngày</th>
            <th style="text-align: center; border: 2px solid #000000; width: 18px; font-weight: bold; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Tên hàng hóa</th>
            <th style="text-align: center; border: 2px solid #000000; width: 8px; font-weight: bold; font-size: 12px; font-family: 'Times New Roman', Times, serif;">ĐVT</th>
            <th style="text-align: center; border: 2px solid #000000; width: 10px; font-weight: bold; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Số lượng</th>
            <th style="text-align: center; border: 2px solid #000000; width: 14px; font-weight: bold; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Đơn giá</th>
            <th style="text-align: center; border: 2px solid #000000; width: 18px; font-weight: bold; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Thành tiền</th>
            <th style="text-align: center; border: 2px solid #000000; width: 12px; font-weight: bold; font-size: 12px; font-family: 'Times New Roman', Times, serif;">Ghi chú</th>
        </tr>
        @foreach(group_product($value) as $product)
            <tr>
                <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->created_at->format('d/m/yy')}}</td>
                <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->name}}</td>
                <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->type_caculating}}</td>
                <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->total}}</td>
                <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->price}}</td>
                <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->total_price}}</td>
                <td style="text-align: center; border: 2px solid #000000; font-size: 12px; font-family: 'Times New Roman', Times, serif;">{{$product->note}}</td>
            </tr>
        @endforeach
    </table>
@endforeach
