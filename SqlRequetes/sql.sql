/* table users */
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role enum('acheteur','organisateur','admin') NOT NULL,
    image varchar(200) NOT NULL
);

/*table matchs*/
CREATE TABLE matchs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nomequipe1 VARCHAR(100) NOT NULL,
    logoEquipe1 VARCHAR(100) NOT NULL,
    Nomequipe2 VARCHAR(100) NOT NULL,
    logoEquipe2 VARCHAR(100) NOT NULL,
    
    date date NOT NULL,
    lieu VARCHAR(150) NOT NULL,
    heure time NOT NULL,
    duree INT DEFAULT 90,
    nbrPlaceMax INT NOT NULL,
    statut ENUM('en_attente', 'valide', 'refuse') DEFAULT 'en_attente',
    organisateur_id INT ,

    FOREIGN KEY (organisateur_id) REFERENCES users(id)
);

/* table categories*/
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50) NOT NULL,
    prix DECIMAL(8,2) NOT NULL,
    
    match_id INT NOT NULL,
    FOREIGN KEY (match_id) REFERENCES matchs(id)
);

/* table billets  */
CREATE TABLE billets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_place INT NOT NULL,
    qr_code VARCHAR(255) UNIQUE NOT NULL,
    
	user_id INT NOT NULL,
    match_id INT NOT NULL,
    categorie_id INT NOT NULL,
    
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (match_id) REFERENCES matchs(id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

/*    table commentaires  */
CREATE TABLE commentaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    commentaire TEXT,
    
	user_id INT NOT NULL,
    match_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (match_id) REFERENCES matchs(id)
);


/* insert */

INSERT INTO users (nom, email, mot_de_passe, role, image) VALUES
('Ahmed Acheteur', 'ahmed@gmail.com', 'hash123', 'acheteur', 'ahmed.jpg'),
('Yassine Organisateur', 'yassine@club.com', 'hash456', 'organisateur', 'yassine.jpg'),
('Admin Principal', 'admin@site.com', 'hash789', 'admin', 'admin.jpg');


INSERT INTO matchs (
    Nomequipe1, logoEquipe1,
    Nomequipe2, logoEquipe2,
    date, lieu, heure,
    duree, nbrPlaceMax, statut, organisateur_id
) VALUES (
    'Raja Club Athletic', 'raja.png',
    'Wydad Athletic Club', 'wydad.png',
    '2025-06-20', 'Stade Mohammed V', '20:00:00',
    90, 2000, 'valide', 2
);

INSERT INTO categories (label, prix, match_id) VALUES
('VIP', 300.00, 1),
('Normal', 100.00, 1),
('Economique', 50.00, 1);


INSERT INTO billets (numero_place, id_code, user_id, match_id, categorie_id) VALUES
(45, 'QR_BILLET_001', 1, 1, 2),
(46, 'QR_BILLET_002', 1, 1, 2);

INSERT INTO commentaires (commentaire, user_id, match_id) VALUES
('evenement sportif tres organise', 1, 1);



alter TABLE billets 
add column quantite int
