<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AthleteProduct extends Model
{
	protected $table = 'athlete_product';
	
	protected $fillable = [
		'athlete_id',
		'product_id'
	];
}
