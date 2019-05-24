<?php

namespace App\Http\Middleware;

use Closure;

class Session
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id=session("user");
        //dd($id);die;
        if(empty($id)){
            return redirect("admin/login");
        }
        return $next($request);
    }
}
