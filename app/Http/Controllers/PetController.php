<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use App\Models\PetNote;


class PetController extends Controller
{
    // Afficher la page PetProfil

   // public function index()
    //{
      //  $pets = Pet::with('owner')->orderBy('created_at', 'DESC')->get();
        //return view('PagesUser.pet.listepet', [
          //  'pets' => $pets
        //]);
    //}
    public function index()
    {
        $pets = Pet::where('user_id',Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('PagesUser.pet.listepet', [
            'pets' => $pets
        ]);
    }
 
    public function planning()
    {
        $pets = Pet::orderBy('created_at', 'DESC')->get();
        return view('PagesUser.planning', ['pets' => $pets]);
    }
    // Afficher les profils créés
    public function create()
    {
        return view('PagesUser.pet.create');
    }

    // Enregistrer un animal dans la BDD
    public function store(Request $request)
    {
        // Définir les règles de validation
        $rules = [
            'Nom' => 'required|min:2',
            'Espèce' => 'required|min:3',
            'Race' => 'required|min:2',
            'Age' => 'required|numeric',
            'Sexe' => 'required|min:1',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Définir des messages de validation personnalisés
        $messages = [
            'required' => 'Le champ :attribute est requis.',
            'min' => 'Le champ :attribute doit avoir au moins :min caractères.',
            'numeric' => 'Le champ :attribute doit être un nombre.',
            'image' => 'Le fichier :attribute doit être une image.',
            'mimes' => 'Le fichier :attribute doit être de type :values.',
            'max' => 'Le fichier :attribute ne doit pas dépasser :max kilo-octets.',
        ];

        // Valider les données
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('pet.create')->withInput()->withErrors($validator);
        }

        // Insertion dans la BDD
        $pet = new Pet();
        $pet->user_id = auth()->id(); // Associer l'animal à l'utilisateur connecté
        $pet->Nom = $request->Nom;
        $pet->Espèce = $request->Espèce;
        $pet->Race = $request->Race;
        $pet->Age = $request->Age;
        $pet->Sexe = $request->Sexe;
        $pet->Description = $request->Description;

        // Enregistrer l'image si elle est téléchargée
        if ($request->hasFile('Image')) {
            $image = $request->file('Image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/Pets'), $imageName);
            $pet->Image = $imageName;
        }

        $pet->save();

        return redirect()->route('pet.index')->with('success', 'Animal ajouté avec succès');
    }

    // Modifier un profil
   // public function edit($id)
    //{
      //  $pet = Pet::findOrFail($id);
        //return view('PagesUser.pet.edit', [
          //  'pet' => $pet
        //]);
    //}
    public function edit($id)
    {
        $pet = Pet::where('user_id',Auth::id())->findOrFail($id);
        return view('PagesUser.pet.edit', [
            'pet' => $pet
        ]);
    }

    // Mettre à jour un profil
    public function update($id, Request $request)
    {
        $pet = Pet::findOrFail($id);
        $rules = [
            'Nom' => 'required|min:2',
            'Espèce' => 'required|min:3',
            'Race' => 'required|min:2',
            'Age' => 'required|numeric',
            'Sexe' => 'required|min:1',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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

        if ($validator->fails()) {
            return redirect()->route('pet.edit', $pet->id)->withInput()->withErrors($validator);
        }

        $pet->Nom = $request->Nom;
        $pet->Espèce = $request->Espèce;
        $pet->Race = $request->Race;
        $pet->Age = $request->Age;
        $pet->Sexe = $request->Sexe;
        $pet->Description = $request->Description;

        // Enregistrer l'image si elle est téléchargée
        if ($request->hasFile('Image')) {
            //Effacer l'ancienne image
            File::delete(public_path('uploads/Pets/', $pet->Image));
            $image = $request->file('Image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/Pets'), $imageName);
            $pet->Image = $imageName;
        }

        $pet->save();

        return redirect()->route('pet.index')->with('success', 'Animal modifié avec succès');
    }

    // Suppression d'un profil
    public function destroy($id)
    {

        $pet = Pet::findOrFail($id);
        //Supprimer l'image
        File::delete(public_path('uploads/Pets/', $pet->Image));

        //Supprimer l'animal de la BDD
        $pet->delete();
        return redirect()->route('pet.index')->with('success', 'Animal supprimé avec succès');

    }

    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        $notes = PetNote::where('pet_id', $id)->orderBy('date', 'desc')->get();
        return view('PagesUser.pet.show', ['pet' => $pet, 'notes' => $notes]);
    }

    // PetController.php

    public function addNoteToPet(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'pet_id' => 'required|exists:petprofile,id',
            'title' => 'required|string',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
            'description' => 'nullable|string',
        ]);

        // Créer une nouvelle note
        $note = new PetNote(); // Utilisez le modèle PetNote
        $note->pet_id = $validatedData['pet_id'];
        $note->title = $validatedData['title'];
        $note->date = $validatedData['date'];
        $note->time = $validatedData['time'];
        $note->description = $validatedData['description'];
        $note->save();

        // Retourner une réponse JSON indiquant que la note a été ajoutée
        return response()->json(['message' => 'Note ajoutée avec succès'], 200);
    }
    public function editNote($petId, $noteId)
    {
        $pet = Pet::findOrFail($petId);
        $note = PetNote::findOrFail($noteId);
        return view('PagesUser.pet.editnote', ['pet' => $pet, 'note' => $note]);
    }

    public function updateNote(Request $request, $petId, $noteId)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
            'description' => 'nullable|string',
        ]);

        $note = PetNote::findOrFail($noteId);
        $note->title = $validatedData['title'];
        $note->date = $validatedData['date'];
        $note->time = $validatedData['time'];
        $note->description = $validatedData['description'];
        $note->save();

        return redirect()->route('pet.show', ['pet' => $petId])->with('success', 'Note mise à jour avec succès');
    }

    public function destroyNote($petId, $noteId)
    {
        $note = PetNote::findOrFail($noteId);
        $note->delete();
        return redirect()->route('pet.show', ['id' => $petId])->with('success', 'Note supprimée avec succès');
    }

    public function markAsAdoptable($petId)
    {
        // Récupérer l'animal à marquer comme adoptable
        $pet = Pet::findOrFail($petId);

        // Vérifier si l'animal existe
        if (!$pet) {
            return redirect()->back()->with('error', 'Animal introuvable.');
        }

        // Marquer l'animal comme adoptable
        $pet->is_adoptable = true;
        $pet->save();

        return redirect()->route('adopt.index')->with('success', 'Animal marqué comme adoptable avec succès');
    }
    public function cancelAdoption($id)
{
    $pet = Pet::find($id);
    if ($pet) {
        $pet->is_adoptable = false; 
        $pet->save();
        return redirect()->back()->with('success', 'L\'adoption a été annulée avec succès.');
    } else {
        return redirect()->back()->with('error', 'Animal non trouvé.');
    }
}

}


