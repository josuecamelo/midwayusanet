<?php

/**
 * Created by PhpStorm.
 * User: josuecamelo
 * Date: 26/10/17
 * Time: 09:41
 */
namespace App\Helpers;

use App\Goal;

class GoalsMenuHelper
{
    private $goalModel;

    public function __construct(Goal $goalModel)
    {
        $this->goalModel = $goalModel;
    }

    public function getMenu()
    {
        $menu = '<ul>';

        $goals = $this->goalModel
            ->orderBy('name', 'asc')
            ->get();

        foreach($goals as $goalIdx => $goal){
            $menu.= '<li><a data-goal-id="'.$goal->id.'" href="'. route('objetivo_exibicao',$goal->slug) .'">'.$goal->name.'</a>';
        }

        $menu.='</ul>';

        return $menu;
    }
}