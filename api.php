<?php
if (isset($_GET)) {
    $jsonData = file_get_contents('json/menu.json');// Lire le contenu du fichier JSON

    // Décoder le JSON en tableau associatif
    $dataArray = json_decode($jsonData, true);

    // Vérifier si le décodage s'est bien passé
    print_r($dataArray); // Afficher les données sous forme de tableau
}



?>