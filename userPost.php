
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user pour l'exo 2</title>
</head>
<body>

<h1>Affichage des données récupérées dans le formulaire _POST de l'exercice 2 </h1>

<?php if(isset($_POST['prenom']) && $_POST['nom']) : ?>
    <p> Le prénom de notre utilisateur est : <?= $_POST['prenom'] ?> <br>
    et le nom de famille de notre utilisateur est <?= $_POST['nom'] ?>  </p>
<?php endif ?>
    
</body>
</html>
