<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class ContactController extends Controller
{
	function index()
	{
		return view('site.contact');
	}
	
	public function send(Request $request)
	{
		$recipient = $this->departmentEmail($request->department);
		
		Mail::to($recipient)->send(new ContactEmail($request));
		
		if (Mail::failures())
		{
			Flash::error('The message could not be sent. Try again.');
		}
		else
		{
			Flash::success('Message sent successfully.');
		}
		
		return view('site.contact');
	}
	
	private function departmentEmail($department)
	{
		switch ($department)
		{
			case 'Commercial':
				return 'talita@midwaylabs.com.br';
				break;
			case 'Finance':
				return 'finance@midwaylabsusa.com';
				break;
			case 'Marketing':
				return 'mkt@midwaylabs.com.br';
				break;
			case 'Nutricionist':
				return 'laboratorio@midwaylabs.com.br';
				break;
			case 'SAC':
				return 'sac@midwaylabs.com.br';
				break;
			case 'Others':
				return 'info@midwaylabsusa.com';
				break;
		}
	}
}
