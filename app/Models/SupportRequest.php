<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    protected $fillable = 
    [
        'nom', 
        'email', 
        'message', 
        'statut'
    ];
}
