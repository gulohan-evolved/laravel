<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reserv_model extends Model
{
    public $table="reserv";

    public $timestamps=false;

    protected $fillable =
    [
        'id_ticket->', 'id_ticket<-', 'data->', 'data<-', 'id_user'
    ];
}
