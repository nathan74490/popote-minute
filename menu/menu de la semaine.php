<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        td img {
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <?php 
        $res = file_get_contents("json/week.json");
        function jsonToHtmlTable($json) {
            $data = json_decode($json, true);
            if (!$data) {
                return "<p>Erreur de lecture du JSON.</p>";
            }
            $jours = array_keys($data);
            $html = "<table>";
            $html .= "<tr><th>Jour</th>";
            foreach ($jours as $jour) {
                $html .= "<th>$jour</th>";
            }
            $html .= "</tr>";
            $html .= "<tr><td><strong>Plat</strong></td>";
            foreach ($jours as $jour) {
                $plat = $data[$jour]['plat'];
                $html .= "<td><img src='{$plat['photo']}' alt='{$plat['nom']}' width='100'><br><strong>{$plat['nom']}</strong><br>{$plat['description']}<br><strong>Prix: </strong>{$plat['prix']}€</td>";
            }
            $html .= "</tr>";
            $html .= "<tr><td><strong>Dessert</strong></td>";
            foreach ($jours as $jour) {
                $dessert = $data[$jour]['dessert'];
                $html .= "<td><img src='{$dessert['photo']}' alt='{$dessert['nom']}' width='100'><br><strong>{$dessert['nom']}</strong><br>{$dessert['description']}<br><strong>Prix: </strong>{$dessert['prix']}€</td>";
            }
            $html .= "</tr>";
            $html .= "</table>";
            return $html;
        }
        echo jsonToHtmlTable($res);
    ?>
</body>
</html>