<?php
    /*
     * Exercice 1 :
    a) Déclarer et initialiser :
    - une variable de type chaine de caractères avec la valeur "1"
    - une variable de type entier avec la valeur "1"
    - une variable de type boolean avec la valeur "vrai"

    b) comparer ces variables :
    - la chaine avec l'entier, en utilisant l'opérateur qui fera que php les considère équivalente
    - la chaine avec l'entier, en utilisant l'opérateur qui fera que php les considère différente

    c) stocker ces trois variables dans une variable de type tableau,
        puis utiliser une boucle pour parcourir ce tableau. Dans la boucle,
        utiliser la fonction var_dump pour afficher à l'écran le dump de chaque valeur.
    */
    $laChaine = "1";
    $unEntier = 1;
    $leBoolean = true;

    if ($laChaine == $unEntier) {
        // on rentre ici car la valeur "1" est égale à la valeur 1
        // même se le type des variables est différent
    }

    if ($laChaine === $unEntier) {
        // on ne rentre pas ici même si les valeurs sont égales
        // car le type des variables est différent
    }

    $leTableau = [];
    $leTableau[] = $laChaine;
    $leTableau[] = $unEntier;
    $leTableau[] = $leBoolean;

    // autre méthode
    $leTableau = [$laChaine, $unEntier, $leBoolean];

    // boucle avec foreach
    foreach ($leTableau as $valeur) {
        var_dump($valeur);
    }

    echo "<br>";

    // sinon boucle avec for
    for ($i=0; $i<count($leTableau); $i++) {
        var_dump($leTableau[$i]);
    }

    echo "<br>";

    /*
     * Exercice 2 :
a) créer une fonction qui prend un paramètre obligatoire, et un autre facultatif.
b) Cette fonction doit calculer le nombre de caractères du premier paramètre.
c) Ensuite la fonction doit retourner le nombre de caractères manquants
    pour arriver au nombre contenu dans le second paramètre.
    Ce second paramètre doit avoir pour valeur par défaut 100.
d) Si le nombre de caractères du premier paramètre est égal
    ou supérieur à ce second paramètre, la fonction doit renvoyer 0
e) utiliser cette fonction dans un script php, et affichez à
    l'écran une chaine testée (au choix, en dur dans le code)
    suivi du nombre de caractères manquants que la fonction renverra.
     */
    function maFonction($paramObligatoire, $paramFacultatif=100) {
        $nbCaracteres = mb_strlen($paramObligatoire);
        $nbCaracteresManquants = $paramFacultatif - $nbCaracteres;

        if ($nbCaracteres >= $paramFacultatif) {
            $nbCaracteresManquants = 0;
            // ou
            // return 0
        }

        return $nbCaracteresManquants;
    }

    echo "toto : ".maFonction("toto");
    echo "<br>";

    $uneChaine = "Bonjour";
    echo $uneChaine." : ".maFonction($uneChaine, 50);
    echo "<br>";

    $limit = 40;
    $nouvelleChaine = "salut";
    echo $nouvelleChaine." : ".maFonction($nouvelleChaine, $limit)." manquants pour arriver à ".$limit;
    echo "<br>";
    /*
     * Exercice 3 :
a) créer une page web avec trois liens, et une section (ou div)
b) chaque lien doit pointer vers cette même page,
    mais en passant le paramètre GET "test". Pour le premier lien,
    la valeur du paramètre doit être "lien1", pour le deuxième lien : "lien2"
c) le troisième lien doit passer 2 paramètres "test" et "test2"
    avec les valeurs "lien3" et "lien4" respectivement.
c) lors du clic sur les 2 premiers liens, le paramètre GET doit être
   récupéré lors du chargement de la page et
    sa valeur doit être affichée dans la section
d) lors du clic sur le troisième lien,
    les deux paramètres doit être récupérés puis affichés
    dans la section en  une seule instruction avec la concaténation
Pour cet exercice, il faut tester l'existence des variables GET avant de les utiliser
     */
?>

<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <a href="tp.php?test=lien1">Premier lien</a>
        <a href="tp.php?test=lien2">Deuxième lien</a>
        <a href="tp.php?test=lien3&test2=lien4">Troisième lien</a>

        <section>
            <?php
                // solution 1
                if (isset($_GET['test']) && !isset($_GET['test2'])) {
                    $test = $_GET['test'];
                    echo $test;
                }

                if (isset($_GET['test']) && isset($_GET['test2'])) {
                    echo $_GET['test'].$_GET['test2'];
                }

                /* solution 2 */
                if (isset($_GET['test'])) {
                    if (isset($_GET['test2'])) {
                        echo $_GET['test'].$_GET['test2'];
                    }
                    else {
                        $test = $_GET['test'];
                        echo $test;
                    }
                }

            ?>
        </section>

