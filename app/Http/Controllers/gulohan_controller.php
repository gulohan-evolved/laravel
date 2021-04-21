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

		$user->name = $req->name;
		$user->last_name = $req->last_name;
		$user->password = $req->password;

		$u = $user->save();

		if($u)	
			return "Всё ок!";
		
		return "Всё not ок!";
	}

	public function updateUser(Request $req)
	{
		$user = User::where("id", $req->id)->first();
			
		$user->name = $req->name;
		$user->last_name = $req->last_name;
		$user->password = $req->password;

		$user->save();

		return response()->json($user);
	}

	public function registerUser(Request $req)
	{
		$validator = Validator::make($req->all(),[
			'name'=>'required|unique:gul',
			'last_name'=>'required',
			'password'=>'required',
		]);

		if ($validator->fails())
			return response()->json($validator->errors());

		$user=User::create($req->all());
		return response()->json('Вы успешно зарегестрировались');
	}

	public function signinUser(Request $req)
	{
		$validator = Validator::make($req->all(),[
			'name'=>'required|exists:gul,name',
			'last_name'=>'required|exists:gul,last_name',
			'password'=>'required|exists:gul,password',
		]);

		if ($validator->fails())
		{
			return response()->json('Что-то точно введено неверно');
			return response()->json($validator->errors());
		}

		$user=User::where("name",$req->name)->first();
		if ($req->password==$user->password)	
		$user->api_token=Str::random(15);
		$user->save();
		return response()->json('Авторизация прошла успешно');
	}

	public function logoutUser(Request $req)
	{
		$user=User::where("api_token",$req->api_token)->first();

		if ($user && $req->api_token != null)
		{
			$user->api_token=null;
			$user->save();
			return response()->json('Вы успешно разлогинились');
		}

		return "Авторизуйтесь, чтобы разлогиниться";
	}
}
