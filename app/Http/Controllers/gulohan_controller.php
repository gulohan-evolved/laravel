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

	public function registerUser(Request $req)
	{
		$user=new User();

		$user->fool=$req->fool;
		$user->big_smoke=$req->big_smoke;

		$validation = $req->validate([
			'fool'=>'required|min:5|max:25',
			'big_smoke'=>'required|min:5|max:30',
		]);

		$u=$user->save();
		if($u) {return "Успешно";}
		else {return "Не, откат";}
	}

	public function autoUser(Request $req)
	{
		$user = User::where("fool", $req->fool)->first();
		$user2 = User::where("big_smoke", $req->big_smoke)->first();

		$user->fool=$req->fool;
		$user2->big_smoke=$req->big_smoke;

		/*$validation = $req->validate([
			'fool'=>'required|min:5|max:25',
			'big_smoke'=>'required|min:5|max:30',
		]);*/

		$u=$user->save();
		$u2=$user2->save();
		if($u && $u2) {return "Вход";}
		else {return "Не, отдыхай";}
	}

}
