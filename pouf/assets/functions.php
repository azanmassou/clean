<?php
/*
@ Recherche une cle dans un tableau
@ Returne une variable type booleen
@+ Exemple d'appel de cette fonction
*/


function isValidRecipe(array $recipe): bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}



/*
@ Recherche une cle dans un tableau
@ Returne une variable type booleen
@+ Exemple d'appel de cette fonction
*/

function displayAuthor(string $authorEmail, array $users): string
{
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            return $author['full_name'] . '(' . $author['age'] . ' ans)';
        }
    }
}



/*
@ Recherche une cle dans un tableau
@ Returne une variable type booleen
@+ Exemple d'appel de cette fonction
*/


function getRecipes(array $recipes): array
{
    $validRecipes = [];

    foreach ($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }

    return $validRecipes;
}

// $isSushisValid = isValidRecipe($sushis);




// Verification  Number  & de securite 



function isPhone($var){

    return preg_match("/^[0-9 ]*$/");
}



function verifyInput($var)
{

    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}




//inclusion de l'entête du site 

include_once('variables.php');
include_once('functions.php');




/*
Affichage des recette
<h3>
<p>
<?php foreach (getRecipes($recipes) as $recipe): ?>
<article>
<h3>
<?php echo $recipe['title']; ?>
</h3>
<div>
<?php echo $recipe['recipe']; ?>
</div>
<i>
<?php echo displayAuthor($recipe['author'], $users); ?>
</i>
</article>
<?php endforeach ?>
</p>
</h3>
*/




?>