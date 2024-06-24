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

   public function getAnimauxAjoutesParType()
{
    $animaux = Pet::select('Espèce as type', DB::raw('COUNT(*) as total'))
        ->groupBy('Espèce')
        ->get();

    $labels = [];
    $totals = [];

    foreach ($animaux as $animal) {
        $labels[] = $animal->type;
        $totals[] = $animal->total;
    }

    return response()->json([
        'labels' => $labels,
        'totals' => $totals,
    ]);
}

}
