<?php

namespace App\Http\Requests\Api\V1\Products;

use App\Helpers\Response;
use App\Helpers\Request;

class CreateRequest extends Request {
	public function rules( ) {
		return [
			'stock' => 'required|integer|between:1,1000000',
			'name' => 'required|filled',
			'price' => 'required|numeric|min:0',
		];
	}
}
