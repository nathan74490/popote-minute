<?php

if (isset($_GET['acceuil'])) {
    $jsonData = file_get_contents('json/menu.json');

    $dataArray = json_decode($jsonData, true);
    echo json_encode($dataArray);
}
if (isset($_GET['page'])) {
    $page = ($_GET['page']);
    $chemin = 'menu/' . $page . '.php';

    if (file_exists($chemin)) {
        ob_start();
        include $chemin;
        $content = ob_get_clean();
        $array['content'] = $content;

        echo json_encode($array, JSON_PRETTY_PRINT);

    } else {
        include "404.php";
        $content = ob_get_clean();
        $array['content'] = $content;

        echo json_encode($array, JSON_PRETTY_PRINT);
    }
}
?>