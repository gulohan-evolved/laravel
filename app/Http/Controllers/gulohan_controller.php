<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class gulohan_controller extends Controller
{
	public function getUsers()
	{
		$user=User::get();

		return response()->json($user);
	}

	public function addUser(Request $req)
	{
		$user = new User();

		$user->fool = $req->fool;
		$user->big_smoke = $req->big_smoke;

		$u = $user->save();

		if($u)	
			
		return "Всё ок!";

		return "Всё not ок!";
	}


	public function updateUser(Request $req)
	{
		$user = User::where("id", $req->id)->first();
			
		$user->fool =$req->fool;
		$user->big_smoke =$req->big_smoke;

		$user->save();

		return response()->json($user);
	}
}
