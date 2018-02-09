<?php
/**
 * Created by PhpStorm.
 * User: josuecamelo
 * Date: 09/02/18
 * Time: 09:48
 */

namespace App\Scopes;

trait ProductGlobalScope
{
    protected static function boot(){
        parent::boot();

        static::addGlobalScope(new ProductScope());
    }
}