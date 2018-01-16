<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPortion extends Model
{
    protected $table = 'product_portions';
    protected $fillable = [
        'product_id',
        'nutrient',
        'value'
    ];
}
