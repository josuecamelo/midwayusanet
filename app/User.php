<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


    public function hasPermission(Permission $permission)
    {
        return $this->permissions()->where('route_name', $permission->route_name)->count();
    }

    public function hasAccess($route_name){
        return $this->permissions()->where('route_name', $route_name)->count();
    }
}
