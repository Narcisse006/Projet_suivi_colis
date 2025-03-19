<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\SupportRequest;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    // Afficher le formulaire de contact
    public function create()
    {
        return view('/support/create');
    }

    // Enregistrer une demande
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        SupportRequest::create($request->all());

        return redirect()->back()->with('success', 'Votre demande a été envoyée.');
    }

    // Afficher les demandes dans l'admin
    public function index()
    {
        $demandes = SupportRequest::orderBy('created_at', 'desc')->paginate(10);
        return view('/support/index', compact('demandes'));
    }

    // Mettre à jour le statut
    public function update(Request $request, $id)
    {
        $demande = SupportRequest::findOrFail($id);
        $demande->update(['statut' => $request->statut]);

        return redirect()->back()->with('success', 'Statut mise à jour.');
    }
}

