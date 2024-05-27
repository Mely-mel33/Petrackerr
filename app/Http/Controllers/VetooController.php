<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Vetos;
use App\Models\RendezV;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class VetooController extends Controller
{
    public function create()
    {
        // Vérifiez si l'utilisateur a déjà un compte vétérinaire
        $veto = Auth::user()->veto;

        if ($veto) {
            if ($veto->approved) {
                return redirect()->route('véto')->with('error', 'Vous avez déjà un compte vétérinaire approuvé.');
            } else {
                return redirect()->route('veto.create')->with('error', 'Votre demande d\'inscription est en attente.');
            }
        }
    }
    // Afficher le formulaire d'inscription
    public function store(Request $request)
    {
        // Vérifiez si l'utilisateur a déjà un compte vétérinaire
        if (Auth::user()->veto) {
            return redirect()->route('veto.create')->with('error', 'Vous avez déjà soumis une demande d\'inscription.');
        }



        // Traiter les données du formulaire d'inscription

        // Valider les données
        $rules = [
            'nom' => 'required|string|min:2',
            'prenom' => 'required|string|min:2',
            'numtel' => 'required|string|max:13',
            'nom_cabinet' => 'required|string|min:3',
            'heure_travail' => 'required|string',
            'frais_consultation' => 'required|numeric',
            'localisation' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $messages = [
            'required' => 'Le champ :attribute est requis.',
            'min' => 'Le champ :attribute doit avoir au moins :min caractères.',
            'numeric' => 'Le champ :attribute doit être un nombre.',
            'image' => 'Le fichier :attribute doit être une image.',
            'mimes' => 'Le fichier :attribute doit être de type :values.',
            'max' => 'Le fichier :attribute ne doit pas dépasser :max kilo-octets.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        // Valider les données
        if ($validator->fails()) {
            return redirect()->route('veto.create')->withInput()->withErrors($validator);
        }

        // Insertion dans la BDD
        $veto = new Vetos();
        $veto->user_id = auth()->id(); 
        $veto->nom = $request->nom;
        $veto->prenom = $request->prenom;
        $veto->numtel = $request->numtel;
        $veto->nom_cabinet = $request->nom_cabinet;
        $veto->heure_travail = $request->heure_travail;
        $veto->frais_consultation = $request->frais_consultation;
        $veto->localisation = $request->localisation;
        $veto->description = $request->description;
        $veto->approved = false;
        // Gérer l'upload de l'image si présent
        if ($request->hasFile('Image')) {
            // Initialiser $veto->image comme un tableau si ce n'est pas déjà fait
            if ($request->hasFile('Image')) {
                $image = $request->file('Image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/Vetos'), $imageName);
                $veto->image = $imageName;
            }

            $veto->save();


            return back()->with('success', 'Votre demande d\'inscription est en cours de traitement.');
        }
    }


    // Modifier un profil
    public function edit($id)
    {
        $veto = Vetos::findOrFail($id);
        return view('veto.edit', [
            'veto' => $veto
        ]);
    }

    // Mettre à jour un profil
    public function update($id, Request $request)
    {
        $veto = Vetos::findOrFail($id);
        $rules = [
            'nom' => 'required|string|min:2',
            'prenom' => 'required|string|min:2',
            'numtel' => 'required|string|max:13',
            'nom_cabinet' => 'required|string|min:3',
            'heure_travail' => 'required|string',
            'frais_consultation' => 'required|numeric',
            'localisation' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ];

        $messages = [
            'required' => 'Le champ :attribute est requis.',
            'min' => 'Le champ :attribute doit avoir au moins :min caractères.',
            'image' => 'Le fichier :attribute doit être une image.',
            'max' => 'Le fichier :attribute ne doit pas dépasser :max kilo-octets.',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('veto.edit', $veto->id)->withInput()->withErrors($validator);
        }
        $veto->user_id = auth()->id(); // ou une autre valeur représentant l'ID de l'utilisateur
        $veto->nom = $request->nom;
        $veto->prenom = $request->prenom;
        $veto->numtel = $request->numtel;
        $veto->nom_cabinet = $request->nom_cabinet;
        $veto->heure_travail = $request->heure_travail;
        $veto->frais_consultation = $request->frais_consultation;
        $veto->localisation = $request->localisation;
        $veto->description = $request->description;
        $veto->approved = true;


        // Enregistrer l'image si elle est téléchargée
        if ($request->hasFile('Image')) {
            //Effacer l'ancienne image
            File::delete(public_path('uploads/Vetos/', $veto->Image));
            $image = $request->file('Image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/Vetos'), $imageName);
            $veto->image = $imageName;
        }

        $veto->save();

        return redirect()->route('Monprofil')->with('success', 'Vos informations ont bien été modifiée.');
    }

    public function véto()
    {
        return view('Pages.véto');

    }


    public function show($id)
    {
        $vetos = Vetos::find($id);
        return view('veto.MonProfil', ['veto' => $vetos]);

    }
    public function Monprofil()
    {
        // Récupérez l'utilisateur actuellement authentifié et son profil de vétérinaire
        $veto = Auth::user()->veto;

        // Assurez-vous que le profil de vétérinaire existe avant de le passer à la vue
        if ($veto) {
            return view('veto.MonProfil', ['veto' => $veto]);
        } else {
            // Gérez le cas où l'utilisateur n'a pas de profil de vétérinaire
            // Par exemple, redirigez vers une page d'erreur ou affichez un message
            return redirect()->route('veto.create')->with('error', 'Profil de vétérinaire non trouvé.');
        }


    }



    // Méthode pour afficher un profil veterinaire pour un utilisateur 

    public function showProfile($id)
    {
        $veto = Vetos::findOrFail($id);
        return view('PagesUser.showProfile', ['veto' => $veto]);
    }





    public function showProfil(Request $request)
    {
        $nom = $request->input('nom');
        $vetos = Vetos::where('nom', 'LIKE', "%{$nom}%")->get();
        return view('veto.resultats', compact('Vetos'));
    }
    public function check(Request $request)
    {
        $veto = Vetos::where('nom', $request->nom)
            ->where('prenom', $request->prenom)
            ->where('localisation', $request->localisation)
            ->first();

        if ($veto) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
    // Méthode pour accepter un rendez vous
    public function approve($id)
    {

        $rendezvous = RendezV::findOrFail($id);
        $rendezvous->status = true;
        $rendezvous->save();

        session()->flash('success', 'Rendez-vous approuvé avec succès.');


        return redirect()->route('RDVs');

    }

    // Méthode pour supprimer une  de vétérinaire
    public function destroy($id)
    {
        $rendezvous = RendezV::findOrFail($id);
        $rendezvous->delete();

        return redirect()->route('RDVs')->with('success', 'Rendez-vous supprimé.');

    }
    // Méthode pour Afficher les veto approuvé
    public function index()
    {
        $vetos = Vetos::where('approved', true)->get();
        return view('PagesUser.listesveto', compact('vetos'));
    }
    // Méthode pour chercher un veterinaire selon sa localisation

    public function search(Request $request)
    {
        $query = $request->input('localisation');
        $vetos = Vetos::where('localisation', 'LIKE', '%' . $query . '%')->where('approved', true)->get();

        return view('PagesUser.searchveto', compact('vetos', 'query'));
    }

    public function showPendingAppointments()
    {
        $appointments = RendezV::where('veterinaire_id', Auth::id())
            ->where('status', false)
            ->get();

        return view('veto.RDVs', compact('appointments'));
    }


    public function RDVs($id)
    {
        $appointment = RendezV::find($id);
        $appointment->status = true;
        $appointment->save();

        return back()->with('success', 'Rendez-vous approuvé.');
    }

    public function veterinaireApprove($id)
    {
        $rendezV = RendezV::find($id);
        if ($rendezV) {
            $rendezV->status = true; // Approuvé
            $rendezV->save();
            return redirect()->back()->with('success', 'Rendez-vous approuvé avec succès.');
        }
        return redirect()->back()->with('error', 'Rendez-vous non trouvé.');
    }

    public function veterinaireReject($id)
    {
        $rendezV = RendezV::find($id);
        if ($rendezV) {
            $rendezV->status = false; // Rejeté
            $rendezV->delete();
            return redirect()->back()->with('success', 'Rendez-vous rejeté avec succès.');
        }
        return redirect()->back()->with('error', 'Rendez-vous non trouvé.');
    }

}