<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model {
	
	protected $fillable = [
		'name',
		'last_name',
		'profession',
		'about',
		'bio',
		'age',
		'weight',
		'height',
		'photo',
		'banner',
		'thumbnail',
		'facebook',
		'twitter',
		'instagram',
		'youtube',
		'snapchat',
		'visibility',
		'slug',
	];
	
	public function athleteImage() {
		return $this->hasMany(AthleteImage::class);
	}
	
	public function athleteVideo() {
		return $this->hasMany(AthleteVideo::class);
	}
	
	public function athleteProduct() {
		return $this->hasMany(AthleteProduct::class);
	}
}
