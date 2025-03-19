<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coli;
use JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter;

class EnregistrementcolisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coli = Coli::all();

        return view('enregistrement.index', compact('coli'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enregistrement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_expediteur' => 'required',
            'nom_destinataire' => 'required',
            'adresse_destinataire' => 'required',
            'poids' => 'required',
            //'numero_colis' => 'required|string|unique:colis,numero_colis',
        ]);

        $numeroColis = 'COLIS-' . uniqid();
        
        $coli = new Coli();
        $coli->nom_expediteur = $request->nom_expediteur;
        $coli->nom_destinataire = $request->nom_destinataire;
        $coli->adresse_destinataire = $request->adresse_destinataire;
        $coli->poids = $request->poids;
        $coli->numero_colis = $numeroColis;
        $coli->statut = 'en attente';
        //$numeroColis= $request->numero_colis;
        //$coli->numero_colis = $request->numero_colis;
        $coli->save();

        return redirect('/enregistrement/index')->with('status', 'le colis à bien été enregistrer');
    }

    //la mise à jour du status
    public function updateStatut(Request $request, $id)
    {
    $request->validate([
        'statut' => 'required|in:en attente,en transit,livré',
    ]);

    $coli = Coli::find($id);
    if ($coli) {
        $coli->statut = $request->statut;
        $coli->save();
    }

    return redirect('/enregistrement/historique')->with('status', 'Statut mis à jour.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coli = Coli::find($id);

        return view('/enregistrement/show', compact('coli'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coli = Coli::findOrFail($id);
        return view('enregistrement.edit', compact('coli'));
    }


    /**
    *Méthode pour enregistrer la modification dans le contrôleur
    */
    public function updateStatus(Request $request, $id)
    {
    $coli = Coli::findOrFail($id);
    $coli->statut = $request->statut;
    $coli->save();

    return redirect('/enregistrement/historique')->with('status', 'Statut mis à jour avec succès');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $coli = Coli::find($id);
        $coli->nom_expediteur = $request->nom_expediteur;
        $coli->nom_destinataire = $request->nom_destinataire;
        $coli->adresse_destinataire = $request->adresse_destinataire;
        $coli->poids = $request->poids;
        $coli->update();

        return redirect('/enregistrement/index')->with('status', 'Le colis a bien été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coli = Coli::find($id);
        $coli->delete();

        return redirect('/enregistrement/index')->with('status', 'Le colisà bien été supprimer');
    }

    // Afficher le formulaire de suivi
public function suivi()
{
    return view('/enregistrement/suivi'); // Vue pour le formulaire de suivi
}

// Vérifier le statut d'un colis
public function checkSuivi(Request $request)
{
    $request->validate([
        'numero_colis' => 'required|string|exists:colis,numero_colis'
    ]);

    $coli = Coli::where('numero_colis', $request->numero_colis)->first();
    return view('/enregistrement/suivi-resultat', compact('coli')); // Vue pour afficher le résultat
}

// Afficher l'historique des envois
public function historique(Request $request)
{
    $query = Coli::query();

    // Appliquer le filtre par date
    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    // Appliquer le filtre par statut
    if ($request->filled('statut')) {
        $query->where('statut', $request->statut);
    }

    // Récupération des résultats paginés
    $coli = $query->paginate(10);

    return view('enregistrement.historique', compact('coli'));
}

public function dashboard()
{
    $colisEnAttente = Coli::where('statut', 'en attente')->count();
    $colisEnTransit = Coli::where('statut', 'en transit')->count();
    $colisLivres = Coli::where('statut', 'livré')->count();
    $totalColis = Coli::count();

    $recentColis = Coli::orderBy('created_at', 'desc')->take(5)->get();

    return view('admin.dashboard', 
    compact(
        'colisEnAttente', 
        'colisEnTransit', 
        'colisLivres', 
        'totalColis',
        'recentColis'
    ));
}


}
