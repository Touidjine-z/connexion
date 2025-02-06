Description

Ce projet est une interface web permettant aux utilisateurs de se connecter ou de s'inscrire à l'aide d'un identifiant et d'un mot de passe. L'application est hébergée localement avec WampServer et utilise une base de données MySQL pour stocker les identifiants des utilisateurs.

Prérequis

WampServer installé et activé

PHP et MySQL configurés sur WampServer

Un navigateur web

Installation

1. Création de la base de données

Ouvre phpMyAdmin et exécute la requête SQL suivante pour créer la base de données et la table :

CREATE DATABASE security;

USE security;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

2. Configuration du serveur

Place le fichier PHP dans le répertoire de WampServer :

Copie le fichier dans C:\wamp64\www\mon_projet\index.php.

Démarre WampServer et assure-toi que Apache et MySQL sont actifs.

3. Accès à l'application

Ouvre un navigateur et accède à l'URL :

http://localhost/mon_projet/index.php

Fonctionnalités

Connexion : Vérifie si l'utilisateur existe dans la base de données.

Inscription : Ajoute un nouvel utilisateur avec un mot de passe sécurisé respectant les critères suivants :

Minimum 8 caractères

Au moins une lettre majuscule

Au moins une lettre minuscule

Au moins un chiffre

Au moins un caractère spécial

Réinitialisation : Efface les champs du formulaire.



