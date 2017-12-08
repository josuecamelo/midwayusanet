<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AthleteVideo extends Model
{
	protected $table = 'athlete_video';

	protected $fillable = [
		'title',
		'url',
		'order',
		'athlete_id'
	];
}
