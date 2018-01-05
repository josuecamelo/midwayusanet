<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'blog_category_id',
        'description',
        'tags',
        'image',
        'content',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }

    public function getShowImageAttribute()
    {
        return 'uploads/blog/destaque/'.$this->image;
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = strtolower(str_slug($value));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
