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
        Schema::create('ressources', function (Blueprint $table) {
        $table->id();
        $table->string('nom_ressource', 100);
        $table->enum('type', ['SALLE_TRAVAIL', 'SALLE_COURS', 'SALLE_INFO', 'AMPHI', 'GRAND_AMPHI', 'MATERIEL']);
        $table->unsignedInteger('capacite');
        $table->string('localisation', 100)->nullable();
        $table->boolean('statut_actif')->default(true);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};
