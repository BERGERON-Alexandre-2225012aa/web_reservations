# Structure de la BDD à établir en local :


-- Table USER
CREATE TABLE USER (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    telephone VARCHAR(15) DEFAULT NULL
);

-- Table RESOURCE
CREATE TABLE RESOURCE (
    resource_id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL, -- Ex: "table", "coiffeur"
    description VARCHAR(255) DEFAULT NULL -- Ex: "Table 1", "Coiffeur A"
);

-- Table RESERVATION
CREATE TABLE RESERVATION (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    resource_id INT NOT NULL,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    nombre_personnes INT NOT NULL,

    -- Foreign keys
    CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES USER(user_id) ON DELETE CASCADE,
    CONSTRAINT fk_resource_id FOREIGN KEY (resource_id) REFERENCES RESOURCE(resource_id) ON DELETE CASCADE,

    -- To avoid double-booking the same resource at the same time
    CONSTRAINT unique_reservation UNIQUE (resource_id, date, heure)
);
