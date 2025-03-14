<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de base</title>
</head>
<body>

    <div id="header">
        <h1>Header de la page</h1>
        <?php
            include 'header.php';
        ?>
    </div>

    <div id="content">
        <h2>Contenu principal</h2>
        <p>Ceci est la zone de contenu où vous pouvez ajouter du texte, des images, etc.</p>
        <?php
            include 'content.php';
        ?>
    </div>

    <div id="footer">
        <p>Pied de page © 2025</p>
        <?php
            include 'footer.php';
        ?>
    </div>

</body>
</html>
