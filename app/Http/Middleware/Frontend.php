<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class Frontend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(env('API_URL')!="" && env('API_URL')==url('/')){
            return redirect()->route('welcome');
        }

        // error_reporting(E_ALL ^ E_NOTICE);
        putenv("TZ=GMT");

        if(isset($_COOKIE['city'])){

        }else{
            setcookie("city",'',@time()+60*60*24*365);
        }

        #if city is not selected default will be mumbai.
        if(!isset($_COOKIE['city']['long']) && !isset($_COOKIE['city']['lat'])&& !isset($_COOKIE['city']['name']) && !isset($_COOKIE['city']['tz'])){       
            $_COOKIE['city']['long'] = 72.825833;
            $_COOKIE['city']['lat'] = 18.975;
            $_COOKIE['city']['name'] = 'Mumbai';
            $_COOKIE['city']['tz'] = getTimeZoneToNumber('Asia/Kolkata');
        }        

        return $next($request);
    }
}
