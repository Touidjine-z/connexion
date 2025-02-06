<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "security";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Gestion du formulaire
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $user = $_POST["username"];
        $pass = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $message = "✅ Vous êtes connecté !";
        } else {
            $message = "❌ Identifiant ou mot de passe incorrect !";
        }
    }

    if (isset($_POST["register"])) {
        $user = $_POST["username"];
        $pass = $_POST["password"];

        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $pass)) {
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $user, $pass);
            if ($stmt->execute()) {
                $message = "✅ Compte ajouté avec succès !";
            } else {
                $message = "❌ Erreur lors de l'inscription !";
            }
        } else {
            $message = "❌ Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un symbole !";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        /* Corps de la page */
        body {
            font-family: 'Courier New', monospace;
            background-color: black;
            color: #00FF00; /* Vert hacker */
            text-align: center;
            width: 400px;
            height: 600px; /* Augmenter la hauteur */
            position: absolute;
            top: 50%; /* Placer le body à 50% du haut de la page */
            left: 50%; /* Placer le body à 50% du côté gauche de la page */
            transform: translate(-50%, -50%); /* Ajuste la position en fonction de la taille du body */
            border: 2px solid #00FF00;
            padding: 40px; 
            box-sizing: border-box; /* Inclut le padding dans la largeur et la hauteur */
        }

        img {
            width: 200px;
            margin-bottom: 20px; /* Espacement entre l'image et le formulaire */
        }

        /* Formulaire à l'intérieur du body */
        form {
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            background-color: black;
            border: 1px solid #00FF00;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box; /* Pour s'assurer que le padding ne déborde pas */
        }

        /* Champ de saisie et boutons */
        input, button {
            width: 90%; /* Ajuste la largeur des champs */
            padding: 10px;
            margin: 10px 0;
            background-color: black;
            color: #00FF00;
            border: 1px solid #00FF00;
            font-size: 16px;
            text-align: center;
        }

        button:hover {
            background-color: #00FF00;
            color: black;
            cursor: pointer;
        }

        h2 {
            font-size: 24px;
            text-transform: uppercase;
            margin-bottom: 20px; /* Espacement avant le titre */
        }

        p {
            color: #00FF00;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <img src="image.jpg" alt="Logo">
    
    <form method="POST">
        <h2>Connexion</h2>
        <input type="text" name="username" placeholder="Identifiant" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit" name="login">Valider</button>
        <button type="reset">Reset</button>
        <button type="submit" name="register">Ajout d'un compte</button>
        <p><?= $message ?></p>
    </form>

</body>
</html>



