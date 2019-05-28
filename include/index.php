<!DOCTYPE html>
<html>
    <head>
        <title>Inclusion en PHP</title>
    </head>

    <body>
        <!--
        Le code de la barre de navigation est similaire sur toutes les pages,
        donc on l'externalise dans un fichier à part
        <nav>
             <a href="index.php">Accueil</a>
             <a href="mon-profil.php">Voir le profil</a>
         </nav>
         -->
        <?php
            include('nav.php');

            // include_once inclut un fichier uniquement s'il n'a pas déjà été inclus
            include_once('nav.php');
        ?>
        <!-- require fait exactement la même chose que include (inclure une page)
        sauf qu'il génère une erreur fatale (bloquante), alors que include
        génère un qarning qui ne bloque pas le reste du script -->
        <?php //require('nav2.php'); ?>

        <div>
            Ceci est la page d'accueil
        </div>

    </body>
</html>