<?php

namespace App\Http\Controllers;

use App\Mail\CustomPlanEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class CustomPlanController extends Controller
{
	function index()
	{
		return view('site.custom-plan');
	}
	
	public function send(Request $request)
	{
		Mail::to($request->email)->send(new CustomPlanEmail($request));
		
		if (Mail::failures())
		{
			Flash::error('Não foi possível enviar a mensagem. Tente novamente.');
		}
		else
		{
			$gender = $request->gender == 'male' ? 'men' : 'women';
			Flash::success('Congratulations <b>' . $request->name . '</b>, your 30-day <b>' . $request->goal . '</b> for <b>' . $gender . '</b> plan has been sent to your email!');
		}
		
		return view('site.custom-plan');
	}
}
