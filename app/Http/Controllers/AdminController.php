<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Vetos;


class AdminController extends Controller
{
    public function Admin()
    {
        return view('Pages.Admin');

    }
    public function AdminPubli()
    {
        return view('PagesAdmin.AdminPubli');
    }
    public function AdminUser()
    {
        return view('PagesAdmin.AdminUser');
    }

    public function Adminveto()
    {
        $Vetos = Vetos::where('approved', false)->orderBy('created_at', 'DESC')->get();
        return view('PagesAdmin.Adminveto.Adminveto', compact('Vetos'));
    }
 // Méthode pour approuver une inscription de vétérinaire
    public function approve($id)
    {
        $vetos = vetos::findOrFail($id);
        // Ajoutez la logique pour marquer le vétérinaire comme approuvé
        $vetos->approved = true;
        $vetos->save();

        session()->flash('success', 'Inscription approuvée avec succès.');


        return redirect()->route('Adminveto');

    }

    // Méthode pour supprimer une inscription de vétérinaire
    public function destroy($id)
    {
        $vetos = vetos::findOrFail($id);
        $vetos->delete();
        return redirect()->route('Adminveto')->with('success', 'Compte supprimé avec succès');

    }


}
