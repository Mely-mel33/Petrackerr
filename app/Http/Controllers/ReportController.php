<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class ReportController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);
    
        // Enregistrer le signalement dans la base de données
        Report::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'reason' => $request->reason,
        ]);
    
        return back()->with('success', 'Publication signalée avec succès.');
    }

    public function reportAdmin()
    {
        $reports = Report::orderBy('created_at', 'desc')->get();

        return view('Pages.AdminPost', compact('reports'));
    }

    public function delete(Report $report)
    {
        $post = $report->post;
        $report->delete();
        $post->delete();

        return back()->with('success', 'Publication et signalement supprimés avec succès.');
    }

    
}

