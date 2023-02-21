<?php
// Activation de la session sur recette

session_start();



// Connexion a la base de donnees Youpi

try {
    $db = new PDO('mysql:host=localhost;dbname=youpi;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


// Mise en relation de la base de Donnes On récupère tout le contenu de la table recipes


$sqlQuery = 'SELECT * FROM recipes';

$recipesStatement = $db->prepare('SELECT * FROM recipes');

$recipesStatement->execute();

$recipes = $recipesStatement->fetchAll();


/* On affiche chaque recette une à une
foreach ($recipes as $recipe) {
?>
<p>
<?php echo $recipe['title']; ?>
</p>
<?php
}
$lines = 1;
while ($lines <= 2) {
echo '';
$lines++;
} */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>recettes</title>
</head>

<body>
    <section>
        <?php include_once('header.php') ?>
    </section>




    <section>

        <div class="wrapper">
            <div class="recettes">
                <div class="recette">
                    <h1>Nos Recettes</h1>
                </div>
                <div class="rec">
                    <fieldset>
                        <?php


                        $recupRecipes = $db->query('SELECT * FROM recipes');

                        while ($recipe = $recupRecipes->fetch()) {

                            ?>
                            <p><strong>
                                    <?= $recipe['title']; ?>
                                </strong>
                                Faire une Commande ici<a href="commande.php"> ici</a>
                            </p>


                            <?php
                        }
                        ?>
                    </fieldset>

                </div>
            </div>
        </div>


    </section>


</body>

</html>