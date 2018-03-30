<!-- BELUM ADA APANYA --><?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class LoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        //$roles = App\Role::all('nama_role');
        // foreach($roles as $role){
        //     if($request->role()->getRoleUser()===$role){
        //         return redirec;
        //     }
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }
        return redirect('/admin');


    }
}
