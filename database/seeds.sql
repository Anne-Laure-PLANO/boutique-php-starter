-- Données de test pour la boutique e-commerce

-- Insertion de produits (30 produits variés)
INSERT INTO produits (nom, description, prix, stock, categorie, image, actif) VALUES
-- Vêtements
('T-shirt Premium Blanc', 'T-shirt en coton bio, coupe moderne et confortable. Idéal pour toutes les occasions.', 29.99, 150, 'vetements', 'tshirt-blanc.jpg', 1),
('Jean Slim Noir', 'Jean slim en denim stretch, coupe ajustée. Parfait pour un look casual chic.', 59.99, 80, 'vetements', 'jean-noir.jpg', 1),
('Sweat à Capuche Gris', 'Sweat en molleton épais, capuche doublée. Chaleur et style garantis.', 49.99, 120, 'vetements', 'sweat-gris.jpg', 1),
('Robe d''été Fleurie', 'Robe légère imprimée, parfaite pour l''été. Tissu respirant et fluide.', 39.99, 65, 'vetements', 'robe-ete.jpg', 1),
('Chemise Blanche Classique', 'Chemise en coton, col boutonné. Indispensable du dressing professionnel.', 44.99, 90, 'vetements', 'chemise-blanche.jpg', 1),
('Pantalon Chino Beige', 'Chino coupe droite, tissu résistant. Élégance décontractée au quotidien.', 54.99, 75, 'vetements', 'chino-beige.jpg', 1),
('Veste en Jean Bleue', 'Veste en denim authentique, style intemporel. Doublure intérieure confortable.', 79.99, 45, 'vetements', 'veste-jean.jpg', 1),
('Pull Col Roulé Noir', 'Pull en laine mérinos, doux et chaud. Parfait pour l''hiver.', 64.99, 55, 'vetements', 'pull-noir.jpg', 1),

-- Accessoires
('Casquette Sport Noire', 'Casquette ajustable, logo brodé. Protection solaire et style urbain.', 19.99, 200, 'accessoires', 'casquette-noire.jpg', 1),
('Écharpe Laine Rouge', 'Écharpe douce en laine, longue et chaude. Accessoire hivernal essentiel.', 24.99, 85, 'accessoires', 'echarpe-rouge.jpg', 1),
('Sac à Dos Urbain Gris', 'Sac à dos avec compartiment laptop, poches multiples. Idéal ville et voyage.', 69.99, 60, 'accessoires', 'sac-dos-gris.jpg', 1),
('Ceinture Cuir Marron', 'Ceinture en cuir véritable, boucle argentée. Finition soignée.', 34.99, 110, 'accessoires', 'ceinture-cuir.jpg', 1),
('Lunettes de Soleil Noires', 'Lunettes UV400, monture légère. Protection et style garantis.', 29.99, 95, 'accessoires', 'lunettes-soleil.jpg', 1),
('Montre Classique Argent', 'Montre à quartz, bracelet métal. Élégance et précision au poignet.', 89.99, 40, 'accessoires', 'montre-argent.jpg', 1),
('Portefeuille Cuir Noir', 'Portefeuille compact, 8 emplacements cartes. Cuir de qualité supérieure.', 39.99, 130, 'accessoires', 'portefeuille-noir.jpg', 1),

-- Chaussures
('Sneakers Blanches Classic', 'Baskets en toile, semelle caoutchouc. Confort et style au quotidien.', 54.99, 100, 'chaussures', 'sneakers-blanches.jpg', 1),
('Boots Cuir Marron', 'Bottines montantes en cuir, semelle crantée. Robustesse et élégance.', 119.99, 50, 'chaussures', 'boots-marron.jpg', 1),
('Sandales d''été Beige', 'Sandales légères, bride ajustable. Confort optimal pour l''été.', 34.99, 70, 'chaussures', 'sandales-beige.jpg', 1),
('Chaussures de Sport Noires', 'Running shoes avec amorti renforcé. Performance et confort de course.', 89.99, 85, 'chaussures', 'running-noires.jpg', 1),
('Mocassins Cuir Noir', 'Mocassins élégants, cuir souple. Parfaits pour le bureau.', 74.99, 55, 'chaussures', 'mocassins-noir.jpg', 1),

