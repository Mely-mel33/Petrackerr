<?php
namespace App\Http\Controllers;

use App\Models\Alerte;
use App\Models\Pet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function accueil()
    {
        return view('PagesUser.Dashboared');
    }

    public function getSignalementsParSemaine()
    {
        $signalements = Alerte::select(DB::raw('YEARWEEK(created_at) as week, COUNT(*) as total'))
            ->groupBy('week')
            ->get();

        $weeks = [];
        $totals = [];

        foreach ($signalements as $signalement) {
            $weeks[] = $signalement->week;
            $totals[] = $signalement->total;
        }

        return response()->json([
            'weeks' => $weeks,
            'totals' => $totals,
        ]);
    }

    public function getAnimauxAjoutesParMois()
{
    $animaux = Pet::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total'))
        ->groupBy('year', 'month')
        ->orderBy('year')
        ->orderBy('month')
        ->get();

    $labels = [];
    $totals = [];

    foreach ($animaux as $animal) {
        $labels[] = $animal->year . '-' . str_pad($animal->month, 2, '0', STR_PAD_LEFT);
        $totals[] = $animal->total;
    }

    return response()->json([
        'labels' => $labels,
        'totals' => $totals,
    ]);
}
}
