CREATE TYPE type_compte AS ENUM
    ('Principal', 'Secondaire');

  CREATE TYPE type_status_transaction AS ENUM
    ('En_cours', 'terminer', 'Annuler');
  
  CREATE TYPE type_transaction AS ENUM
    ('Depos', 'Retrait', 'Paiement');

CREATE TABLE role (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE "user" (
    id SERIAL PRIMARY KEY,
    prenom VARCHAR(100),
    nom VARCHAR(100),
    login VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role_id INTEGER REFERENCES role(id),
    adresse VARCHAR(255),
    nin VARCHAR(50),
    photorecto VARCHAR(255),
    photoverso VARCHAR(255)
);



CREATE TABLE compte (
    id SERIAL PRIMARY KEY,
    numeros VARCHAR(100) UNIQUE,
    typecompte type_compte,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    solde NUMERIC(15,2) DEFAULT 0,
    user_id INTEGER REFERENCES "user"(id)
);



CREATE TABLE transaction (
    id SERIAL PRIMARY KEY,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    compte_id INTEGER REFERENCES compte(id),
    montant NUMERIC(15,2) NOT NULL,
    typetransaction type_transaction,
    status type_status_transaction
);
