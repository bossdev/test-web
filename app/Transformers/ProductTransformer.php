<?php

namespace App\Transformers;

use App\Models\Product;

class ProductTransformer{
    public static function transform(Product $product){
        $data = array();
        $data['idza'] = (int) $product->id;
        return $data;
    }
}