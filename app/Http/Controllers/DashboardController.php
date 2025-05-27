<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $users = null;
        $proizvodi = null;
        $chartData = [];

        if ($user->role_id === 1) {
            $users = User::all();
            $proizvodi = Proizvod::all();

            // Dohvata broj proizvoda po mesecu
            $brojevi = Proizvod::select(
                    DB::raw('MONTH(created_at) as mesec'),
                    DB::raw('COUNT(*) as broj')
                )
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('broj', 'mesec') // [mesec => broj]
                ->toArray();

            // Popuni sve mesece od 1 do 12
            for ($i = 1; $i <= 12; $i++) {
                $chartData[] = [
                    'mesec' => date("F", mktime(0, 0, 0, $i, 1)),
                    'broj' => $brojevi[$i] ?? 0
                ];
            }
        }

        if ($user->role_id === 2) {
            $proizvodi = Proizvod::all();
        }

        return view('dashboard', compact('users', 'proizvodi', 'chartData'));
    }
}
