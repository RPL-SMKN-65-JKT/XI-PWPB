<?php

namespace App\Http\Controllers;

use App\Models\AcceptEbook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Ebook;
use App\Models\RentLogs;
use Carbon\Carbon;
use compact;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $totalBuku = Buku::count();
        $totalUsers = User::count();
        $totalPeminjaman = RentLogs::count();
        $totalPerizinan = AcceptEbook::count() + Ebook::count();

        if ($request->nama) {
            $rent = RentLogs::where('status', 'Dipinjam')->whereHas('buku')
                ->whereHas('users', function ($q) use($request) {
                    $q->where('nama', 'LIKE', '%'. $request->nama .'%');
                } )
                ->get();
        } else {
            $rent = RentLogs::where('status', 'Dipinjam')->whereHas('buku')->whereHas('users')->get();
        }

        $chartTotalData = RentLogs::where('status', '!=', 'Butuh Persetujuan')->whereBetween('tanggal_pinjam', [Carbon::now()->subDays(7), Carbon::now()])->count();
        $chartData = RentLogs::select(DB::raw('DATE(tanggal_pinjam) as tanggal_pinjam'), DB::raw('COUNT(*) as total_peminjaman'))
            ->where('status', '!=', 'Butuh Persetujuan')
            ->whereBetween('tanggal_pinjam', [Carbon::now()->subDays(7), Carbon::now()])
            ->groupBy(DB::raw('DATE(tanggal_pinjam)'))
            ->orderBy('tanggal_pinjam', 'asc')
            ->get();

        return view('pages.admin.dashboard', ['totalUsers' => $totalUsers, 'totalBuku' => $totalBuku, 'totalPeminjaman' => $totalPeminjaman, 'totalPerizinan' => $totalPerizinan, 'rent' => $rent, 'chartData' => $chartData, 'chartTotalData' => $chartTotalData]);
    }
}
