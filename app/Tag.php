<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = [
        'name',
        'slug'
    ];

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(BlogPost::class,'post_tag','tag_id','blog_post_id');
    }
}
