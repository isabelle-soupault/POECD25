
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user pour l'exo 1</title>
</head>
<body>

<h1>Affichage des données récupérées dans le formulaire _GET de l'exercice 1 </h1>

<?php if(isset($_GET['firstname']) && $_GET['lastname']) : ?>
    <p> Le prénom de notre utilisateur est : <?= htmlspecialchars($_GET['prenom']) ?> <br>
    et le nom de famille de notre utilisateur est <?= htmlspecialchars($_GET['nom']) ?>  </p>
<?php endif ?>
    
</body>
</html>

<!------------------------------------------------------->
<!--                  Correction                       -->
<!------------------------------------------------------->

<!--

Ici à la base il n'y avait pas le htmlspecialchars()
Ce qui signifie que le code n'est pas du tout protégé contre l'injection de javascript.

Pour protéger un minimum :

isset vient de is set) vérifie si la variable existe
empty vérifie que la variable existe et qu'elle est vide.


Pour sécuriser on utilise plus spécifiquement
htmlspecialchars() et le  htmlentities() 

Il existe également le strip_tags()  mais il va dhélas tronquer les chaines de caractères.
Avec cela on ne vera pas les tentatives d'attaques  contrairement aux deux autres nommées juste au dessus.


->