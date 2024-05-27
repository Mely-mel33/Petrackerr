<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Vetos;
use App\Models\RendezV;
use App\Models\Pet;
use Auth;

class RendezVousController extends Controller
{
    // Affiche le formulaire pour prendre rendez-vous pour un animal spécifique
    public function showForm($petId)
    {
        // Recherche de l'animal par son ID
        $pet = Pet::findOrFail($petId);
        // Récupération de la liste des vétérinaires
        $veterinaires = Vetos::all();
        // Retourne la vue du formulaire de prise de rendez-vous avec les données nécessaires
        return view('PagesUser.Prendrdv', compact('pet', 'veterinaires'));
    }



    public function index()
    {
        $veterinaireId = Auth::id();
        $rendezVs = RendezV::with('user', 'pet')
            ->where('veterinaire_id', $veterinaireId)
            ->where('status', false)
            ->get();



        return view('veto.RDVs', compact('rendezVs'));
    }
    // Dans le contrôleur RendezVController.php
    public function create($petId)
    {
        $pet = Pet::findOrFail($petId);
        return view('Prendrdv.create', compact('pet'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
            'veterinaire_nom' => 'required|string',
            'veterinaire_location' => 'required|string',
            'animal_id' => 'required|exists:Petpros,id' // Ajout de la validation pour animal_id
        ]);
        // Vérifier si le vétérinaire et sa localisation existent
        $veterinaire = Vetos::where('nom', $request->veterinaire_nom)
            ->where('localisation', $request->veterinaire_location)
            ->first();

        if (!$veterinaire) {
            return back()->with('error', 'Le vétérinaire avec cette localisation n\'existe pas.');
        }

        // Créer le rendez-vous
        RendezV::create([
            'utilisateur_id' => Auth::id(),
            'animal_id' => $validated['animal_id'],// Ajout de la validation pour animal_id
            'veterinaire_id' => $veterinaire->id,
            'date' => $request->date,
            'heure' => $request->heure,
            'status' => false
        ]);

        return back()->with('success', 'Votre demande de rendez-vous a été envoyée.');
    }
    public function approve($id)
    {
        // Code pour approuver le rendez-vous...

        // Stocker le message d'acceptation dans la session flash
        Session::flash('success', 'Votre rendez-vous a été approuvé avec succès!');

        // Rediriger vers la page appropriée
        return redirect()->route('Prendrdv');
    }

}

