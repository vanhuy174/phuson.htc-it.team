<?php

if (! function_exists('group_product')) {
    function group_product($data) {
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
        return $products;
    }
}