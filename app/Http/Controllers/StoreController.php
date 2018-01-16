<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class StoreController extends Controller
{
	private $storeModel;
	
	public function __construct(Store $store)
	{
		$this->storeModel = $store;
	}
	
	public function json()
	{
		$stores = Store::all();
		
		return response()->json($stores);
	}
	
	public function index()
	{
		$stores = $this->storeModel->orderBy('other_name')->get();
		
		return view('site.stores.index', compact('stores'));
	}
	
	public function pesquisaJson(Request $request)
	{
		$origins = $request->origins;
		$destinations = $request->destinations;
		
		$apis = [
			'AIzaSyAAZyGvRUbt54ql9guh2x2rdrSMGw0YD74',
			'AIzaSyDpH7LYxR5Fh5s-mi7Jx7mQNlvCPUPAZ0I',
			'AIzaSyB_bQ1kdr9l6XJjQy0y2vKM1X_DwDOzxR8'
		];
		
		list($getBody, $results) = $this->getHttpClient($origins, $destinations, $apis, 0);
		
		if ($results[0]->status != 'OK')
		{
			list($getBody, $results) = $this->getHttpClient($origins, $destinations, $apis, 1);
			
			if ($results[0]->status != 'OK')
			{
				list($getBody, $results) = $this->getHttpClient($origins, $destinations, $apis, 2);
				
				if ($results[0]->status != 'OK')
				{
					return 'Erro';
				}
				else
				{
					return $getBody;
				}
			}
			else
			{
				return $getBody;
			}
		}
		else
		{
			return $getBody;
		}
	}
	
	private function getUrlGoogleMaps($origins, $destinations, $apis, $n)
	{
		return 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $origins . '&destinations=' . $destinations . '&key=' . $apis[$n];
	}
	
	private function getHttpClient($origins, $destinations, $apis, $n)
	{
		$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', $this->getUrlGoogleMaps($origins, $destinations, $apis, $n));
		$getBody = $res->getBody();
		$results[] = json_decode($getBody);
		return [$getBody, $results];
	}
	
	public function pesquisar(Request $request)
	{
		$cep = str_replace('-', '', $request->search);
		
		Flash::error('Não foi possível fazer a pesquisa. Tente novamente, por favor.');
		
		return view('site.stores.index', compact('cep'));
	}
	
	public function pesquisar2(Request $request)
	{
		$cep = str_replace('-', '', $request->search);
		
		//busca local mais proximo
		
		$results = [];
		$finalResults = [];
		$origen = $cep;
		$destino = [];
		$cepQuery = "";

//		echo 'Inicio:' . date('Y-m-d G:i:s');
		
		$stores = Store::all();
		foreach ($stores as $storeKey => $store)
		{
			$destino[] = $store->zip;
		}
		
		foreach ($destino as $key => $cep)
		{
			$url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $origen . '&destinations=' . $cep . '&key=AIzaSyDykKVIVyIMW_aqfZqcTUm1VNNUmJrEL7o';
			
			$client = new \GuzzleHttp\Client();
			$res = $client->request('GET', $url);
			$results[] = [
				$cep => json_decode($res->getBody())
			];
		}
		
		foreach ($results as $key => $result)
		{
			foreach ($result as $idx => $value)
			{
				if ($value->rows[0]->elements[0]->status != 'NOT_FOUND')
				{
					//$finalResults[$idx]['distancia1'] = $value->rows[0]->elements[0]->distance->text;
					if (isset($value->rows[0]->elements[0]->distance))
					{
						$distancia = explode(' ', $value->rows[0]->elements[0]->distance->text);
						$finalResults[$idx]['unidade'] = $distancia[1];
						$finalResults[$idx]['distancia'] = number_format(str_replace(',', '', $distancia[0]), 2, '.', '');
					}
				}
			}
		}
		
		$finalResults = collect($finalResults)->sortBy('distancia');
		$ceps = $finalResults->keys();
		
		foreach ($ceps as $cepsIdx => $cep)
		{
			if (($cepsIdx < count($ceps) - 1))
			{
				$cepQuery .= "'" . $cep . "', ";
			}
			else
			{
				$cepQuery .= "'" . $cep . "'";
			}
		}
		
		$stores = Store::whereRaw("zip in(" . $cepQuery . ")")
			->orderByRaw($cepQuery)
			->get();
		
		foreach ($stores as $storeKey => $store)
		{
			$stores[$storeKey]->distancia = $finalResults[$store->zip]['distancia'];
			$stores[$storeKey]->unidade = $finalResults[$store->zip]['unidade'];
		}
		
		$stores = $stores->sortBy('distancia');
//		echo "<br>";
//		echo 'Final ' . date('Y-m-d G:i:s');
//		dd($stores);
		
		return view('site.stores.index', compact('stores'));
	}
}
