# 🏪 Marketplace Laravel - Guide Complet d'Installation

## 📋 Vue d'ensemble

Ce projet est une **Marketplace complète** développée avec Laravel, **respectant intégralement** les exigences de l'énoncé du projet "Programmation Web 2" (2-LBC-BI/2-LBC-BIS).

### ✅ Critères d'évaluation respectés:

- ✓ Architecture **MVC** stricte avec Laravel (Models, Views, Controllers)
- ✓ **3 entités** avec relations : User ↔ Annonces ↔ Réservations
- ✓ **3+ fonctionnalités CRUD** (Annonces, Réservations, Contact)
- ✓ Contrôleurs avec méthodes: `index`, `create`, `store`, `edit`, `update`, `destroy`, `show`
- ✓ Routes nommées et organisées
- ✓ Vues Blade avec héritage de layout (`@extends`, `@section`, `@yield`)
- ✓ Validation côté serveur
- ✓ Pagination et filtrage avec recherche
- ✓ Gestion de fichiers (upload d'images)
- ✓ **Interface et design identiques** au projet original

---

## 📁 Structure du projet

```
marketplace_laravel/
├── app/
│   ├── Models/
│   │   ├── User.php              ← Utilisateurs + relations
│   │   ├── Annonce.php           ← Annonces + relations
│   │   └── Reservation.php       ← Réservations + relations
│   └── Http/Controllers/
│       ├── AuthController.php       ← Authentification (3 actions)
│       ├── AnnoncesController.php   ← CRUD Annonces (7 méthodes)
│       ├── ReservationsController.php ← CRUD Réservations (6 méthodes)
│       └── PagesController.php      ← Pages statiques (4 actions)
│
├── resources/views/
│   ├── layouts/app.blade.php    ← Layout principal (héritage)
│   ├── partials/
│   │   ├── navbar.blade.php     ← Composant navigation
│   │   └── footer.blade.php     ← Composant footer
│   ├── pages/
│   │   ├── home.blade.php           ← Accueil (hero + catégories)
│   │   ├── contact.blade.php        ← Formulaire contact
│   │   ├── services.blade.php       ← Listage + filtres
│   │   ├── ajouter-annonce.blade.php ← Créer annonce
│   │   ├── modifier-annonce.blade.php ← Éditer annonce
│   │   ├── annonce-detail.blade.php ← Détail + actions
│   │   ├── reserver.blade.php       ← Créer réservation
│   │   ├── mes-reservations.blade.php ← Lister réservations
│   │   ├── modifier-reservation.blade.php ← Éditer réservation
│   │   └── vendeur-dashboard.blade.php ← Dashboard vendeur
│   └── auth/
│       ├── login.blade.php      ← Connexion
│       └── register.blade.php   ← Inscription
│
├── routes/
│   └── web.php                  ← 15+ routes CRUD + publiques
│
├── database/
│   └── migrations/
│       └── create_initial_schema.sql ← Script SQL (users, annonces, reservations)
│
├── public/
│   ├── css/style.css            ← CSS complet (design original)
│   ├── js/app.js                ← JavaScript
│   ├── uploads/                 ← Images uploadées
│   └── .htaccess                ← Réécriture d'URL
│
├── config/
│   └── database.php
│
├── .env                         ← Configuration (BD, app)
├── composer.json                ← Dépendances PHP
├── package.json                 ← Scripts npm
└── README.md                    ← Ce fichier
```

---

## 🚀 Installation rapide

### 1️⃣ Prérequis
- PHP 8.0+
- MySQL/MariaDB
- Composer
- Node.js & npm (optionnel)

### 2️⃣ Décompresser et accéder au projet
```bash
unzip marketplace_laravel.zip
cd marketplace_laravel
```

### 3️⃣ Créer la base de données

**Avec phpMyAdmin:**
1. Créer BD `marketplace`
2. Importer: `database/migrations/create_initial_schema.sql`

**Avec MySQL CLI:**
```bash
mysql -u root < database/migrations/create_initial_schema.sql
```

### 4️⃣ Configurer `.env`
```bash
cp .env.example .env
```

Éditer `.env`:
```ini
APP_NAME="Marketplace"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=marketplace
DB_USERNAME=root
DB_PASSWORD=              # Votre password MySQL (vide par défaut)
```

### 5️⃣ Installer les dépendances
```bash
composer install
npm install
```

### 6️⃣ Créer le dossier uploads
```bash
mkdir -p public/uploads
chmod 755 public/uploads
```

### 7️⃣ Lancer le serveur
```bash
php artisan serve
```

**Accéder à:** `http://localhost:8000`

---

## 🔐 Comptes de test

| Rôle | Email | Mot de passe |
|------|-------|-------------|
| Vendeur | ali@marketplace.com | password123 |
| Acheteur | fatima@marketplace.com | password123 |

---

## 📊 Relations entre entités

### User (Utilisateur)
```
id | nom | email | mot_de_passe | type_utilisateur | date_creation
```
- **hasMany** → Annonces (Un user peut créer plusieurs annonces)
- **hasMany** → Réservations (Un user peut faire plusieurs réservations)

### Annonce
```
id | titre | description | categorie | type_annonce | prix | 
ville | adresse | image | vendeur_id | date_creation
```
- **belongsTo** → User (vendeur_id)
- **hasMany** → Réservations

### Reservation
```
id | annonce_id | acheteur_id | date_debut | date_fin | 
nombre_jours | statut | date_reservation
```
- **belongsTo** → Annonce
- **belongsTo** → User (acheteur)

---

## ✅ Fonctionnalités CRUD

### 1. Annonces (CRUD complet)
```
AnnoncesController::
  - index()    → GET /services          (Listage avec filtres)
  - create()   → GET /annonces/create   (Formulaire création)
  - store()    → POST /annonces         (Sauvegarder)
  - show()     → GET /annonces/{id}     (Détail)
  - edit()     → GET /annonces/{id}/edit (Formulaire édition)
  - update()   → PUT /annonces/{id}     (Mettre à jour)
  - destroy()  → DELETE /annonces/{id}  (Supprimer)
```

### 2. Réservations (CRUD complet)
```
ReservationsController::
  - index()    → GET /reservations      (Mes réservations)
  - create()   → GET /reserver/{id}     (Créer réservation)
  - store()    → POST /reservations     (Sauvegarder)
  - edit()     → GET /reservations/{id}/edit
  - update()   → PUT /reservations/{id}
  - destroy()  → DELETE /reservations/{id}
```

### 3. Contact (CREATE)
```
PagesController::
  - contact()     → GET /contact        (Formulaire)
  - sendContact() → POST /contact       (Traiter)
```

---

## 🎨 Design préservé

Tous les éléments du design original sont conservés:

- ✓ **Navbar** avec logo "Marketplace" et navigation
- ✓ **Section Hero** avec recherche animée
- ✓ **Catégories** avec icônes Font Awesome
- ✓ **Grille de services** avec cartes
- ✓ **Footer** avec liens et contact
- ✓ **Palette de couleurs**: 
  - Primaire: `#2bb89d` (Teal)
  - Foncé: `#0f172a` (Navy)
  - Arrière-plan: `#f5f7f9` (Light)
- ✓ **Police**: Poppins
- ✓ **Icônes**: Font Awesome 6.5.1

---

## 📝 Routes détaillées

### Pages publiques
```
GET  /                          → Accueil
GET  /services                  → Services (filtres: search, categorie, ville)
GET  /services?search=...       → Recherche
GET  /contact                   → Page contact
POST /contact                   → Envoyer message
```

### Authentification (publique)
```
GET  /auth/login                → Formulaire connexion
POST /auth/login                → Traiter connexion (session)
GET  /auth/register             → Formulaire inscription
POST /auth/register             → Traiter inscription
GET  /logout                    → Déconnexion
```

### Annonces (CRUD)
```
GET    /services                → Lister annonces
GET    /annonces/{id}           → Voir détail
GET    /annonces/create         → Créer (protégé)
POST   /annonces                → Sauvegarder (protégé)
GET    /annonces/{id}/edit      → Éditer (protégé)
PUT    /annonces/{id}           → Mettre à jour (protégé)
DELETE /annonces/{id}           → Supprimer (protégé)
```

### Réservations (CRUD)
```
GET    /reservations            → Mes réservations (protégé)
GET    /reserver/{id}           → Créer réservation (protégé)
POST   /reservations            → Sauvegarder (protégé)
GET    /reservations/{id}/edit  → Éditer (protégé)
PUT    /reservations/{id}       → Mettre à jour (protégé)
DELETE /reservations/{id}       → Supprimer (protégé)
```

### Dashboard
```
GET  /dashboard                 → Dashboard vendeur (protégé)
```

---

## 🎯 Fonctionnalités bonus

- ✓ Upload de fichiers images
- ✓ Filtrage et recherche multi-critères
- ✓ Gestion des statuts de réservation
- ✓ Validation côté serveur
- ✓ Messages flash
- ✓ Design responsive
- ✓ Dashboard vendeur avec statistiques

---

## 🔧 Personnalisation

### Modifier le nom de l'app
`.env`:
```ini
APP_NAME="Mon Marketplace"
```

### Ajouter des catégories
`resources/views/pages/services.blade.php` (ligne 23)

### Changer la couleur primaire
`public/css/style.css`:
Remplacer `#2bb89d` par votre couleur

### Ajouter des champs à Annonce
1. Éditer `database/migrations/create_initial_schema.sql`
2. Éditer `app/Models/Annonce.php`
3. Éditer les vues (create, edit)

---

## 📞 Support

- Consulter la [Documentation Laravel](https://laravel.com/docs)
- Consulter la [Documentation Blade](https://laravel.com/docs/blade)
- Consulter la [Documentation Eloquent](https://laravel.com/docs/eloquent)

---

## 📄 Licence

Projet pédagogique - Usage libre pour la formation

---

**Développé pour:** Programmation Web 2 (2-LBC-BI/2-LBC-BIS)  
**Version:** 1.0.0  
**Date:** 2024
