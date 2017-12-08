<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResaleAdminController extends Controller
{
	public function index()
	{
		$resales = $this->storeModel->orderBy('other_name', 'ASC')->paginate(15);
		
		return view('admin.resales.index', compact('resales'));
	}
}
