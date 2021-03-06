<?php

namespace App\Exports;

use App\Area;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProductInMonth implements FromView
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
        isset($this->requestall->month) ? $date = $this->requestall->month : $date = now()->format('yy-m');
        $m= explode("/", $date)[0];
        $y= explode("/", $date)[1];
        $data = Product::whereYear('date_create', $y)->whereMonth('date_create', $m)->get();
        $ncc = Product::whereYear('date_create', $y)->whereMonth('date_create', $m)->get()->groupBy('supplier');
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
        return view('ProductExportInMonth', compact( 'date', 'products', 'ncc'));
    }
}
