<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ncc extends Model
{
    protected $table = 'ncc';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'discription',
    ];

}
