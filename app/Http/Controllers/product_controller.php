<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\product_model;

class product_controller extends Controller
{
	public function getProduct()
	{
		$product=product_model::get();

		return response()->json($product);
	}

	public function addProduct(Request $req)
	{
		$product = new product_model();

		$product->product = $req->product;
		$product->price = $req->price;

		$proda = $product->save();

		if($proda)	
			return "Всё ок!";

		return "Всё not ок!";
	}

	public function deleteProduct(Request $req)
	{
		$proda=product_model::where("product",$req->product)->first();
		$proda->delete();
		return response()->json("Мололец");
	}
}
