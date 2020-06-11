<?php

namespace App\Http\Controllers;

use App\Area;
use App\Ncc;
use App\Product;
use Illuminate\Http\Request;

use App\Exports\ExportProduct;
use App\Exports\ExportProductInMonth;
use App\Exports\ExportProductInDay;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        isset($request->date) ? $date = $request->date : $date = now()->format('yy-m-d');
        $areas = Area::all();
        $ncc = Product::where('date_create', $date)->get()->groupBy('supplier');
        $data = Product::where('date_create', $date)->get();
        $products = [];
        $i = 0;
        foreach ($data as $key) {
            if ($products == null) {
                $products[$i] = $key;
                $i++;
            } else {
                $check = 0;
                for ($j = 0; $j < count($products); $j++) {
                    if ($key->name == $products[$j]['name'] && $key->type_caculating == $products[$j]['type_caculating']) {
                        $products[$j]['total'] = $products[$j]['total'] + $key->total;
                        $check = 1;
                        break;
                    }
                }
                if ($check == 0) {
                    $products[$i] = $key;
                    $i++;
                }
            }
        }

        return view('area', compact('areas', 'products', 'ncc', 'date'));
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
     * @param \Illuminate\Http\Request $request
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
        ], $messages);

        $type_area = new Area();
        $type_area->name = $request->name;
        $type_area->discription = $request->discription;
        $type_area->save();
        return redirect('/area')->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if (isset($request->date)) {
            $date = $request->date;
        }else{
            $date = now()->format('yy-m-d');
        }
        $area = Area::where('id', $id)->first();
        $products = Product::where('type_area_id', $id)->where('date_create', $date)->get();
        $total_price_all = Product::where('type_area_id', $id)->where('date_create', $date)->sum('total_price');
        $ncc= Ncc::all();
        return view('total', compact('area', 'id', 'date', 'products', 'total_price_all','ncc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        return view('edit_area', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $type_area = Area::find($request->id);
        $type_area->name = $request->name;
        $type_area->discription = $request->discription;
        $type_area->save();
        return redirect('/area')->with('message', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return redirect('/');
    }

    /**
     * Hàm export dùng để xuất ra file excle cas sp trong 1 ngay cua 1 phan trai.
     */

    public function export(Request $request)
    {
        return Excel::download(new ExportProduct($request), 'Bang-ke-nhap-hang-phan-trai-' . $request->name_area_ex . '-ngay-' . $request->date_ex . '.xlsx');

        return back();
    }

    /**
     * Hàm export dùng để xuất ra file excle cac sp trong 1 ngay cua tat ca phan trai.
     */
    public function exportday(Request $request)
    {
        return Excel::download(new ExportProductInDay($request), 'Bang-ke-nhap-hang-ngay-' . $request->date_ex . '.xlsx');

        return back();
    }

    /**
     * Hàm export dùng để xuất ra file excle cac sp trong 1 thang cua tat ca phan trai.
     */
    public function export_excel_month(Request $request)
    {
        return Excel::download(new ExportProductInMonth($request), 'Bang-ke-nhap-hang-thang.xlsx');

        return back();
    }
}
