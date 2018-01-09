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
			Flash::success('Mensagem enviada com sucesso.');
		}

		return view('site.custom-plan');
	}
}
