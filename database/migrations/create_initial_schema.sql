-- Créer la base de données
CREATE DATABASE IF NOT EXISTS marketplace;
USE marketplace;

-- Table des utilisateurs
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    type_utilisateur ENUM('acheteur', 'vendeur') DEFAULT 'acheteur',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_email (email)
);

-- Table des annonces
CREATE TABLE annonces (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    categorie VARCHAR(50) NOT NULL,
    type_annonce ENUM('Vente', 'Location', 'Service') DEFAULT 'Vente',
    prix DECIMAL(10, 2) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    adresse VARCHAR(255),
    image VARCHAR(255),
    vendeur_id INT NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vendeur_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_vendeur (vendeur_id),
    INDEX idx_categorie (categorie),
    INDEX idx_ville (ville)
);

-- Table des réservations
CREATE TABLE reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    annonce_id INT NOT NULL,
    acheteur_id INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    nombre_jours INT,
    statut ENUM('en attente', 'approuvée', 'rejetée', 'annulée') DEFAULT 'en attente',
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (annonce_id) REFERENCES annonces(id) ON DELETE CASCADE,
    FOREIGN KEY (acheteur_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_annonce (annonce_id),
    INDEX idx_acheteur (acheteur_id),
    INDEX idx_statut (statut)
);

-- Insérer des données de test
INSERT INTO users (nom, email, mot_de_passe, type_utilisateur) VALUES
('Ali Dhouib', 'ali@marketplace.com', SHA2('password123', 256), 'vendeur'),
('Fatima Zahra', 'fatima@marketplace.com', SHA2('password123', 256), 'acheteur'),
('Mohamed Salah', 'salah@marketplace.com', SHA2('password123', 256), 'vendeur'),
('Leila Ben', 'leila@marketplace.com', SHA2('password123', 256), 'acheteur');

INSERT INTO annonces (titre, description, categorie, type_annonce, prix, ville, adresse, vendeur_id) VALUES
('iPhone 15 Pro', 'iPhone 15 Pro en excellent état, 256GB, couleur noir', 'Téléphones', 'Vente', 2500, 'Tunis', '45 Avenue Mohamed V', 1),
('Laptop Dell XPS', 'Ordinateur portable Dell XPS 15 très performant', 'Ordinateurs', 'Vente', 3200, 'Marsa Matruh', '12 Rue de la Paix', 1),
('Service de Design Graphique', 'Création de logos, flyers, et designs personnalisés', 'Design', 'Service', 500, 'Tunis', 'Bureau à Tunis', 3),
('Villa luxe à Sousse', 'Superbe villa avec piscine et jardin', 'Maison', 'Location', 800, 'Sousse', '100 Boulevard de la Plage', 3),
('Appareil photo Canon EOS', 'Canon EOS 5D Mark IV + objectif 24-70mm', 'Photographie', 'Vente', 4500, 'Sfax', '78 Rue Habib Bourguiba', 1);
