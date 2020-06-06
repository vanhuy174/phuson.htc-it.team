<?php

namespace App\Http\Controllers;

use App\Area;
use App\Product;
use Illuminate\Http\Request;

use App\Exports\ExportProduct;
use Maatwebsite\Excel\Facades\Excel;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();

        return view('area', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Vui lòng nhập tên trại',
            'name.unique' => 'Tên trại đã tồn tại! Vui lòng nhập lại!',
        ];

        $validatedData = $request->validate([
            'name' => 'required|unique:areas',
        ],$messages);

        $type_area = new Area();
        $type_area->name = $request->name;
        $type_area->save();
        return redirect('/area')->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $date = now()->format('yy-m-d');
        if (isset($request->date)){
            $date = $request->date;
        }
        $area = Area::where('id', $id)->first();
        $products = Product::where('type_area_id', $id)->where('date_create', $date)->get();
        $total_price_all = Product::where('type_area_id', $id)->where('date_create', $date)->sum('total_price');
        return view('total', compact('area', 'id', 'date', 'products', 'total_price_all'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return redirect('/area');
    }

    /**
     * Hàm export dùng để xuất ra danh sách tất cả các sinh viên có trong CSDL ra file excel có tên: Danh-sach-sinh-vien.xlsx .
     */

    public function export(Request $request)
    {
        return Excel::download(new ExportProduct($request), 'Bang-ke-nhap-hang-phan-trai-'.$request->name_area_ex.'-ngay-'.$request->date_ex.'.xlsx');
        return back();
    }
}
