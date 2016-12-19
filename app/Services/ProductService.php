<?php
/**
 * Created by PhpStorm.
 * User: DijanaN
 * Date: 12/14/2016
 * Time: 3:32 PM
 */

namespace App\Services;

use App\Product;
use App\User;

class ProductService {

    public function all()
    {
        $products = Product::all()->all();
        return $products;
    }

    public function add($name, $price, $description, $user_id)
    {
        $product = new Product();
        $product->name = $name;
        $product->user_id = $user_id;
        $product->price = $price;
        $product->description = $description;
        $product->save();
    }

}