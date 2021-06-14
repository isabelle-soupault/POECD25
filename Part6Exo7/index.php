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
        if(!empty($_POST['addFile'])){
            var_dump($_POST['addFile']);
            var_dump($_FILES);
        } else {
            $formErrors['addFile'] = 'Veuillez ajouter un fichier :)';
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
    <title>Partie 6 - Exercice 7</title>
</head>
<body>
<div class="container">
    <h1>Exercice 7</h1>

    <p text-center> Au formulaire de l'exercice 5, ajouter un champ d'envoi de fichier. Afficher en plus de ce qui est demandé à l'exercice 6, le nom et l'extension du fichier.</p>

</div>
<div class="container text-center mt-4">
<?php if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_FILES)): ?>
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
                <input type="text" name="lastname" id="name" value="<?= isset($lastName)? $lastName : '';  ?>">
                <p><?= (isset($formErrors['lastname'])) ? $formErrors['lastname'] : ''; ?></p>

            <label for="surname">Votre prénom</label>
                <input type="text" name="firstname" id="surname" value="<?= isset($firstName)? $firstName : ''; ?>">
                <p><?= (isset($formErrors['firstname'])) ? $formErrors['firstname'] : ''; ?></p>

            <input type="file" name="addFile" id="addFile" accept="" > 
                <p> <?= isset($formErrors['addFile']) ? $formErrors['addFile'] : '' ?></p>

                <input type="submit" value="Valider!" name="validForm">

    </form>

    <?php else : ?>

    <p>La civilité de notre utilisateur est : <?= isset($civility) ? $civility : '' ?> <br>
    Le prénom de notre utilisateur est : <?= isset($firstName)? $firstName : '' ?> <br>
    et le nom de famille de notre utilisateur est <?= isset($lastName)? $lastName : '' ?>  </p>
    Le fichier mis à disposition se nomme  < ?= isset($addingFile)? $addingFile['file']['name'] : ''  ?> <br> 
    Et son extansion est de type  < ?= isset($fileName) ? $fileName['file']['type'] : '' ?> <br> 
<?php

endif ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

