<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class BeforeMiddleware
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
        // trim request params
        $data = $request->all();
        foreach($request->all() as $index => $value)
          if(is_string($value))
            $data[$index] = trim($value);
        $request->merge($data);

        // enable query log
        DB::enableQueryLog();
        return $next($request);
    }
}
