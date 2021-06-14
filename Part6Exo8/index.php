<?php if(isset($_POST['validForm'])){ 
            if(empty ($_POST['name']){
                $name = 'il manque le nom';
                    }elseif (empty ($_POST['prenom'] ){
                        echo 'il manque le prenom';
                    } elseif (empty($_POST['file'])) {
                        echo 'il manque le fichier';
                    }elseif ($_FILES['file']['type'] != 'application/pdf'){
                    echo 'le fichier n est pas un pdf';
                    }
    
} else {
    echo 'les infos';
}

?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Partie 6 - Exercice 8</title>
</head>
<body>
<div class="container">
    <h1>Exercice 8</h1>

    <p text-center> Sur le formulaire de l'exercice 6, en plus de ce qui est demandé sur les exercices précédent, vérifier que le fichier transmis est bien un fichier pdf.</p>

</div>
<div class="container text-center mt-4">

<?php if( !isset($_POST['validForm'])) : ?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <select name="civilite" id="">
            <option value="mr">Mr</option>
            <option value="mrs">Mme</option>
        </select>
        <label for="name"> Votre nom</label>
            <input type="text" name="nom" id="name">
            <?= $name ?>
        <label for="prenom">Votre prénom</label>
            <input type="text" name="prenom" id="surname">
        <input type="file" name="file" id="docpicker" accept=".doc,.docx,.pdf">
       
       <?php if(isset($_FILES['file']) && $_FILES['file']['type'] != 'application/pdf'): ?>
        <p> Merci de mettre un fichier en pdf ! :)</p>
        <?php endif ?>

        <input type="submit" name="validForm" value="Valider!">

<?php else :?>

    <script> form {display:none;}</script>
    <p> La civilité de notre utilisateur est : <?= $_POST['civilite'] ?> <br>
    Le prénom de notre utilisateur est : <?= $_POST['prenom'] ?> <br>
    et le nom de famille de notre utilisateur est <?= $_POST['nom'] ?> <br>
    Le fichier mis à disposition se nomme  <?= $_FILES['file']['name'] ?> <br> 
    Et son extansion est de type  <?= $_FILES['file']['type'] ?> <br> 
    
<?php  

endif;

?>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>


<!-- Commentaires en cours d'exercice

Ici, on voulait vérifier que le formulaire a bien été rempli, c'est à dire que le bouton envoyer n'a pas été cliqué.
Pour ce faire, en ajoutant au bouton envoyer  name = "validForm" permet de mettre 
if( !isset($_POST['validForm']))

ici on dit "si validform n'a pas été cliqué alors, afficher [...]
Ce qui est bien plus court que de mettre plein de conditions.

Il ne faut pas oublier que l'ordre est super important dans ce cas !!!


si je valide le formulaire
  1 - je vérifie que nom n'est pas vide
  2 - je vérifie que prenom n'est pas vide
  3- je vérifie que fichier n'est pas vide 
  4 - je vérifie que fichier est en pdf

  Si les vérifications ne sont pas bonnes, 
   1 - je retourne sur le formulaire
   2 - je récupère les données envoyées et les utilisent comme base
   3 - j'indique où se situe l'erreur

  Si les vérifications sont bonnes, je peux ENFIN passer à l'affichage. 

 -->