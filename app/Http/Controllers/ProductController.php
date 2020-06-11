<?php

namespace App\Http\Controllers;

use App\Area;
use App\Ncc;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
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
    public function index( Request $request)
    {
        $areas = Area::all();
        return view('product', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'type_area_id.required' => 'Không được để trống Phân trại số',
            'supplier.required' => 'Không được để trống nhà cung cấp',
            'date_create.required' => 'Không được để trống NGÀY NHẬP',
            'name.required' => 'Không được để trống Tên hàng',
            'type_ca culating.required' => 'Không được để trống Đơn vị tính',
        ];

        $validatedData = $request->validate([
            'date_create' => 'required',
            'type_area_id' => 'required',
            'supplier' => 'required',
            'name' => 'required',
            'type_caculating' => 'required',
            'total' => 'required',
        ],$messages);

        $product = new Product();
        $product->date_create = $request->date_create;
        $product->type_area_id = $request->type_area_id;
        $product->supplier = $request->supplier;
        $product->name = $request->name;
        $product->type_caculating = $request->type_caculating;
        $product->total = $request->total;
        $product->note = $request->note;
        if ($product->price == null){
            $product->price = null;
            $product->total_price = null;
        }else{
            $product->price = $request->price;
            $product->total_price = $product->total*$product->price;
        }
        
        if($product->save()){
            return back()->with('message', 'Thêm thành công');
        }

        return back()->with('message', $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_area, $id_product)
    {
        $product = Product::where('id', $id_product)->first();
        $ncc = Ncc::all();
        return view('edit-product', compact('product', 'id_area', 'ncc'));
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
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->supplier = $request->supplier;
        $product->type_caculating = $request->type_caculating;
        $product->total = $request->total;
        if ($request->price == null){
            $product->price = null;
            $product->total_price = null;
        }else{
            $product->price = $request->price;
            $product->total_price = $product->total*$product->price;
        }
        $product->save();
        return redirect('area/show_area/'.$request->id_area.'?date='.$product->date_create);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();

        return back()->with('message', 'Xóa thành công');
    }
}
