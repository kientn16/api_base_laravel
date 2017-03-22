<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class AfterMiddleware
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
      $response = $next($request);
      try {
        //retrieve all executed queries
        $queries = DB::getQueryLog();
        //code to save query logs in a file
        $logData = '';
        for ($i=0;$i<count($queries);$i++) {
          $query =  $queries[$i]['query'].'';
      
          $time = $queries[$i]['time'] . 'ms'; 
          //loop through all bindings
          for($j=0; $j<sizeof($queries[$i]['bindings']); $j++)
          {
              $queries[$i]['bindings'][$j] = $queries[$i]['bindings'][$j] == '' ? "''" : $queries[$i]['bindings'][$j];
              //replace ? with actual value
              $query = preg_replace("/\?/", $queries[$i]['bindings'][$j], $query, 1);
          }
          
          //remove all new lines
          $query = trim(preg_replace( "/\r\n|\n/", "", $query));
          $newArr = array(date('Y-m-d H:i:s'), $query, $time);
          $logData .= implode("\t",$newArr) . "\n";
        }
        
        //write if any new data
        if($logData != ''){
          //open logs file if exists or create a new one
          $logFile = fopen(storage_path('logs/query_logs/'.date('Y-m-d').'_query.log'), 'a+');
          //write log to file
          fwrite($logFile, $logData);
          fclose($logFile);
        }

      } catch(\Exception $e) {
      }
      return $response;
    }
}
