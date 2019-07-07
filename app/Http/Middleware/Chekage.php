<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class Chekage
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


$user=Auth::user();
if(!$user){
return redirect(route('login'));

}
$now=now();
$age= $now->diffInYears($user->birthday);
if($age < 20){
    return response("You are not 20");

}

return $next($request);
}
}
