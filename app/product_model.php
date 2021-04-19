<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_model extends Model
{
    public $table="product_gul";

    public $timestamps=false;

    protected $fillable =
    [
        'product', 'price'
    ];
}
