<?php 
$hautsDeFrance= [
02 => 'Aine',
59 => 'Nord',
60 => 'Oise',
62 =>'Pas-de-Calais',
80 =>'Somme',
];
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Partie 5 - Exercice 9</title>
</head>
<body>
<div class="container">
    <h1>Exercice 9</h1>

    <p text-center> Avec le tableau de l'exercice 5, afficher toutes les valeurs de ce tableau.</p>

</div>
<div class="container text-center mt-4">
<?php foreach ($hautsDeFrance as $key => $value): ?>
    <p> <?= $key ?> <?= $value ?>  </p>
<?php endforeach ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<!------------------------------------------------------->
<!--                  Correction                       -->
<!------------------------------------------------------->

<!--

Il faut remplacer key et value par d'autres nom.

Ainsi ici, on va remplacer $key comme $numberDep et 
et pour le $value remplacer par par exemple $departement

->