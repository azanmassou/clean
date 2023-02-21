<?php

/**
 * Cette fonction permet de verifier si un utilisateur est connecter ou pas.
 * 
 * @return bool $est_connecter Est connecter ou pas.
 */
function est_connecter(): bool
{

    $est_connecter = false;

    switch($_GET["profile"]){

        case "administrateur":
            if(isset($_SESSION["administrateur_connecter"]) && !empty($_SESSION["administrateur_connecter"])){
                $est_connecter = true;
            }

    }

    return $est_connecter;

}


/**
 * Cette fonction permet de se connecter a une base de données.
 * 
 * @return string | PDO la base de données ou un message d'erreur.
 */
function connexion_bd()
{
    $bd = "";

    try {
        $bd = new PDO('mysql:host=localhost;dbname=gestion-salle-spectacle;charset=utf8', 'root', 'root');
    } 
    
    catch (Exception $e) {
        $bd = "Oups!!! Une erreur s'est produite lors de la connexion a la base de données. Veuillez contactez les administrateurs.";
    }

    return $bd;
}

/**
 * Cette fonction permet de vérifier si un mail existe ou pas dans la base de données.
 * 
 * @param string $email L'email a vérifier.
 * @return bool $email_existe L'email existe ou pas.
 */
function email_existe(string $email): bool
{

    $email_existe = false;

    $instance_bd = connexion_bd();

    $requette = "SELECT * FROM utilisateur WHERE email = :email";

    // Préparation
    $preparation_requette = $instance_bd->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette->execute([
        'email' => $email
    ]);

    if ($resultat) {

        if (is_array($preparation_requette->fetch(PDO::FETCH_ASSOC))) {

            $email_existe = true;
        }
    }


    return $email_existe;
}


/**
 * Cette fonction permet d'enregistrer / d'inscrire un utilisateur.
 * 
 * @param array $utilisateur Les informations de l'utilisateur.
 * @return bool $utilisateur_enregistrer L'utilisateur enregistrer.
 */
function enregistrer_utilisateur(array $utilisateur): bool
{

    $utilisateur_enregistrer = false;

    $instance_bd = connexion_bd();

    $requette = "INSERT INTO utilisateur(`nom`, `prenoms`, `email`, `motdepasse`, `profil`) VALUES(:nom, :prenoms, :email, :motdepasse, :profil)";

    // Préparation
    $preparation_requette = $instance_bd->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette->execute($utilisateur);

    if ($resultat) {

        $utilisateur_enregistrer = true;
    }


    return $utilisateur_enregistrer;
}


/**
 * Cette fonction permet de verifier l'existance d'un utilisateur qui essaye de se connecter.
 * 
 * @param string $email L'email.
 * @param string $mot_de_pase Le mot de passe.
 * @return array utilisteur_existe L'utilisateur trouvé.
 */
function utilisteur_existe(string $email, string $mot_de_pase): array
{

    $utilisteur_existe = [];

    $instance_bd = connexion_bd();

    $requette = "SELECT `nom`, `prenoms`, `sexe`, `date-naissance`, `nom-utilisateur`, `email`, `telephone`, `profil` FROM utilisateur WHERE email = :email and motdepasse = :motdepasse";

    // Préparation
    $preparation_requette = $instance_bd->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $preparation_requette->execute([
        'email' => $email,
        'motdepasse' => $mot_de_pase
    ]);

    if ($resultat) {

        $utilisteur_existe = $preparation_requette->fetch(PDO::FETCH_ASSOC);

        if (!is_array($utilisteur_existe)) {

            $email_existe = [];
        }
    }

    return $utilisteur_existe;

}
