<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// Routes publiques
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes protégées par Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Exemple de route réservée à l'administrateur
    Route::get('/admin/check', function () {
        return response()->json(['message' => 'Accès administrateur validé.']);
    })->middleware('role:ADMINISTRATEUR');
});