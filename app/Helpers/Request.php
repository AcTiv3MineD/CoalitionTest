<?php

namespace App\Http\Requests;

use App\Helpers\Response;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class Request extends FormRequest {
	public function authorize( ) {
		return true;
	}

	public function forbiddenResponse( array $errors = [ ] ) {
		Response::flush( );
	}

	public function response( array $errors = [ ] ) {
		if( count( $errors ) ) {
			foreach( $errors AS $error ) {
				Response::addMessage( $error, 'error' );
			}

			Response::flush( );
		}
	}

	public function failedValidation( Validator $validator ) {
		Response::setError( );

		foreach( $validator->errors( )->all( ) AS $error ) {
			Response::addMessage( $error, 'error' );
		}

		Response::flush( );
	}
}
