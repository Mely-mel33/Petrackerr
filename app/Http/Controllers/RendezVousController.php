<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Vetos;
use App\Models\RendezV;
use App\Models\Pet;


class RendezVousController extends Controller
{
    // Affiche le formulaire pour prendre rendez-vous pour un animal spécifique
    public function prrdv($veto_id)
    {
        $veto = Vetos::findOrFail($veto_id);
        $animaux = Pet::where('user_id', auth()->id())->get();
        return view('PagesUser.prrdv', compact('veto', 'animaux'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'veterinaire_id' => 'required|exists:veto,id',
            'pet_id' => 'required|exists:petprofile,id',
            'date' => 'required|date',
            'heure' => 'required',
        ]);

        RendezV::create([
            'user_id' => auth()->id(),
            'veterinaire_id' => $request->veterinaire_id,
            'pet_id' => $request->pet_id,
            'date' => $request->date,
            'heure' => $request->heure,
            'status' =>  'en_attente',
            'remarque' => null, // La colonne remarque sera NULL par défaut
        ]);

        return redirect()->back()->with('success', 'Demande de rendez-vous envoyée avec succès.');
    }
    public function demandes()
    {
        $demandes = RendezV::where('veterinaire_id', auth()->user()->veto->id)->where('status', 'en_attente')->get();
        return view('PagesUser.demandes', compact('demandes'));
    }

    public function accepterDemande(RendezV $demande)
    {
        $demande->status = 'acceptée';
        $demande->save();
       
        return redirect()->back()->with('success', 'Demande de rendez-vous acceptée.');
    }

    public function refuserDemande(RendezV $demande)
    {
        $demande->status = 'refusée';
        $demande->save();
        
        return redirect()->back()->with('success', 'Demande de rendez-vous refusée.');
    }
    public function ajouterRemarque(Request $request, $id)
{
    $demande = RendezV::findOrFail($id);
    $demande->remarque = $request->input('remarque');
    $demande->save();

    return redirect()->back()->with('success', 'Remarque ajoutée avec succès.');
}
public function listesrdv(){
   

    $demandes= RendezV::where('user_id', auth()->id())->get();
    return view('PagesUser.listesrdv', compact('demandes'));
}

}

