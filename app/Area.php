<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        ];

    public function product()
    {
        return $this->hasMany('App\Product', 'type_area_id', 'id');
    }
}
