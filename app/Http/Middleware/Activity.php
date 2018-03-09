<?php

namespace  App\Http\Middleware;

class Activity{

    public function handle($request,\Closure $next){
        if(time() < strtotime('2007-6-5')){
            return nedirect('activity0');
        }

        return $next($request);
    }
}