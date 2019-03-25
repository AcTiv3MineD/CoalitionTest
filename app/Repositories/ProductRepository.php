<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;

final class ProductRepository {
    public static function create( object $params ) {
        $file_name = time();
        return Storage::disk('local')->put("products/{$file_name}.json", json_encode( [
            'name' => $params->name,
            'stock' => $params->stock,
            'price' => $params->price,
            'total' => $params->price * $params->stock
        ] ) );
    }

    public static function all( ) {
        $files = [];

        foreach( Storage::disk('local')->files('products') as $product_file ) {
            $file = json_decode( Storage::get($product_file) );

            $files[ ] = [
                'name' => $file->name,
                'price' => $file->price,
                'stock' => $file->stock,
                'total' => $file->total,
                'datetime' => date( 'Y-m-d H:i:s', str_replace( 'products/', '', time( $product_file ) ) ),
            ];
        }

        return array_reverse($files);
    }
}