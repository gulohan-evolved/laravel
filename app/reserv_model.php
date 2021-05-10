<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reserv_model extends Model
{
    public $table="reserv";

    public $timestamps=false;

    protected $fillable =
    [
        'ticket_there', 'return_ticket', 'date_there', 'date_back', 'id_user', 'code_reserv'
    ];
}
