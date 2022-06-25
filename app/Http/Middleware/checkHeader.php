<?php 
namespace App\Http\Middleware;  
  
use Closure;  
use Illuminate\Contracts\Auth\Guard;  
use Response;  
  
class CheckHeader  
{  
    /** 
     * The Guard implementation. 
     * 
     * @var Guard 
     */  
  
    /** 
     * Handle an incoming request. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @param  \Closure  $next 
     * @return mixed 
     */  
    public function handle($request, Closure $next)
    {
         
        $token = $request->header('roadNstays');
        //echo $token; die;
         
        if ($token != '123456') {
             $array = array(
                'status'=>"false",
                'message'=>'Invalid Authentication Key',
             );

             echo json_encode($array);die;
             //return  die('Invalid token');
        }

        return $next($request);
    }
} 