-- Électronique
('Écouteurs Sans Fil Pro', 'Bluetooth 5.0, réduction bruit active. Autonomie 30h, qualité audio premium.', 149.99, 45, 'electronique', 'ecouteurs-pro.jpg', 1),
('Chargeur USB-C Rapide', 'Chargeur 65W, compatible multi-appareils. Charge rapide et sécurisée.', 24.99, 180, 'electronique', 'chargeur-usbc.jpg', 1),
('Câble Lightning 2m', 'Câble certifié MFi, renforcé. Charge et transfert de données rapides.', 14.99, 250, 'electronique', 'cable-lightning.jpg', 1),
('Power Bank 20000mAh', 'Batterie externe, 2 ports USB. Rechargez vos appareils en déplacement.', 39.99, 90, 'electronique', 'powerbank.jpg', 1),
('Support Téléphone Voiture', 'Support magnétique, fixation grille aération. Sécurité et praticité.', 19.99, 140, 'electronique', 'support-tel.jpg', 1),

-- Maison & Décoration
('Coussin Déco Bleu', 'Coussin 45x45cm, housse amovible. Confort et style pour votre canapé.', 16.99, 120, 'maison', 'coussin-bleu.jpg', 1),
('Bougie Parfumée Vanille', 'Bougie cire naturelle, 50h combustion. Parfum doux et apaisant.', 22.99, 100, 'maison', 'bougie-vanille.jpg', 1),
('Tapis Salon Gris 120x170', 'Tapis doux, poils courts. Apportez chaleur et confort à votre salon.', 89.99, 35, 'maison', 'tapis-gris.jpg', 1),
('Cadre Photo Bois 30x40', 'Cadre en bois naturel, verre acrylique. Mettez en valeur vos souvenirs.', 27.99, 75, 'maison', 'cadre-photo.jpg', 1),
('Lampe de Bureau LED', 'Lampe LED réglable, 3 modes luminosité. Économique et design moderne.', 44.99, 65, 'maison', 'lampe-bureau.jpg', 1);

-- Insertion de clients de test
INSERT INTO clients (nom, prenom, email, telephone, adresse, code_postal, ville, type_client) VALUES
('Dupont', 'Marie', 'marie.dupont@example.com', '0612345678', '12 rue de la Paix', '75001', 'Paris', 'vip'),
('Martin', 'Pierre', 'pierre.martin@example.com', '0623456789', '45 avenue des Champs', '69001', 'Lyon', 'standard'),
('Bernard', 'Sophie', 'sophie.bernard@example.com', '0634567890', '78 boulevard Victor Hugo', '33000', 'Bordeaux', 'standard'),
('Dubois', 'Jean', 'jean.dubois@example.com', '0645678901', '23 rue du Commerce', '31000', 'Toulouse', 'vip'),
('Thomas', 'Emma', 'emma.thomas@example.com', '0656789012', '89 avenue de la République', '44000', 'Nantes', 'standard');

-- Insertion de commandes de test
INSERT INTO commandes (client_id, montant_total, statut, adresse_livraison) VALUES
(1, 129.97, 'livree', '12 rue de la Paix, 75001 Paris'),
(2, 84.98, 'en_cours', '45 avenue des Champs, 69001 Lyon'),
(3, 44.99, 'en_attente', '78 boulevard Victor Hugo, 33000 Bordeaux'),
(1, 259.96, 'livree', '12 rue de la Paix, 75001 Paris'),
(4, 179.98, 'en_cours', '23 rue du Commerce, 31000 Toulouse');

-- Insertion de lignes de commande (détails des commandes)
INSERT INTO lignes_commande (commande_id, produit_id, quantite, prix_unitaire) VALUES
-- Commande 1 (Marie - 129.97€)
(1, 1, 2, 29.99),  -- 2 T-shirts
(1, 9, 1, 19.99),  -- 1 Casquette
(1, 13, 2, 24.99), -- 2 Écharpes

-- Commande 2 (Pierre - 84.98€)
(2, 2, 1, 59.99),  -- 1 Jean
(2, 23, 1, 24.99), -- 1 Chargeur

-- Commande 3 (Sophie - 44.99€)
(3, 5, 1, 44.99),  -- 1 Chemise

-- Commande 4 (Marie - 259.96€)
(4, 7, 2, 79.99),  -- 2 Vestes
(4, 17, 1, 119.99), -- 1 Boots

-- Commande 5 (Jean - 179.98€)
(5, 21, 1, 149.99), -- 1 Écouteurs
(5, 29, 1, 29.99);  -- 1 Cadre photo
