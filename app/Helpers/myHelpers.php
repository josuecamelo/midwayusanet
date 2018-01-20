<?php

/*if (!function_exists('getAsset'))
{
	function getAsset($type, $viewName)
	{
		$file = $type . '/' . str_replace('.', '/', $viewName) . '.' . $type;
		
		if (file_exists($file))
		{
			switch ($type)
			{
				case 'css':
					return '<link href="' . asset($file) . '" rel="stylesheet">';
				case 'js':
					return '<script src="' . asset($file) . '"></script>';
			}
		}
	}
}*/

if (!function_exists('menu_helper')) {
    function menu_helper()
    {
        $criarMenu = app(\App\Helpers\MenuHelper::class);
        return $criarMenu->getMenu();
    }
}

if (!function_exists('goal_menu_helper')) {
    function goal_menu_helper()
    {
        $criarMenu = app(\App\Helpers\GoalsMenuHelper::class);
        return $criarMenu->getMenu();
    }
}

if (!function_exists('athlete_menu_helper')) {
    function athlete_menu_helper()
    {
        $criarMenu = app(\App\Helpers\AthletesMenuHelper::class);
        return $criarMenu->getMenu();
    }
}

if (!function_exists('menu_footer_helper')) {
    function menu_footer_helper($type_id)
    {
        $criarMenu = app(\App\Helpers\SuplementosMenuFooterHelper::class);
        return $criarMenu->getMenu($type_id);
    }
}

if (!function_exists('dataMes')) {
    function dataMes($v)
    {
        return date('F d, Y',strtotime($v));
    }
}
