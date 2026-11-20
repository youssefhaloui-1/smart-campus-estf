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
        Schema::create('reservations', function (Blueprint $table) {
        $table->id();
        $table->dateTime('date_debut');
        $table->dateTime('date_fin');
        $table->text('motif');
        $table->unsignedInteger('effectif_prevu')->nullable();
        $table->enum('statut', ['EN_ATTENTE', 'VALIDEE', 'REFUSEE', 'ANNULEE', 'DEPLACEE'])->default('EN_ATTENTE');
        $table->unsignedTinyInteger('niveau_priorite')->nullable();
        $table->dateTime('date_demande')->useCurrent();
        $table->dateTime('date_decision')->nullable();
        $table->text('motif_refus')->nullable();

        $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
        $table->foreignId('ressource_id')->constrained('ressources')->onDelete('restrict');
        $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('restrict');
        $table->foreignId('reservation_remplacee_id')->nullable()->unique()->constrained('reservations')->onDelete('set null');

        $table->index(['ressource_id', 'date_debut', 'date_fin']);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
