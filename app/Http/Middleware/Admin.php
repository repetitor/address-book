<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()->roles->contains('id', RoleEnum::ADMIN->value)) {
            return response()->json(
                data: [
                    'message' => 'This action is unauthorized.',
                ],
                status: '403',
            );
        }

        return $next($request);
    }
}
