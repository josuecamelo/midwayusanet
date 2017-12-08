<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    //protected $dates = ['deleted_at'];
    protected $table = 'product_category';
    protected $fillable = [
        'product_id',
        'category_id'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
