<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomPlanController extends Controller
{
	function index()
	{
		return view('site.custom-plan');
	}
}
