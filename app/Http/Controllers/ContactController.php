<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;

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
				return 'commercial@midwaylabsusa.com';
				break;
			case 'Finance':
				return 'finance@midwaylabsusa.com';
				break;
			case 'Marketing':
				return 'marketing@midwaylabsusa.com';
				break;
			case 'Nutricionist':
				return 'nutricionist@midwaylabsusa.com';
				break;
			case 'SAC':
				return 'sac@midwaylabsusa.com';
				break;
			case 'Others':
				return 'arte@midwaylabs.com.br';
				break;
		}
	}
}
