<?php



session_start();





// Declaration des variables

$erreurs = [];

$send = true;

$donnees = $_POST;

$firstname = $name = $email = $phone = $message = $psuedo = $pass = "";




// Traitement De Connexion



if (isset($_POST['valid'])) {



    if (!isset($_POST["email"]) || (empty($_POST["email"]))) {

        $send = false;

        $erreurs["email"] = "il faut au moins un email pour valider le formulaire";

    }

    if (!isset($_POST["password"]) || (empty($_POST["password"]))) {

        $send = false;

        $erreurs["password"] = "ll faut au moins un mot de passe pour valider le formulaire";
    }

    if (empty($erreurs)) {


        foreach ($users as $user) {


            if (
                $user['email'] === $_POST['email'] &&
                $user['password'] === $_POST['password']
            ) {
                $loggedUser = [
                    'email' => $user['email'],

                ];
                header("location: home.php") ;


            } else {
                $erreurs = sprintf(
                    'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                    $_POST['email'],
                    $_POST['password']
                );
            }

        }
    }

    header("location: login.php?send=$send&errors=" . json_encode($erreurs) . "&donnees=" . json_encode($donnees));

}


// Traitement de contact



if (isset($_POST['submit'])) {


    $firstname = htmlspecialchars($_POST['firstname']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $msg = htmlspecialchars($_POST['message']);
    $send = true;
    $emailtext = "";



    if (!isset($_POST["$firstname"]) || (empty($_POST["firstname"]))) {

        $send = false;

        $erreurs = 'Je veux connaitre ton Prenom !!!';

    }

    if (!isset($_POST["$name"]) || (empty($_POST["name"]))) {

        $send = false;

        $erreurs = 'Et Oui.. Je veux connaitre meme ton nom';

    }


    if (!isset($_POST["$message"]) || (empty($_POST["message"]))) {

        $send = false;

        $erreurs = 'Que suis-je sence savoir';

    }


    if (!isset($_POST["$email"]) || (empty($_POST["email"]))) {

        $send = false;

        $erreurs = 'T\'essaies de me rouler ? C\'est pas un email ca ';

    }

    if (!isset($_POST["$phone"]) || (empty($_POST["phone"]))) {

        $send = false;

        $erreurs = 'Que des chiffres et des espaces ... stp !!!';

    }
    if (empty($erreurs))


        if ($send) {



        }

    header("location: contact.php?send=$send&errors=" . json_encode($erreurs) . "&donnees=" . json_encode($donnees));


}



?>