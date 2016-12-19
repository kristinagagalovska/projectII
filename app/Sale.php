<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model{

    protected $fillable = [
        'seller_name', 'product_name', 'product_price', 'customer_name', 'seller_id', 'customer_id', 'product_id'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }

    public function seller()
    {
        return $this->hasOne('App\User');
    }

    public function customer()
    {
        return $this->hasOne('App\User');
    }


}