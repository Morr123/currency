<?php

namespace App\Http\Controllers\ApiV1;

use App\Models\Currency;

class CurrencyController extends Controller
{
    public function index(){
		$items = Currency::all();
		return $this->success(['data'=>$items]);
	}
	
	public function show($id){
		$item = Currency::findOrFail($id);
		return $this->success(['data'=>$item]);
	}
}
