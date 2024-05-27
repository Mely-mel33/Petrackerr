<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alerte;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {
        $alertes = Alerte::where('status', 'acceptée', )
            ->where('created_at', '>=', now()->subHours(48))
            ->orderBy('created_at', 'desc')
            ->get();
            
        $user = Auth::user();

        if (Auth::check()) {
            if (Auth::user()->usertype == 'user') {
                return view('Pages.User', compact('alertes'));
            } elseif (Auth::user()->usertype == 'admin') {
                return view('Pages.Admin', compact('alertes'));
            } elseif (Auth::user()->usertype == 'veterinaire') {
                // Ajoutez une vérification pour s'assurer que l'objet veto existe
                if ($user->veto && $user->veto->approved) {
                    return redirect()->route('véto');
                } else {
                    return view('PagesVéto.create', compact('alertes'));
                }

            }
        }

        return view('Pages.home', compact('alertes'));
    }
}
