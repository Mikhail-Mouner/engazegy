<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBlogCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->blogs()->SubHour()->count() < 3) {
            return $next( $request );
        }

        session()->flash( 'mssg', [ 'status' => 'danger', 'data' => 'You\'re able to create only 3 blog' ] );
        return redirect()->route('my_blog');
    }

}