<?php
/*
Exercice 4:
a) Créer un formulaire html, soumis en POST, avec ces champs:
- champ text : nom - obligatoire - trois caractères minimum
- champ text : date de naissance - obligatoire - format date français
- champ email : email - obligatoire - format email
- champ text : code postal - non obligatoire - format 5 chiffres
- champ text : telephone - non obligatoire - format 10 chiffres

b) forcer la validation html5 côté front avec les attributs adéquats
(à vous de trouver comment faire pour 3 caractères minimum et format 5 chiffres par exemple, indice : pattern)

c) à la soumission du formulaire, vous devez :
- récupérer les valeurs différentes valeurs
- vérifier si les valeurs sont valides en faisant les
mêmes vérifications qui ont été faites avec les attributs HTML5.

- si il y a des erreurs, il faut demander à l’utilisateur
de saisir à nouveau
- enregistrer toutes les erreurs dans un tableau associatif,
puis affichez les erreurs s'il y en a.

d) si vous avez fini, ajoutez un champ : champ radio : civilite - non obligatoire
et vérifiez bien côté serveur que la valeur envoyée fait bien partie des valeurs
autorisées (c'est-à-dire que la valeur reçue est bien l'une des valeurs proposées par les boutons radios).
*/

if (isset($_POST['btn_valider'])) {
    $nom = filter_input(INPUT_POST,'name');
    $annee = $_POST['birthday'];
    $email = $_POST['email'];
    $cp = $_POST['zipcode'];
    $tel = $_POST['phone'];
    $civ = filter_input(INPUT_POST,'civilite');
    $pays = filter_input(INPUT_POST,'pays');

    $centres = filter_input(INPUT_POST,'centres_interets', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $presentation = filter_input(INPUT_POST,'presentation');
    $password = filter_input(INPUT_POST,'password');
    $reglement = filter_input(INPUT_POST,'reglement');

    /*
     * la fonction php native filter_input ressemble à ça
     */
    /*
    function filter_input($type, $variable_name) {
        if ($type == INPUT_GET) {
            if (isset($_GET[$variable_name])) {
                $var = $_GET[$variable_name];
            }
            else {
                $var = null;
            }

            return $var;
        }
        elseif ($type == INPUT_POST) {
            if (isset($_POST[$variable_name])) {
                $var = $_POST[$variable_name];
            }
            else {
                $var = null;
            }

            return $var;
        }
    }
    */

    $errors = [];
    if ($nom == "" || strlen($nom) < 3) {
        $errors['nom'] = "Veuillez saisir un nom, avec au moins 3 caractères";
    }

    if ($annee == "" || preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/", $annee) == false) {
        $errors['annee'] = "Veuillez saisir une date de naissance au format jj/mm/aaaa";
    }

    if ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Veuillez saisir un email valide";
    }

    if ($cp != "" && !preg_match("/\d{5}/", $cp)) {
        $errors['cp'] = "Veuillez saisir un code postal valide";
    }

    if ($tel != "" && !preg_match("/0\d{9}/", $tel)) {
        $errors['tel'] = "Veuillez saisir un téléphone valide";
    }

    if ($civ != "mme" && $civ != "m." && $civ != null) {
        $errors['civ'] = "Veuillez saisir une civilité correcte";
    }

    $tousPays = [1, 2, 3];
    if ($pays != "" && !in_array($pays, $tousPays)) {
        $errors['pays'] = "Veuillez saisir un pays";
    }

    $tousCentres = ['Informatique', 'Sport', 'Dormir'];
    if ($centres != "" && !in_array($centres, $tousCentres)) {
        $errors['centres'] = "Veuillez choisir des centres d'intérêts possibles";
    }

    if ($reglement == null) {
        $errors['centres'] = "Veuillez accepter le réglement";
    }

    if (count($errors) > 0) {
        echo "Veuillez ne pas faire d'erreurs.<br>";
        foreach ($errors as $error) {
            echo $error."<br>";
        }
    }
    else {
        echo "Merci pour votre inscription";
    }
}


?>
    <form method="post">
        <input type="radio" name="civilite" value="mme"/> Mme<br>
        <input type="radio" name="civilite" value="m."/> M.<br>

        <input type="text" name="name" required placeholder="Nom" minlength="3" pattern=".{3,}"/><br>
        <input type="text" name="birthday" required placeholder="Année de naissance" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}"/><br>
        <input type="email" name="email" required placeholder="Email"/><br>
        <input type="text" name="zipcode" placeholder="Code postal" pattern="\d{5}"/><br>
        <input type="text" name="phone" placeholder="Numéro de téléphone" pattern="0\d{9}"/><br>
        <select name="pays">
            <option value=""></option>
            <option value="1">France</option>
            <option value="2">Belgique</option>
            <option value="3">Italie</option>
        </select>
        <br>
        <select multiple name="centres_interets[]">
            <option></option>
            <option>Informatique</option>
            <option>Sport</option>
            <option>Dormir</option>
        </select>
        <br>
        <textarea name="presentation"></textarea>

        <br>
        <input type="checkbox" name="reglement" required value="valeur_du_bouton_peu_importe"/> J'accepte le réglement

        <br>
        <input type="password" name="mot_de_passe" placeholder="Votre mot de passe"/>
        <br>

        <input type="submit" name="btn_valider"/>
    </form>
    </body>
</html>