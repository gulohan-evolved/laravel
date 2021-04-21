<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\reserv_model;
use App\User;

class reserv_controller extends Controller
{
    public function regReserv(Request $req)
    {
    	$validator = Validator::make($req->all(),[
    		'id_ticket->'=>'required',
    		'id_ticket<-'=>'required',
    		'data->'=>'required',
    		'data<-'=>'required',
    		'id_user->'=>'required',
    	]);

    	if ($validator->fails())
    		return response()->json($validator->errors());

    	$reserv->code_reserv=Str::random(5);

    	$reserv=reserv_model::create($req->all());
    	return response()->json('Вы успешно зарегестрировались');
		$reserv->save();
    }
}
