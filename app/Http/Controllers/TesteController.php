<?php

namespace App\Http\Controllers;

use App\Category;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TesteController extends Controller
{
    public function index($cep){
        //busca local mais proximo

        $results = [];
        $finalResults = [];
        $origen = $cep;
        $destino = [];
        $cepQuery = "";

        echo 'Inicio:' . date('Y-m-d G:i:s');

        $stores = Store::all();
        foreach($stores as $storeKey => $store){
            $destino[] = $store->zip;
        }

        foreach($destino as $key => $cep){
            $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$origen.'&destinations='.$cep.'&key=AIzaSyDykKVIVyIMW_aqfZqcTUm1VNNUmJrEL7o';

            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', $url);
            $results[] = [
                $cep => json_decode($res->getBody())
            ];
        }

        foreach($results as $key => $result){
            foreach($result as $idx => $value){
                if($value->rows[0]->elements[0]->status != 'NOT_FOUND'){
                    //$finalResults[$idx]['distancia1'] = $value->rows[0]->elements[0]->distance->text;
                    if(isset($value->rows[0]->elements[0]->distance)){
                        $distancia = explode(' ', $value->rows[0]->elements[0]->distance->text);
                        $finalResults[$idx]['unidade'] = $distancia[1];
                        $finalResults[$idx]['distancia'] = number_format(str_replace(',', '',$distancia[0]), 2, '.', '');
                    }
                }
            }
        }

        $finalResults = collect($finalResults)->sortBy('distancia');
        $ceps = $finalResults->keys();

        foreach($ceps as $cepsIdx => $cep){
            if(($cepsIdx < count($ceps) - 1))
                $cepQuery.= "'". $cep . "', ";
            else
                $cepQuery.= "'". $cep . "'";
        }

        $stores = Store::whereRaw("zip in(". $cepQuery .")")
            ->orderByRaw($cepQuery)
            ->get();

        foreach($stores as $storeKey => $store){
            $stores[$storeKey]->distancia = $finalResults[$store->zip]['distancia'];
            $stores[$storeKey]->unidade = $finalResults[$store->zip]['unidade'];
        }


        $stores = $stores->sortBy('distancia');
        echo "<br>";
        echo 'Final '.date('Y-m-d G:i:s');
        dd($stores);
    }
}
