<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // التحقق مما إذا كان المستخدم مسجل الدخول ونوعه Admin
        $user = Auth::user();
        if (Auth::check() && $user->is_admin()) {
            return $next($request);
        }

        // إذا لم يكن المستخدم مسجل الدخول أو ليس من نوع Admin، يتم توجيهه إلى صفحة غير مصرح له.
        return redirect('/unauthorized');
        
        
    }

}
