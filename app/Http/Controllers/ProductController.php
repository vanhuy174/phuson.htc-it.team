<?php

namespace App\Http\Controllers;

use App\Area;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
            'date_create.required' => 'Không được để trống NGÀY NHẬP',
            'name.required' => 'Không được để trống Tên hàng',
            'type_ca culating.required' => 'Không được để trống Đơn vị tính',
            'total.required' => 'Không được để trống Số lượng',
        ];

        $validatedData = $request->validate([
            'date_create' => 'required',
            'type_area_id' => 'required',
            'name' => 'required',
            'type_caculating' => 'required',
            'total' => 'required',
            'price' => 'required',
        ],$messages);



        $product = new Product();
        $product->date_create = $request->date_create;
        $product->type_area_id = $request->type_area_id;
        $product->name = $request->name;
        $product->type_caculating = $request->type_caculating;
        $product->total = $request->total;
        $product->price = $request->price;
        $product->note = $request->note;
        $product->total_price = $product->total*$product->price;

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
    public function show($id, $id_product)
    {
        $product = Product::where('id', $id_product)->first();

        return view('edit-product', compact('product', 'id'));
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
    public function update(Request $request, $id, $id_product)
    {
        $product = Product::where('id', $id_product)->first();
        $product->name = $request->name;
        $product->type_caculating = $request->type_caculating;
        $product->total = $request->total;
        $product->price = $request->price;
        $product->note = $request->note;
        $product->total_price = $product->total*$product->price;

        $product->save();

        return redirect('area/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $id_product)
    {

    }
}
