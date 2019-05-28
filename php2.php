<?php
    /*
     * Les fonctions
     */
    // créer une fonction
    function nomDeLaFonction() {
        echo "Je suis une fonction qui ne fait qu'afficher
                un message qui ne sert à rien<br>";
    }

    // utiliser une fonction
    nomDeLaFonction();
    nomDeLaFonction();

    function addition($chiffre1, $chiffre2) {
        $resultat = $chiffre1 + $chiffre2;
        return $resultat;
    }

    // utilisations
    echo addition(10, 16);
    $resultat2 = addition(5, 12);
    if (16 < addition(10, 2)) {

    }

    // fonction avec paramètres facultatifs
// ici le paramètre ville n'a pas obligatoirement à être passé
// si il n'est pas passé lors de l'appel de la fonction, la variable $ville
// aura pour valeur "Lille"
// les paramètres facultatifs se trouvent en dernières positions
    function creerPersonne($nom, $age, $ville="Lille") {
        $personne = [];
        $personne['nom'] = $nom;
        $personne['age'] = $age;
        $personne['ville'] = $ville;

        return $personne;
    }

    creerPersonne("toto", 32, "Paris");
    creerPersonne("toto2", 56);

    /* exercice :
        Créer une fonction retourne la factorielle d'un chiffre
    exemple pour le chiffre 4 :
    le résultat doit être 1 * 2 * 3 * 4 = 24
    */

    /*
     1 * 2 * 3 * 4 * 5

    1 * 1 = 1
    1 * 2 = 2
    2 * 3 = 6
    6 * 4 = 24
    24 * 5 = 120
     */

    function factorielle($chiffre) {
        $factorielle = 1;
        for ($i=1;$i<=$chiffre;$i++) {
            $factorielle = $i * $factorielle;
        }

        return $factorielle;
    }

    echo factorielle(15)."<br>";
    echo factorielle(5)."<br>";


    function factorielleRecursive($chiffre) {
        /*
         *  Pour 5 :
            5 * factorielleRecursive(4)
            4 * factorielleRecursive(3)
            3 * factorielleRecursive(2)
            2 * factorielleRecursive(1)
            1 * factorielleRecursive(0)
        */

        if ($chiffre == 0) {
            return 1;
        }
        else {
            return $chiffre * factorielleRecursive($chiffre - 1);
        }
    }

    $result = factorielleRecursive(5);
    echo $result."<br>";

    /*
     * Fonctions natives php sur les chaines de caractères
     */

    // strlen : calculer le nombre de caractère d'une chaine
    $count = strlen("toto");
    $chaine = "salut";
    $count2 = strlen($chaine);

    echo $count."<br>";
    echo $count2."<br>";

    // mb_strlen est plus approprié pour les encodages utf8
    // (avec caractères spéciaux comme les accents)
    // ici strlen va renvoyer 9 à cause des accents
    // alors que mb_strlen renverra bien 7
    echo mb_strlen("élément")."<br>";

    /*
     * str_replace : remplace du texte par un autre texte dans une chaine
     */

    $bonjour = "Bonjour je m'appelle toto. Bonjour !";
    $bonjour2 = str_replace("Bonjour", "Salut", $bonjour);
    echo $bonjour."<br>";
    echo $bonjour2."<br>";

    echo str_replace('p', 'b', 'pim pam poum', $nombreLettresremplacees)."<br>";
    echo "Nombre de remplacements : ".$nombreLettresremplacees."<br>";

    // strtolower : remplace tous les caractères par leur équivalent en minuscule
    // strtoupper : remplace tous les caractères par leur équivalent en majuscule
    echo strtoupper('salut TOUT le monde')."<br>";
    echo strtolower('salut TOUT le monde')."<br>";
    echo strtoupper('salut les éléments')."<br>";
    // équivalent pour encodage utf8 : préférez-donc celle-ci
    echo mb_strtoupper('salut les éléments')."<br>";

    /* fonction date() : permet de récupérer la date et/ou l'heure actuelle */
    echo "La date actuelle : ".date("d/m/Y")."<br>";
    echo "Année actuelle : ".date("Y")."<br>";
    echo "Heure actuelle : ".date("H:i:s")."<br>";
    echo "Heure actuelle sans les secondes : ".date("H:i")."<br>";
    echo "Date et heure : ".date("d/m/Y H:i:s")."<br>";
?>