<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de base</title>
</head>

<body>

    <div id="header">
        <!-- <h1>Header de la page</h1> -->
        <?php
        include 'header.php';
        ?>
    </div>

    <div id="content">
        <!-- <h2>Contenu principal</h2> -->
        
        <?php
            // print_r($_GET);
            $page = isset($_GET['pages']) ? $_GET['pages'] : 'content';
            $chemin =  $page . '.php';
            if (file_exists($chemin)) {
                include $chemin;
            } else {
                echo 'erreur 404';
            }
            // include 'content.php';
        ?>
    </div>

    <div id="footer">
        <!-- <p>Pied de page © 2025</p> -->
        <?php
            

            include 'footer.php';
        ?>
    </div>

</body>

</html>
<?php

?>