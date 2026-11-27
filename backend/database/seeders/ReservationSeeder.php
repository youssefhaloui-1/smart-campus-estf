<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\Reservation;
use App\Models\Ressource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@estf.ac.ma')->first();
        $enseignant = User::where('email', 'l.bennis@estf.ac.ma')->first();
        $club = User::where('email', 'club.info@estf.ac.ma')->first();
        $etudiant = User::where('email', 'y.haloui@estf.ac.ma')->first();

        $salleInfo = Ressource::where('nom_ressource', 'Salle Informatique 1')->first();
        $grandAmphi = Ressource::where('nom_ressource', 'Grand Amphithéâtre')->first();
        $salleTravail = Ressource::where('nom_ressource', 'Salle de Travail Collaboratif 1')->first();

        if (!$admin || !$enseignant || !$club || !$etudiant || !$salleInfo || !$grandAmphi || !$salleTravail) {
            return;
        }

        // 1. Réservation VALIDEE (Enseignant)
        $res1 = Reservation::updateOrCreate(
            [
                'user_id' => $enseignant->id,
                'ressource_id' => $salleInfo->id,
                'motif' => 'TP Génie Logiciel - Architecture Web',
            ],
            [
                'date_debut' => Carbon::now()->addDays(2)->setTime(8, 30),
                'date_fin' => Carbon::now()->addDays(2)->setTime(12, 30),
                'effectif_prevu' => 28,
                'statut' => 'VALIDEE',
                'niveau_priorite' => 2,
                'date_demande' => Carbon::now()->subDays(2),
                'date_decision' => Carbon::now()->subDay(),
                'admin_id' => $admin->id,
            ]
        );

        Notification::firstOrCreate(
            [
                'user_id' => $enseignant->id,
                'reservation_id' => $res1->id,
                'type' => 'VALIDATION',
            ],
            [
                'message' => 'Votre réservation pour la Salle Informatique 1 a été validée.',
                'date_envoi' => Carbon::now()->subDay(),
                'est_lue' => false,
            ]
        );

        // 2. Réservation EN_ATTENTE (Responsable Club sur Grand Amphithéâtre)
        $res2 = Reservation::updateOrCreate(
            [
                'user_id' => $club->id,
                'ressource_id' => $grandAmphi->id,
                'motif' => 'Conférence Annuelle DevFest EST Fès',
            ],
            [
                'date_debut' => Carbon::now()->addDays(5)->setTime(14, 0),
                'date_fin' => Carbon::now()->addDays(5)->setTime(18, 0),
                'effectif_prevu' => 240,
                'statut' => 'EN_ATTENTE',
                'niveau_priorite' => 3,
                'date_demande' => Carbon::now()->subHours(5),
            ]
        );

        Notification::firstOrCreate(
            [
                'user_id' => $admin->id,
                'reservation_id' => $res2->id,
                'type' => 'NOUVELLE_DEMANDE',
            ],
            [
                'message' => 'Nouvelle demande de réservation pour le Grand Amphithéâtre (Club Informatique).',
                'date_envoi' => Carbon::now()->subHours(5),
                'est_lue' => false,
            ]
        );

        // 3. Réservation EN_ATTENTE (Étudiant)
        Reservation::updateOrCreate(
            [
                'user_id' => $etudiant->id,
                'ressource_id' => $salleTravail->id,
                'motif' => 'Réunion équipe PFE Smart Campus',
            ],
            [
                'date_debut' => Carbon::now()->addDays(1)->setTime(14, 30),
                'date_fin' => Carbon::now()->addDays(1)->setTime(16, 30),
                'effectif_prevu' => 6,
                'statut' => 'EN_ATTENTE',
                'niveau_priorite' => 4,
                'date_demande' => Carbon::now()->subHours(2),
            ]
        );
    }
}