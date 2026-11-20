# Smart Campus ESTF

**Plateforme Web Collaborative de Réservation et d'Attribution de Ressources Universitaires sous Contraintes**

- **Réalisé par :** Youssef Haloui
- **Encadrante :** Mme Lamyae Bennis
- **Établissement :** École Supérieure de Technologie de Fès (EST Fès)
- **Année universitaire :** 2026 – 2027

---

## Présentation du Projet

**Smart Campus ESTF** est une application web collaborative permettant de gérer la réservation et l'attribution des ressources pédagogiques d'un établissement universitaire (salles de cours, salles informatiques, amphithéâtres, grand amphithéâtre et matériel pédagogique) tout en garantissant l'absence de conflits d'horaires et le respect des priorités institutionnelles.

### Fonctionnalités principales

- **Gestion des comptes et des rôles :** Authentification sécurisée avec contrôle d'accès selon 4 profils (`Étudiant`, `Enseignant`, `Responsable de club`, `Administrateur`).
- **Catalogue des ressources :** Consultation des salles, amphithéâtres et équipements disponibles avec leur capacité et localisation.
- **Contrôle anti-chevauchement & concurrence :** Blocage automatique des doubles réservations grâce aux transactions SQL ACID et au verrouillage pessimiste (`SELECT ... FOR UPDATE`).
- **Workflow de validation :** Suivi complet du cycle de vie des demandes (`En attente`, `Validée`, `Refusée`, `Annulée`, `Déplacée`).
- **Gestion prioritaire du Grand Amphithéâtre :** Hiérarchie stricte des priorités (événements officiels > enseignants > clubs étudiants) avec proposition automatique de créneaux de remplacement.
- **Calendrier visuel & notifications :** Planning interactif (jour, semaine, mois) et alertes automatiques par e-mail à chaque changement de statut.

---

## Stack Technique

- **Back-end :** Laravel (API REST)
- **Front-end :** React (Vite)
- **Base de données :** MySQL (moteur InnoDB)

---

## Structure du Dépôt

```text
smart-campus-estf/
├── backend/       # API Laravel, migrations BDD, règles de gestion et sécurité
├── frontend/      # Interface utilisateur React (Vite)
├── .gitignore     # Fichiers ignorés par Git (vendor, node_modules, .env)
└── README.md      # Documentation du projet
```

---

## Installation et Démarrage Rapide

### 1. Cloner le dépôt
```bash
git clone https://github.com/youssefhaloui-1/smart-campus-estf.git
cd smart-campus-estf
```

### 2. Configurer le Back-end (Laravel)
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
```
Configurez vos paramètres MySQL dans le fichier `.env` (`DB_DATABASE=smart_campus_estf`, `DB_USERNAME=root`, `DB_PASSWORD=`), puis exécutez les migrations et démarrez le serveur :
```bash
php artisan migrate
php artisan serve
```

### 3. Configurer le Front-end (React)
Dans un second terminal, depuis la racine du projet :
```bash
cd frontend
npm install
npm run dev
```