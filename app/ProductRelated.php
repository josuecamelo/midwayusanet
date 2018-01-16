<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductRelated extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $table = 'product_related';
    protected $fillable = [
        'product_id',
        'product_related_id'
    ];

    public function products(){
        //return $this->belongsToMany(Product::class)->wherePivot('product_related_id', 1);
        return $this->belongsToMany(Product::class);
    }
}
