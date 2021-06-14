<?php 

$civilityList = ['M'=>'M','Mme'=> 'Mme']; // tableau monsieur, madame

    if(isset($_POST['validForm'])){ // cette première ligne permet de vérifier que le formulaire a été rempli (ou pas complêtement), donc soumis

    $formErrors = []; // création d'un tableau vide 
    $regexName = '/^[a-zA-Z \-]+$/'; 
    // ici la regex indique qu'on a le droit de prendre les minuscules, majuscules, l'espace et le -

        if (!empty($_POST['lastname'])){ // on vérifie que le champs du nom de famille n'est pas vide
                if(preg_match($regexName, $_POST['lastname'])){
                    $lastName = htmlspecialchars($_POST['lastname']);
                } else{
                    $formErrors['lastname'] = 'Merci de ne mettre que des lettres :)';
        }
            }else { // si il est vide on met un petit message 
                $formErrors['lastname'] = 'Veuillez saisir votre prénom :)';
            }        // maintenant qu"'on a vérifié que ce n'est pas vide, on va faire 
        
        if (!empty($_POST['firstname'])){ // on vérifie que le champs du prénom n'est pas vide
                if(preg_match($regexName, $_POST['firstname'])){
                    $firstName = htmlspecialchars($_POST['firstname']);
                } else{
                    $formErrors['firstname'] = 'Merci de ne mettre que des lettres :)';
        }
            }else { // si il est vide on met un petit message 
                $formErrors['firstname'] = 'Veuillez saisir votre prénom :)';
            }  
        if(isset($_POST['civility']) && in_array($_POST['civility'], $civilityList)) { // in_array permet de vérifier si les conditions existent
            $civility = $_POST['civility'];
            
        } else {
            $formErrors['civility'] = 'Veuillez sélectionner votre civilité';
        }
    } 
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Partie 6 - Exercice 5</title>
</head>
<body>
<div class="container">
    <h1>Exercice 5</h1>

    <p text-center> Créer un formulaire sur la page index.php avec :  
Une liste déroulante pour la civilité (Mr ou Mme)
Un champ texte pour le nom
Un champ texte pour le prénom 

Ce formulaire doit rediriger vers la page index.php. 
Vous avez le choix de la méthode.</p>

</div>
<div class="container text-center mt-4">

<form action="index.php" method="post">
        <select name="civility" id="civility">
            <option value="" disable selected> Votre civilité</option>
            <?php
                foreach($civilityList as $value => $text){ ?>
                    <option <?= (isset($civility) && $civility == $value) ? 'selected' : ''; ?> value="<?= $value  ?>"><?= $text  ?></option>
                <?php }
            ?>
        </select>
        <p><?=  (isset($formErrors['civility'])) ? $formErrors['civility'] : '' ; ?></p>

        <label for="name"> Votre nom</label>
            <input type="text" name="lastname" id="name">
            <p><?= (isset($formErrors['lastname'])) ? $formErrors['lastname'] : ''; ?></p>

        <label for="surname">Votre prénom</label>
            <input type="text" name="firstname" id="surname" value="<?php isset($firstName)  ?>">
            <p><?= (isset($formErrors['firstname'])) ? $formErrors['firstname'] : ''; ?></p>

            <input type="submit" value="Valider!" name="validForm">

</form>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<!------------------------------------------------------->
<!--                  Correction                       -->
<!------------------------------------------------------->

<!--

En html pour éviter que la fonction ne soit jamais choisi sur un menu déroulant, on sélectionne disable

Pour le formulaire penser à mettre un name adapté pour le formulaire en question.

Comme on veut faire les vérifications en même temps, on va mettre le php en entête

On va créer un tableau associatif de message d'erreurs pour se simplifier. Ce dernier va être mis après le premier if

Une liste déroulante fonctionne différement.
Ici on veut des valeurs Monsieur ou Madame. Toutes les autres valeurs sont fausses.

Donc si ça correspond à madame ou Monsieur on met une alerte.

Et comme on ne sais pas comment ça va évoluer, on va créer un autre tableau que l'on va sortir de l'ensemble des conditions
On peut ensuite si on ajoute dans le tableau d'autres "civilités"

Dans le message d'erreur de la civilité on utilise la ternaire.

->