<?php

// Fonction pour initialiser les variables
function initialize() {
    $word = 'tia'; // Mot à deviner
    $incorrectGuesses = 0; // Nombre d'essais incorrects
    $correctGuesses = array(); // Lettres correctes devinées
    return array($word, $incorrectGuesses, $correctGuesses);
}

// Fonction pour jouer au jeu
function play($word, &$incorrectGuesses, &$correctGuesses) {
    // Boucle jusqu'à ce que le jeu soit gagné ou perdu
    while ($incorrectGuesses < 3 && count($correctGuesses) !== strlen($word)) {
        // Affiche le mot avec les devinettes
        $wordWithGuesses = '';
        for ($i = 0; $i < strlen($word); $i++) {
            if (in_array($word[$i], $correctGuesses)) {
                $wordWithGuesses .= $word[$i];
            } else {
                $wordWithGuesses .= '_';
            }
        }
        echo 'Mot à deviner : ' . $wordWithGuesses . "\n";
        echo 'Devinez une lettre : ';

        // Demande une lettre au joueur
        $letter = readline();
        if (strpos($word, $letter) !== false) {
            $correctGuesses[] = $letter;
        } else {
            $incorrectGuesses++;
        }
    }

    // Affiche un message pour annoncer le résultat
    if ($incorrectGuesses < 3) {
        echo 'Bravo, vous avez gagné !' . "\n";
    } else {
        echo 'Désolé, vous avez perdu !' . "\n";
    }
}

// Appelle les fonctions pour jouer au jeu
list($word, $incorrectGuesses, $correctGuesses) = initialize();
play($word, $incorrectGuesses, $correctGuesses);

