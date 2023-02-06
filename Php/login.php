<?php

// Démarrage ou reprise de la session PHP
session_start();

// Vérification si l'utilisateur est déjà connecté
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
  // L'utilisateur est déjà connecté, on affiche un message et un bouton de déconnexion
  echo "Bonjour, vous êtes connecté. <a href='logout.php'>Déconnexion</a>";

// Sinon, on affiche le formulaire de connexion
} else {
    // Variables pour stocker les erreurs éventuelles
    $errors = [];

    // Vérification si le formulaire a été soumis
    if (isset($_POST['submit'])) {
        // Récupération des données du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validation des données du formulaire
        if (empty($username)) {
            $errors[] = "Le nom d'utilisateur est requis";
        }
        if (empty($password)) {
            $errors[] = "Le mot de passe est requis";
        }

        // Vérification si il n'y a pas d'erreur
        if (empty($errors)) {
            // Validation des informations d'identification
            // Remplacez cette partie par votre propre logique de validation (par exemple, vérification dans une base de données)
            if ($username === 'admin' && $password === 'password') {
                // Si les informations sont valides, on enregistre l'utilisateur comme étant connecté en utilisant une variable de session
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                // Redirection vers la page d'accueil
                header('Location: index.php');
                exit;
            } else {
                // Sinon, on affiche un message d'erreur
                $errors[] = "Nom d'utilisateur ou mot de passe incorrect";
            }
        }
    }

    // Affichage du formulaire de connexion
    echo "<form action='' method='post'>";
    echo "<label for='username'>Nom d'utilisateur : </label>";
    echo "<input type='text' id='username' name='username' value='" . (isset($username) ? $username : '') . "'>";
    echo "<br>";
    echo "<label for='password'>Mot de passe : </label>";
    echo "<input type='password' id='password' name='password'>";
    echo "<br>";
    echo "<input type='submit' name='submit' value='Connexion'>";
    echo "</form>";

    // Affichage des erreurs
}