<?php
/**
 * Created by PhpStorm.
 * User: josuecamelo
 * Date: 24/10/17
 * Time: 15:09
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFlavor extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    //protected $dates = ['deleted_at'];
    protected $table = 'product_flavor';
    protected $fillable = [
        'product_id',
        'flavor_id'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
