<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharitiesController extends Controller
{
	function index()
	{
		return view('site.charities');
	}
}
