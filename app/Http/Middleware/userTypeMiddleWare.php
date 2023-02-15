<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class userTypeMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->type == '1'){
                return $next($request);
            }
            elseif(Auth::user()->type == '2'){
                return redirect('/livreur')->with('status','cette page pour les livreures');
            }
            elseif(Auth::user()->type == '3'){
                return redirect('/fornisseur')->with('status','cette page pour les fornisseur');
            }
            else{
                return redirect('/client')->with('status','cette page pour les clients');
            }
        }
        else{
            return redirect('/')->with('status',"S'il vous plait inscrivez vous !");
        }
    }
}
