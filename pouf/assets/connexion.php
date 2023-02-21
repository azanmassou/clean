<?php

session_start();

if (isset($_SESSION['mdp']) && !empty($_SESSION["mdp"])) {

    header("location: index.php ");

}

$donnees = $_POST;

try {
    $db = new PDO('mysql:host=localhost;dbname=youpi;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


if (isset($_POST['submit'])) {

    if (!empty($_POST['email']) and !empty($_POST['mdp'])) {


        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $mdp = sha1($_POST['mdp']);

        $recupUser = $db->prepare('SELECT * FROM users WHERE email = ? AND mdp = ?');
        $recupUser->execute(array($email, $mdp));


        if ($recupUser->rowCount() > 0) {

            $_SESSION['psuedo'] = $_POST['psuedo'];

            $_SESSION['mdp'] = $_POST['mdp'];

            $_SESSION['id'] = $recupUser->fetch()['id'];


            setcookie('email', $email, ['expires' => time() + 365 * 24 * 3600, 'secure' => true, 'httponly' => true,]);

            header("location: index.php");

        }

    }

}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>login</title>
</head>

<body>


    <div class="bg">
        <section class="vh-100 bg-image"
            style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Connexion</h2>

                                    <form method="POST" action="">

                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Email <span
                                                    style="color:<?=((isset($_POST['submit'])) && (empty($donnees["email"]))) || (isset($_POST['submit'])) && !($recupUser->rowCount() > 0) ? 'red' : "bleu" ?>"><sup>*</sup></span></label>
                                            <input type="email" id="email" class="form-control" name="email"
                                                value="<?=(isset($donnees["email"]) && (!empty($donnees["email"]))) ? $donnees["email"] : "" ?>"
                                                placeholder="john@gmail.com" />

                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="mdp">Mot de Passe <span
                                                    style="color:<?=((isset($_POST['submit'])) && (empty($donnees["mdp"]))) || (isset($_POST['submit'])) && !($recupUser->rowCount() > 0) ? 'red' : "bleu" ?>"><sup>*</sup></span></label>
                                            <input type="password" id="mdp" class="form-control" name="mdp"
                                                value="<?=(isset($donnees["mdp"]) && (!empty($donnees["mdp"]))) ? $donnees["mdp"] : "" ?>"
                                                placeholder="*********" />

                                        </div>

                                        <!-- 2 column grid layout for inline styling -->
                                        <div class="row mb-4">
                                            <div class="col d-flex justify-content-center">
                                                <!-- Checkbox -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="oui"
                                                        id="remember" checked name="remember" />
                                                    <label class="form-check-label" for="remember"> Se souvenire
                                                        de moi
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <!-- Simple link -->
                                                <a href="#!">Mot de passe oubliee?</a>
                                            </div>
                                        </div>


                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block mb-4"
                                            name="submit">Connexion</button>

                                        <!-- Register buttons -->
                                        <div class="text-center">
                                            <p>J'ai pas de compte? <a href="inscription.php">Inscription</a></p>



                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </div>













    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
</body>

</html>