<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductNutrient extends Model
{
    protected $table = 'product_nutrients';
    protected $fillable = [
        'product_id',
        'nutrient', 'quantity', 'vd'
    ];
}
