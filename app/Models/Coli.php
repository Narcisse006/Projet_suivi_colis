<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coli extends Model
{
    protected $fillable = [
        'nom_expediteur',
        'nom_destinataire', 
        'adresse_destinataire', 
        'poids',
        'numero_colis',
        'statut',
    ];
}
