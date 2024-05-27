<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alerte;
use Illuminate\Support\Facades\Auth;

class AlerteController extends Controller
{
    public function alerte()
    {
        return view('PagesUser.Alerte');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'message' => 'required|string',
        ]);

        Alerte::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Alerte envoyée avec succès.');
    }


    public function indexAdmin()
    {
        $alertes = Alerte::where('created_at', '>=', now()->subHours(48))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Pages.AdminAlerte', compact('alertes'));
    }

    public function accepter(Alerte $alerte)
    {
        $alerte->update(['status' => 'acceptée']);
        return redirect()->route('alertes_admin')->with('success', 'Alerte acceptée.');
    }

    public function refuser(Alerte $alerte)
    {
        $alerte->update(['status' => 'refusée']);
        return redirect()->route('alertes_admin')->with('success', 'Alerte refusée.');
    }
    public function destroy(Alerte $alerte)
    {
        $alerte->delete();
        return redirect()->route('alertes_admin')->with('success', 'Alerte supprimée.');
    }

    public function listalert(Alerte $alerte)
    {
        $alertes = Alerte::where('created_at', '>=', now()->subHours(48))
            ->orderBy('created_at', 'desc')
            ->get();
        return view('PagesUser.AlerteList', compact('alertes'));
    }

}

