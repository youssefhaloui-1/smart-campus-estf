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
        Schema::create('ressource_equipement', function (Blueprint $table) {
        $table->foreignId('ressource_id')->constrained('ressources')->onDelete('cascade');
        $table->foreignId('equipement_id')->constrained('equipements')->onDelete('cascade');
        $table->unsignedInteger('quantite');
        $table->primary(['ressource_id', 'equipement_id']);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressource_equipement');
    }
};
