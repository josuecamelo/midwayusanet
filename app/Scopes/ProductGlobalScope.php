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

        $guest = Auth::guest();

        if($guest){
            static::addGlobalScope(new ProductScope());
        }elseif(!$guest && Auth::user()->is_admin != 1){
            static::addGlobalScope(new ProductScope());
        }
    }
}