<?php

namespace App\Exports;

use App\Area;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProduct implements FromView
{
    public $requestall;
    public function __construct(Request $request)
    {
        $this->requestall= $request;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $id= $this->requestall->id_area_ex;
        $date= $this->requestall->date_ex;
        $area = Area::where('id', $id)->first();
        $products = Product::where('type_area_id', $id)->where('date_create', $date)->get();
        $total_price_all = Product::where('type_area_id', $id)->where('date_create', $date)->sum('total_price');
        return view('ProductExport', compact('area','id', 'date', 'products', 'total_price_all'));
    }
}
