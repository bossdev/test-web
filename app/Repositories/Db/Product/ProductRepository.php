<?php

namespace App\Repositories\Db\Product;
use App\Models\Product;
use App\Transformers\ProductTransformer;

class ProductRepository implements ProductRepositoryInterface{
    function __construct(){

    }

    function listProduct(){
        $product = Product::get();
        return  $product;
    }
}

