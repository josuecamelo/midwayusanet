<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /*
     * Define quantidade de items que serão exibidos por row boostrap
     * */
    public function showItemsByRow($list, $qtyByRow = 4){
        $cont = 1;
        $grupo = 0;
        $items = [];

        foreach($list as $key => $item):
            if($cont <= $qtyByRow) {
                $items[$grupo][$cont - 1] = $item;
                if($cont == $qtyByRow){
                    $cont = 0;
                    $grupo++;
                }
            }else{
                $cont = 0;
                $grupo++;
            }

            $cont++;
        endforeach;

        return $items;
    }
}
