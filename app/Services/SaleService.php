<?php

namespace App\Services;

use App\Sale;

class SaleService {

    public function add(
        $seller_name,
        $product_name,
        $product_price,
        $customer_name,
        $stripe_id,
        $seller_id,
        $customer_id,
        $product_id)
    {
        $sell = new Sale();
        $sell->seller_name = $seller_name;
        $sell->product_name = $product_name;
        $sell->product_price = $product_price;
        $sell->customer_name = $customer_name;

        $sell->stripe_id = $stripe_id;

        $sell->seller_id = $seller_id;
        $sell->customer_id = $customer_id;
        $sell->product_id = $product_id;

        $sell->save();
    }
}