<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Valid;
use App\User;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $current_date = Carbon::today()->toDateString();
        $validity = Valid::where('id',1)->pluck('due')->first();

        if ($current_date >= $validity){
            //User::all()->update(array('status' => 0));
            User::where('id', '<>', 0)->update(['status' => 0]);
        }
        if(auth()->check() && (auth()->user()->status == 0)){
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error', 'Your Account is suspended, please contact Admin.');

    }
        

    return $next($request);
}
}
