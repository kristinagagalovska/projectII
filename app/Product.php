<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'price' => 'integer'
    ];

    public function project()
    {
        return $this->hasOne('App\Project');
    }

    public function sales()
    {
        return $this->belongsToMany('App\Sale');
    }

}
