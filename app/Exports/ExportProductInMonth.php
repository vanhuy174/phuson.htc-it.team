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
    {dd(request());
        isset($request->date) ? $date = $request->date : $date = now()->format('yy-m-d');
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
        return view('ProductExportInMonth', compact( 'date', 'products'));
    }
}
