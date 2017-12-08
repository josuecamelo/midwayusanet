<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	protected $fillable = [
		'name',
		'other_name',
		'address',
		'complement',
		'district',
		'city',
		'state',
		'zip',
		'region',
		'phone',
		'contact',
		'email',
		'cnpj',
		'ie',
		'latitude',
		'longitude'
	];
}
