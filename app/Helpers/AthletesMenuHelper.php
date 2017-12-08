<?php

/**
 * Created by PhpStorm.
 * User: josuecamelo
 * Date: 26/10/17
 * Time: 09:41
 */
namespace App\Helpers;

use App\Athlete;

class AthletesMenuHelper
{
    private $athleteModel;

    public function __construct(Athlete $athleteModel)
    {
        $this->athleteModel = $athleteModel;
    }

    public function getMenu()
    {
        $menu = '<ul>';

        $athletes = $this->athleteModel
            ->orderBy('name', 'asc')
            ->get();

        foreach($athletes as $athleteIdx => $athlete){
            $menu.= '<li><a data-athlete-id="'.$athlete->id.'" href="'. route('atleta', ['slug'=> $athlete->slug]) .'">'.$athlete->name.'</a>';
        }

        $menu.='</ul>';

        return $menu;
    }
}