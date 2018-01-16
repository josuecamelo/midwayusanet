<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;
use Laracasts\Flash\Flash;

class SubscribeController extends Controller
{
	private $subscribeModel;

	public function __construct(Subscribe $subscribeModel)
	{
		$this->subscribeModel = $subscribeModel;
	}

	public function index()
	{
		return view('site.subscribe');
	}

	public function store(Request $request)
	{
		$inputs = $request->all();

		$subscribe = $this->subscribeModel->create($inputs);

		if ($subscribe->id != null)
		{
			$subscribe->save();
			Flash::success('Obrigado por se inscrever!');
		}
		else
		{
			Flash::error('Não foi possível fazer a inscrição. Tente novamente.');
		}
		return redirect()->route('inscreverse');
	}
}
