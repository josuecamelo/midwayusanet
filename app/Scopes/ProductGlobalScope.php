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

        if( ( Auth::check() && Auth::user()->is_admin == 0 )){
            static::addGlobalScope(new ProductScope());
        }
    }
}