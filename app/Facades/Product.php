<?php

namespace App\Facades\Product;

use Illuminate\Support\Facades;

class ProductFacade extends Facades{
    protected static function getFacadeAccessor() {
        return 'ProductService'; 
    }
}