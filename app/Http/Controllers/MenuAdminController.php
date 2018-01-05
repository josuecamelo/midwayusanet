<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuAdminController extends Controller
{
	public function index()
	{
		return view('admin.menu.index');
	}
}
