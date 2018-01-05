<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'user_id'
    ];

    public function types()
    {
        return [''=>'Selecione um Opção',1=>'News','Science'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = strtolower(str_slug($value));
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
                $model->user_id = auth()->user()->id;
        });

        static::updating(function($model)
        {
                $model->user_id = auth()->user()->id;
        });
    }
}
