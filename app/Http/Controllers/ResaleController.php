<?php

namespace App\Http\Controllers;

use App\Resale;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class ResaleController extends Controller
{
    private $resaleModel;

    public function __construct(Resale $resale)
    {
        $this->resaleModel = $resale;
    }

	public function index()
	{
		return view('site.resale');
	}

    public function store(Request $request)
    {
        $inputs = $request->all();

        $resale = $this->resaleModel->create($inputs);

        if ($resale->id != null)
        {
            $resale->save();
            Flash::success('Obrigado por se inscrever!');
        }
        else
        {
            Flash::error('Não foi possível fazer a inscrição. Tente novamente.');
        }
        return Redirect::back();
    }
}
