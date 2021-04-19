<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
		$validator = Validator::make($req->all(),[
			'fool'=>'required|unique:gul',
			'big_smoke'=>'required',
		]);

		if ($validator->fails())
			return response()->json($validator->errors());

		$user=User::create($req->all());
		return response()->json('Вы успешно зарегестрировались');


	}

	public function signinUser(Request $req)
	{
		$validator = Validator::make($req->all(),[
			'fool'=>'required|exists:gul,fool',
			'big_smoke'=>'required|exists:gul,big_smoke',
		]);

		if ($validator->fails())
		{
			return response()->json('Фул или Большой Дым введены неверно');
			return response()->json($validator->errors());
		}

		$user=User::where("fool",$req->fool)->first();
		if ($req->big_smoke==$user->big_smoke)	
		$user->api_token=Str::random(15);
		$user->save();
		return response()->json('Авторизация прошла успешно');
	}

	public function logoutUser(Request $req)
	{
		$user=User::where("api_token",$req->api_token)->first();

		if ($user && $req->api_token!=null){
					$user->api_token=null;
					$user->save();
					return response()->json('Вы успешно разлогинились');}

		return "Авторизуйтесь, чтобы разлогиниться";
	}
}
