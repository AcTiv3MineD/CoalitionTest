<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController {
    public function app( ) {
        return view( 'app' );
    }
}
