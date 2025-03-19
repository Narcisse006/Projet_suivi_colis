<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->string('nom_expediteur');
            $table->string('nom_destinataire');
            $table->string( 'adresse_destinataire');
            $table->string('poids');
            $table->string('numero_colis')->unique(); // Numéro de suivi unique
            $table->string('statut')->default('en attente'); // Statut du colis
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colis');
    }
};
