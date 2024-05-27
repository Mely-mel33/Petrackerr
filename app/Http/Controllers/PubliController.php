<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PubliController extends Controller
{
    public function Publi()
    {

        // Récupérez toutes les publications publiées
        $publications = Publication::where('status', 'published')->get();

        return view('livewire.publi', compact('publications'));


    }

    public function create()
    {
        return view('PagesUser.publis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        //Créez une nouvelle publication avec le contenu et l'utilisateur actuel
        $publication = new Publication();
        $publication->content = $request->content;
        $publication->user_id = auth()->id(); // Récupère l'ID de l'utilisateur actuel
        $publication->save();
        // Émettez un événement pour informer les auditeurs (clients) qu'une nouvelle publication a été créée
        broadcast(new NewPublication($publication));

        return redirect()->route('publi')->with('success', 'Publication créée avec succès');
    }








    
    public function edit()
    {
        return view('PagesUser.publis.publi');
    }
    public function update()
    {
        return view('PagesUser.publis.publi');
    }
    public function destroy()
    {
        return view('PagesUser.publis.publi');
    }
}
