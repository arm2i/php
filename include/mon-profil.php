<!DOCTYPE html>
<html>
    <head>
        <title>Inclusion en PHP</title>
    </head>

    <body>
        <?php include('nav.php'); ?>

        <div>
            Mon profil :
        </div>

        <?php
            // inclusion de fichier php qui contient des fonctions
            require('fonctions.php');
            echo addition(2, 10);
            echo direBonjour();

            // tableau numérique
            $valeursEntieres = [10, 15, 20, 5, 3];
            // tableau assocatif : on accède aux valeurs par des clés et non des indices
            $personne = ["nom" => "toto", "age" => 39, "ville" => "Lille"];

            // exercice : créer un tableau php qui contient toutes les valeurs
            // de la table de multiplication (de 0 à 9) de 6
            // première fois : vous faites tout à la main sans boucle
            // deuxième fois : vous créez un nouveau tableau grâce une boucle

            // à la main méthode 1
            $tableDeSix = [];
            $tableDeSix[] = 0;
            $tableDeSix[] = 6;
            $tableDeSix[] = 12;
            $tableDeSix[] = 18;
            $tableDeSix[] = 24;
            $tableDeSix[] = 30;
            $tableDeSix[] = 36;
            $tableDeSix[] = 42;
            $tableDeSix[] = 48;
            $tableDeSix[] = 54;

            // à la main méthode 2
            $tableDeSix = [];
            $tableDeSix[9] = 54;
            $tableDeSix[5] = 30;
            $tableDeSix[0] = 0;
            $tableDeSix[2] = 12;
            $tableDeSix[3] = 18;
            $tableDeSix[1] = 6;
            $tableDeSix[4] = 24;
            $tableDeSix[6] = 36;
            $tableDeSix[7] = 42;
            $tableDeSix[8] = 48;

            // à la main méthode 3
            $tableDeSix = [0, 6, 12, 18, 24, 30, 36, 42, 48 , 54];

            // à la main méthode 4
            $tableDeSix = [];
            array_push($tableDeSix, 0);
            array_push($tableDeSix, 6);
            array_push($tableDeSix, 12);
            array_push($tableDeSix, 18);
            array_push($tableDeSix, 24);
            array_push($tableDeSix, 30);
            array_push($tableDeSix, 36);
            array_push($tableDeSix, 42);
            array_push($tableDeSix, 48);
            array_push($tableDeSix, 54);

            // à la main méthode 5
            $tableDeSix = [];
            $tableDeSix[] = 0 * 6;
            $tableDeSix[] = 1 * 6;
            $tableDeSix[] = 2 * 6;
            $tableDeSix[] = 3 * 6;
            $tableDeSix[] = 4 * 6;
            $tableDeSix[] = 5 * 6;
            $tableDeSix[] = 6 * 6;
            $tableDeSix[] = 7 * 6;
            $tableDeSix[] = 8 * 6;
            $tableDeSix[] = 9 * 6;

            $tableDeSix = [];
            for ($i=0;$i<=9;$i++) {
                $tableDeSix[] = $i * 6;
                // alternative :
                // array_push($tableDeSix, $i * 6);
            }

            $tableDeCinq = [];
            for ($i=0;$i<=9;$i++) {
                $tableDeCinq[] = $i * 5;
            }

            function getTableMultiplication($chiffre) {
                $table = [];
                for ($i=0;$i<=9;$i++) {
                    $table[] = $i * $chiffre;
                }
                return $table;
            }

            /*
            $tableDeUn = getTableMultiplication(1);
            $tableDeDeux = getTableMultiplication(2);
            $tableDeTrois = getTableMultiplication(3);

            $tables = [];
            $tables[0] = $tableDeUn;
            $tables[1] = $tableDeDeux;
            $tables[2] = $tableDeTrois;
            */

            /* Exercice : codez le script qui crée toutes les tables de multiplication
            de 1 à 9 et qui stockent l'ensemble des tables dans une seule variable */

            // tables va contenir toutes les tables de multiplications
            $tables = [];
            for ($j=1;$j<=9;$j++) {
                // table va contenir une seule table de multiplication à la fois
                $table = [];
                for ($i=0;$i<=9;$i++) {
                    $table[] = $i * $j;
                }
                $tables[] = $table;
            }
        ?>

        <h1>Table de multiplication de 6</h1>
        <table style="border:1px solid;margin-bottom:20px;">
            <?php
                foreach ($tableDeSix as $valeur) {
                    echo "<tr><td style='border:1px solid'>".$valeur."</td></tr>";
                }
            ?>
        </table>

        <h1>Table de multiplication de 6 avec informations</h1>
        <table style="border:1px solid;margin-bottom:20px;">
            <?php
            foreach ($tableDeSix as $indice => $valeur) {
                echo "<tr>
                        <td>".$indice." * 6 =</td>
                        <td style='border:1px solid;color:red;'>".$valeur."</td>
                      </tr>";
            }
            ?>
        </table>

        <h1>Toutes les tables</h1>

        <?php
        foreach ($tables as $indiceT => $tableMultiplication) {
            echo '<h2>Table de multiplication de '.($indiceT + 1).' avec informations</h2>';
            echo '<table style="border:1px solid;margin-bottom:20px;">';
            foreach ($tableMultiplication as $indice => $valeur) {
                echo "<tr>
                        <td>".$indice." * ".($indiceT + 1)." =</td>
                        <td style='border:1px solid;color:red;'>".$valeur."</td>
                      </tr>";
            }
            echo '</table>';
        }

        ?>



    </body>
</html>