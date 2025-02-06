
# Projet de Connexion avec PHP et MySQL

Ce projet PHP permet de créer une interface de connexion et d'inscription en utilisant une base de données MySQL pour stocker les informations des utilisateurs. Il utilise WampServer comme environnement local de développement.

## Fonctionnalités

- **Connexion** : Permet à un utilisateur de se connecter en vérifiant les identifiants (nom d'utilisateur et mot de passe) dans la base de données.
- **Inscription** : Permet à un utilisateur de créer un nouveau compte, avec validation de mot de passe (au moins une majuscule, une minuscule, un chiffre et un symbole).
- **Base de données** : Utilisation d'une base de données locale (`security`) avec une table `users` contenant les informations des utilisateurs.

## Prérequis

- **WampServer** : Pour exécuter PHP et MySQL localement.
- **PHP 7+** : Version de PHP nécessaire pour faire fonctionner ce projet.
- **MySQL** : Base de données pour stocker les utilisateurs.

## Installation

1. Clonez ou téléchargez ce projet sur votre machine locale.
2. Ouvrez **WampServer** et démarrez Apache et MySQL.
3. Créez une base de données `security` dans phpMyAdmin ou via la ligne de commande MySQL.
4. Créez une table `users` dans la base de données avec la structure suivante :
   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) NOT NULL,
       password VARCHAR(255) NOT NULL
   );
   ```
5. Modifiez le fichier PHP pour vous assurer que les informations de connexion à la base de données (`$servername`, `$username`, `$password`, `$dbname`) correspondent à votre configuration locale.
6. Placez le projet dans le répertoire `www` de WampServer (`D:/wamp64/www/` ou `C:/wamp64/www/`).
7. Ouvrez un navigateur et accédez à l'URL : `http://localhost/connexion`.

## Utilisation

1. **Connexion** :
   - Entrez votre nom d'utilisateur et votre mot de passe dans les champs correspondants et cliquez sur le bouton "Valider".
   - Si les informations sont correctes, vous serez connecté avec succès.
   - Sinon, un message d'erreur indiquera que l'identifiant ou le mot de passe est incorrect.

2. **Inscription** :
   - Si vous n'avez pas encore de compte, vous pouvez en créer un en entrant un nom d'utilisateur et un mot de passe (assurez-vous que le mot de passe respecte les critères de sécurité).
   - Cliquez sur le bouton "Ajout d'un compte" pour ajouter un nouvel utilisateur à la base de données.

## Identifiants et mot de passe (si nécessaire)

Pour tester la connexion, vous pouvez utiliser les identifiants par défaut dans la table `users` :

- **Identifiant** : `admin`
- **Mot de passe** : `Admin123!`

**Remarque** : Vous pouvez modifier ces identifiants directement dans la base de données via phpMyAdmin ou un autre outil de gestion de MySQL.

## Technologies utilisées

- **PHP** : Pour la gestion des connexions et des requêtes SQL.
- **MySQL** : Pour stocker les utilisateurs et leurs informations.
- **HTML/CSS** : Pour la création de l'interface utilisateur.

## Auteur

- **Touidjine Zaki**

## License

Ce projet est sous la licence MIT.
