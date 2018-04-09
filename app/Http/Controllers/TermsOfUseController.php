<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsOfUseController extends Controller
{
	function index()
	{
		return view('site.terms-of-use');
	}
}
