<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Laracasts\Flash\Flash;

class AreaRestritaMiddleware
{
    protected $auth;
    //private $public_pages = ['dashboard'];

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if (!$this->auth->guest())
        {
            $chk1 = $request->user()->hasAccess($request->route()->getName());
            $chk2 = !$request->is('admin/*');
            $chk3 = ($request->user()->is_admin == '1') ? true : false;

            if ($chk1 || $chk2 || $chk3) {
                return $next($request);
            }else{
                return response(view('errors.405')->with('message', $request->path()));
            }
        }

        return redirect()->guest('login');
    }
}
