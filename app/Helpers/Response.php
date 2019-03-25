<?php

namespace App\Helpers;

final class Response {
	
	private static $status = 'error';
	private static $messages = [ ];
	private static $metas = [ ];
	private static $response_parameters = [ ];

	public static function addParam( $key, $response ){
		self::$response_parameters[ $key ] = $response;
	}

	public static function addMessage( $message, $type ){
		array_push( self::$messages, [ 'content' => $message, 'type' => $type, 'title' => '' ] );
	}

	public static function addMeta( $key, $value ){
	   self::$metas[ $key ] = $value;
	}

	public static function clearMessages( ){
		self::$messages = [ ];
	}

	public static function setOk( ){
		self::$status = 'ok';
	}

	public static function setNormal( ){
		self::$status = 'same';
	}

	public static function setError( ){
		self::$status = 'error';
	}

	public static function get_output( ){
		return json_encode( [
			'_META' => array_merge( [
				'status' => self::$status,
				'messages' => self::$messages
			], self::$metas ),
			'_DATA' => self::$response_parameters
		] );
	}

	public static function flush( ){
		header('Content-Type: application/json');
		header_remove('Access-Control-Allow-Origin');
		header('Access-Control-Allow-Origin: *');
		die( self::get_output( ) );
	}
}
