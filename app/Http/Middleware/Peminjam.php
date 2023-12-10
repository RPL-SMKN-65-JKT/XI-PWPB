<?php

namespace App\Http\Middleware;

use App\Models\BookLoan;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Peminjam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = Auth::user();
        $detailRiwayat = last($request->segments());
        $bookloan = BookLoan::where('kode_peminjaman', $detailRiwayat)->first();
        // dd($bookloan);
        if ($bookloan->user_id !== $currentUser->id) {
            return redirect('/riwayat');
        }
        return $next($request);
    }
}
