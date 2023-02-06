<?php

// Définition d'un tableau qui contiendra les questions et les réponses
$quiz = array(
  array(
    "question" => "Quel est le capital de la France ?",
    "options" => array("Paris", "Londres", "Rome", "Berlin"),
    "answer" => "Paris"
  ),
  array(
    "question" => "Quel est le plus grand pays du monde en surface ?",
    "options" => array("Russie", "Chine", "USA", "Australie"),
    "answer" => "Russie"
  ),
  array(
    "question" => "Quel est le plus grand océan du monde ?",
    "options" => array("Atlantique", "Pacifique", "Indien", "Arctique"),
    "answer" => "Pacifique"
  )
);

// Variables pour tenir compte du score et de la question actuelle
$score = 0;
$question_number = 0;

// Boucle principale qui boucle à travers les questions
foreach ($quiz as $question) {
  // Incrémentation du numéro de question
  $question_number++;

  // Affichage de la question actuelle et des options
  echo "Question $question_number: " . $question['question'] . "\n";
  echo "Options: \n";
  foreach ($question['options'] as $option) {
    echo " - $option\n";
  }

  // Récupération de la réponse de l'utilisateur
  echo "Votre réponse: ";
  $answer = trim(fgets(STDIN));

  // Vérification de la réponse et incrémentation du score en cas de réponse correcte
  if ($answer == $question['answer']) {
    echo "Correct !\n";
    $score++;
  } else {
    echo "Incorrect. La réponse correcte est " . $question['answer'] . ".\n";
  }

  // Ajout d'une ligne vide pour séparer les questions
  echo "\n";
}

// Affichage du score final
echo "Votre score final est $score sur $question_number.\n";

?>
