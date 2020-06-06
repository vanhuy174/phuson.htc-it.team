<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date_create',
        'type_area_id',
        'name',
        'type_caculating',
        'total',
        'price',
        'total_price',
        'note',
    ];

    public function area()
    {
        return $this->belongsTo('App\Area', 'type_area_id', 'id');
    }
}
