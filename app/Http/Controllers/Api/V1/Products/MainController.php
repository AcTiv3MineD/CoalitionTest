<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\Api\V1\Products\CreateRequest;
use App\Http\Requests\Api\V1\Products\UpdateRequest;

class MainController extends Controller {
    public function create( CreateRequest $request ) {
        $error = false;
        try {
            DB::beginTransaction();
            $product = ProductRepository::create( $request ); 
            
            if( !$product ) {
                $error = true;
            }
            DB::commit();
        }
        catch( \Exception $e ) {
            DB::rollback();
            Response::addMessage($e->getMessage(),'error');
            $error = true;
        }
        
        if( $error ) {
            Response::setError();
            Response::addMessage( 'There was an error creating the product!', 'error' );
        }
        else {
            Response::setOk();
            Response::addMessage( 'Product Created!', 'ok' );
        }

        Response::flush();
    }

    public function filter( ) {
        Response::setOk( );
        Response::addParam( 'products', ProductRepository::all());
        Response::flush();
    }

    public function update( UpdateRequest $request ) {        
        //
    }
}
