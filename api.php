<?php

if (isset($_GET['acceuil'])) { // si on demande la page d'acceuil dans l'url on renvoie le contenu de menu.json au forma json
    $jsonData = file_get_contents('json/menu.json');

    $dataArray = json_decode($jsonData, true);
    echo json_encode($dataArray);
}
if (isset($_GET['page'])) { // si on demande une page dans l'url on renvoie le contenu de la page demandée au format json
    $page = ($_GET['page']);
    $chemin = 'menu/' . $page . '.php';

    if (file_exists($chemin)) {
        ob_start();
        include $chemin;
        $content = ob_get_clean();
        $array['content'] = $content;

        echo json_encode($array, JSON_PRETTY_PRINT);

    } else { // si la page n'existe pas on renvoie la page 404
        ob_start();
        include "404.php";
        $content = ob_get_clean();
        $array['content'] = $content;

        echo json_encode($array, JSON_PRETTY_PRINT);
    }
}
?>