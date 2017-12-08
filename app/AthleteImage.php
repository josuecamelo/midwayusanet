<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AthleteImage extends Model {
	protected $table = 'athlete_image';
	
	protected $fillable = [
		'url',
		'order',
		'athlete_id'
	];
}