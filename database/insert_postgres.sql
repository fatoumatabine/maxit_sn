INSERT INTO role (nom) VALUES ('Administrateur');

INSERT INTO "users" (prenom, nom, login, password, role_id, adresse, nin, photorecto, photoverso)
VALUES ('Sylla', 'Talla', 'Tsylla', '1234', 1, 'Dakar', '123456789', 'recto.jpg', 'verso.jpg');

INSERT INTO compte (numeros, typecompte, solde, user_id)
VALUES ('CPT001', 'Principal', 10000.00, 1),
       ('CPT002', 'Secondaire', 5000.00, 1);


INSERT INTO transaction (compte_id, montant, typetransaction, status)
VALUES (1, 5000.00, 'Depos', 'En_cours'),
       (1, 2000.00, 'Retrait', 'En_cours'),
       (1, 1500.00, 'Paiement', 'terminer'),
       (1, 1000.00, 'Depos', 'Annuler');