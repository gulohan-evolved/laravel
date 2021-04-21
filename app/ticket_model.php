<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket_model extends Model
{
    public $table="tickets";

    public $timestamps=false;

    protected $fillable =
    [
        'kuda', 'otkuda', 'price'
    ];
}
