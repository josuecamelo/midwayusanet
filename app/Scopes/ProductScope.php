<?php

/**
 * Created by PhpStorm.
 * User: josuecamelo
 * Date: 09/02/18
 * Time: 09:34
 */


namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class ProductScope implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $user = Auth::user();

        if(Auth::guest()){
            return $builder->where('visibility', 1);
        }elseif( isset($user) && $user->is_client == 1 ){
            return $builder->where('visibility', 1);
        }

        return $builder;
    }
}