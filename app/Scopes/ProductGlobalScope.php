<?php
/**
 * Created by PhpStorm.
 * User: josuecamelo
 * Date: 09/02/18
 * Time: 09:48
 */

namespace App\Scopes;

use Illuminate\Support\Facades\Auth;

trait ProductGlobalScope
{
    protected static function boot(){
        parent::boot();

        if(Auth::guest()){
            //static::addGlobalScope(new ProductScope());
        }elseif(Auth::check()){
            //static::addGlobalScope(new ProductScope());
        }
    }
}