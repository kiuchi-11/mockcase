<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProfileCompleted
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {

            if (!auth()->user()->profile_completed) {

                if (!$request->is('mypage/profile')) {
                    return redirect('/mypage/profile');
                }
            }
        }

        return $next($request);
    }
}