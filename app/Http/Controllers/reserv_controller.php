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
    	$user = User::where("api_token", $req->header("api_token"))->first();

    	if(!$user)
    		return response()->json("Вы не авторизованы");

    	$validator = Validator::make($req->all(),[
    		'ticket_there'=>'required',
    		'date_there'=>'required',
    		'return_ticket'=>'required',
    		'date_back'=>'required',
    	]);

    	if ($validator->fails())
    		return response()->json($validator->errors());

    	$code_reserv=Str::random(5);

    	$reserving=
    	[
    		"id_user" => $user->id,
    		"code_reserv" => $code_reserv,
    		'ticket_there' => $req->ticket_there,
    	    'date_there' => $req->date_there,
    	    'return_ticket' => $req->return_ticket,
    	    'date_back' => $req->date_back,
    	];

    	reserv_model::create($reserving);
    	return response()->json(
    		[
    			"code"=>$code_reserv
    		]);
    }

   /* public function deleteReserv(Request $req)
    {
    	$user = User::where("api_token", $req->header("api_token"))->first();

    	if(!$user)
    		return response()->json("Вы не авторизованы");

    	$reserv=reserv_model::where("id", $req->id)->first();

    	if(!$reserv)
    		return response()->json("Зарезервированных мест не найдено");

    	if($user->id != $reserv->id_user)
    		return response()->json("иди отдыхай");

    	$reserv->delete();
    	return response()->json("Удалено");
    }*/
}







