<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function User() {
        
            return view('Pages.User');
        
    }

   
    public function messagerie() {
        return view('PagesUser.Messagerie');
    }
    public function monprofil() {
        return view('PagesUser.MonProfil');
    }
    public function planning() {
        return view('PagesUser.planning');
    }
    
    
}
