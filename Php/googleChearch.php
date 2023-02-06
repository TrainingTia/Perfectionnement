<?php

// Inclure le client Google Search API pour PHP
require_once 'vendor/autoload.php';

// Définir la clé d'API Google
$apiKey = "votre clé d'API";

// Initialiser le client Google Search API pour PHP
$client = new Google_Client();
$client->setApplicationName("SearchExample");
$client->setApiKey($apiKey);

// Créer un objet de requête de recherche Google
$service = new Google_Service_Customsearch($client);
$cx = 'votre identifiant de moteur de recherche';

// Récupérer les résultats de la requête de recherche Google
$query = $_GET['q']; // récupérer la requête à partir de l'URL
$results = $service->cse->listCse($query, array('cx' => $cx));

// Afficher les résultats de la requête de recherche Google
foreach ($results->getItems() as $item) {
    echo "<a href='" . $item->link . "'>" . $item->title . "</a><br>";
    echo $item->snippet . "<br><br>";
}

?>
