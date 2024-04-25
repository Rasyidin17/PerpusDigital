<?php
  
namespace App\Http\Middleware;
  
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
  
class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if(auth()->user()->type == $userType){
            return $next($request);
        }else if (auth()->user()->type == 2){
            return $next($request);
        }else if (auth()->user()->type == 1){
            return $next($request);
        }else{
            $message = "Anda Tidak Memiliki Akses";
            alert()->error('Diblokir','Anda Tidak Memiliki Akses');
            return redirect()->back();
        }
          
        // return response()->json(['You do not have permission to access for this page.']);
        /* return response()->view('errors.check-permission'); */
    }
}