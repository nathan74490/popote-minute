<?php
$res = file_get_contents("json/week.json");
// $data = json_decode($res, true);
// print_r($data) ;

function jsonToHtmlTable($json)
{
    $data = json_decode($json, true);
    if (!$data) {
        return "<p>Erreur de lecture du JSON.</p>";
    }

    $jours = array_keys($data);
    
    $html = "<table border='1' cellspacing='0' cellpadding='5' style='border-collapse: collapse; text-align: center;'>";
    $html .= "<tr><th>Jour</th>";
    foreach ($jours as $jour) {
        $html .= "<th>$jour</th>";
    }
    $html .= "</tr>";
    
    // Ligne pour les plats
    $html .= "<tr><td><strong>Plat</strong></td>";
    foreach ($jours as $jour) {
        $plat = $data[$jour]['plat'];
        $html .= "<td><img src='{$plat['photo']}' alt='{$plat['nom']}' width='100'><br><strong>{$plat['nom']}</strong><br>{$plat['description']}<br><strong>Prix: </strong>{$plat['prix']}€</td>";
    }
    $html .= "</tr>";
    
    // Ligne pour les desserts
    $html .= "<tr><td><strong>Dessert</strong></td>";
    foreach ($jours as $jour) {
        $dessert = $data[$jour]['dessert'];
        $html .= "<td><img src='{$dessert['photo']}' alt='{$dessert['nom']}' width='100'><br><strong>{$dessert['nom']}</strong><br>{$dessert['description']}<br><strong>Prix: </strong>{$dessert['prix']}€</td>";
    }
    $html .= "</tr>";
    
    $html .= "</table>";
    return $html;
}

// Exemple d'utilisations
$json = $res; // Remplace avec ton JSON
echo jsonToHtmlTable($json);


?>