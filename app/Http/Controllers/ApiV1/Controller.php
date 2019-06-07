<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public function success($data = []){
		return response()->json(['result'=> 'success'] + $data);
	}
	
	public function error($data = []){
		return response()->json(['result'=> 'error'] + $data, 422);
	}
}
