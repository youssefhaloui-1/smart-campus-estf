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
        Schema::create('notifications', function (Blueprint $table) {
        $table->id();
        $table->text('message');
        $table->string('type', 30);
        $table->dateTime('date_envoi')->useCurrent();
        $table->boolean('est_lue')->default(false);

        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('reservation_id')->constrained('reservations')->onDelete('cascade');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
