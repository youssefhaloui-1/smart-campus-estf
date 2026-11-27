<?php

namespace Database\Seeders;

use App\Models\Equipement;
use App\Models\Ressource;
use Illuminate\Database\Seeder;

class RessourceSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Équipements
        $projecteur = Equipement::firstOrCreate(['nom_equipement' => 'Vidéoprojecteur HD']);
        $pc = Equipement::firstOrCreate(['nom_equipement' => 'PC de bureau']);
        $sono = Equipement::firstOrCreate(['nom_equipement' => 'Système de sonorisation']);
        $tableau = Equipement::firstOrCreate(['nom_equipement' => 'Tableau blanc interactif']);
        $climatisation = Equipement::firstOrCreate(['nom_equipement' => 'Climatisation']);

        // 2. Ressources & liaison pivot (ressource_equipement)
        $grandAmphi = Ressource::updateOrCreate(
            ['nom_ressource' => 'Grand Amphithéâtre'],
            [
                'type' => 'GRAND_AMPHI',
                'capacite' => 300,
                'localisation' => 'Bâtiment Central - RDC',
                'statut_actif' => true,
            ]
        );
        $grandAmphi->equipements()->sync([
            $projecteur->id => ['quantite' => 2],
            $sono->id => ['quantite' => 1],
            $climatisation->id => ['quantite' => 2],
        ]);

        $amphiA = Ressource::updateOrCreate(
            ['nom_ressource' => 'Amphithéâtre A'],
            [
                'type' => 'AMPHI',
                'capacite' => 150,
                'localisation' => 'Bloc A - RDC',
                'statut_actif' => true,
            ]
        );
        $amphiA->equipements()->sync([
            $projecteur->id => ['quantite' => 1],
            $sono->id => ['quantite' => 1],
        ]);

        $salleInfo1 = Ressource::updateOrCreate(
            ['nom_ressource' => 'Salle Informatique 1'],
            [
                'type' => 'SALLE_INFO',
                'capacite' => 30,
                'localisation' => 'Département Génie Informatique - 1er étage',
                'statut_actif' => true,
            ]
        );
        $salleInfo1->equipements()->sync([
            $pc->id => ['quantite' => 30],
            $projecteur->id => ['quantite' => 1],
            $tableau->id => ['quantite' => 1],
        ]);

        $salleCoursB2 = Ressource::updateOrCreate(
            ['nom_ressource' => 'Salle de Cours B2'],
            [
                'type' => 'SALLE_COURS',
                'capacite' => 45,
                'localisation' => 'Bloc B - 2ème étage',
                'statut_actif' => true,
            ]
        );
        $salleCoursB2->equipements()->sync([
            $tableau->id => ['quantite' => 1],
        ]);

        $salleTravail1 = Ressource::updateOrCreate(
            ['nom_ressource' => 'Salle de Travail Collaboratif 1'],
            [
                'type' => 'SALLE_TRAVAIL',
                'capacite' => 12,
                'localisation' => 'Bibliothèque - 1er étage',
                'statut_actif' => true,
            ]
        );
        $salleTravail1->equipements()->sync([
            $tableau->id => ['quantite' => 1],
        ]);

        $kitMobile = Ressource::updateOrCreate(
            ['nom_ressource' => 'Kit Vidéoprojecteur Mobile #1'],
            [
                'type' => 'MATERIEL',
                'capacite' => 1,
                'localisation' => 'Service Logistique - Magasin',
                'statut_actif' => true,
            ]
        );
        $kitMobile->equipements()->sync([
            $projecteur->id => ['quantite' => 1],
        ]);
    }
}