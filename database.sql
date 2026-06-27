CREATE DATABASE IF NOT EXISTS concertpass;
USE concertpass;

CREATE TABLE concerts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    date_concert DATE,
    lieu VARCHAR(255),
    prix DECIMAL(10,2) DEFAULT 0,
    capacite INT DEFAULT 0,
    image VARCHAR(255)
);

CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) UNIQUE,
    concert_id INT,
    pseudo_rp VARCHAR(100),
    discord VARCHAR(100),
    utilise TINYINT(1) DEFAULT 0,
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (concert_id) REFERENCES concerts(id)
);

CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur VARCHAR(100),
    mot_de_passe VARCHAR(255)
);

INSERT INTO staff (utilisateur, mot_de_passe)
VALUES ('admin','admin123');