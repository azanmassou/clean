<?php


if (isset($_SESSION['mdp']) && !empty($_SESSION["mdp"])) {

    header("location: index.php ");

}

try {
    $db = new PDO('mysql:host=localhost;dbname=youpi;charset=utf8', 'root', 'root');
} 

catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['submit'])) {

    $verif = "false";

    $donnees = $_POST;


    if (!empty(($_POST['psuedo'])) || !empty(($_POST['email']))) {

        $psuedo = htmlspecialchars($_POST['psuedo']);

        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        if (!empty(($_POST['mdp'])) || !empty(($_POST['mpd']))) {

            $mpd = sha1($_POST['mpd']);

            $mdp = sha1($_POST['mdp']);

            if ($mdp === $mpd) {

                $insertUser = $db->prepare('INSERT INTO users(psuedo,email,mdp) VALUES(?,?,?)');

                $insertUser->execute(array($psuedo, $email, $mdp));
               

                $recupUser = $db->prepare('SELECT * FROM users WHERE psuedo = ? AND mdp = ?');
                $recupUser->execute(array($psuedo, $email));
            


                if ($recupUser->rowCount() > 0) {

                    $_SESSION['psuedo'] = $psuedo;

                    $_SESSION['mdp'] = $mdp;

                    $_SESSION['email'] = $email;

                    $_SESSION['id'] = $recupUser->fetch()['id'];

                    setcookie(['email', $email , 'psuedo',$psuedo ,['expires' => time() + 365 * 24 * 3600, 'secure' => true, 'httponly' => true,]]);

                    header("location: index.php");

                }
            
            } else  
            $verif = "true";    

        } 
    } 

        
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription</title>
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
                                    <h2 class="text-uppercase text-center mb-5">Creer un Compte</h2>

                                  

                                        
                                        <form method="POST" action="?profile=administrateur&ressource=inscription" class="inscrit-form">

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="psuedo">Prenom <span
                                                        style ="color:<?= ((isset($_POST['submit'])) && (empty($donnees["psuedo"]))) ? 'red' : "bleu" ?>"><sup>*</sup></span></label>
                                                <input type="text" id="psuedo" class="form-control form-control-lg"
                                                    name="psuedo" value="<?= (isset($donnees["psuedo"]) && (!empty($donnees["psuedo"]))) ? $donnees["psuedo"] : "" ?>" placeholder="John" />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="email">Email <span 
                                                style ="color:<?= ((isset($_POST['submit'])) && (empty($donnees["email"]))) ? 'red' : "bleu" ?>"  ><sup>*</sup></span></label>
                                                <input type="email" id="form3Example3cg"
                                                    class="form-control form-control-lg" name="email" value="<?= (isset($donnees["email"]) && (!empty($donnees["email"]))) ? $donnees["email"] : "" ?>"
                                                    placeholder="john@gmail.com" />
                                            </div>

                                            <div class="form-outline mb-4">

                                                <label class="form-label" for="mdp">Mot de Passe <span
                                                style ="color:<?= ((isset($_POST['submit'])) && (empty($donnees["mdp"]))) || ((isset($_POST['submit'])) &&!($mdp === $mpd) )? 'red' : "bleu" ?>"><sup>*</sup></span></label>
                                                <input type="password" id="mdp" class="form-control form-control-lg"
                                                    name="mdp" value="<?= (isset($donnees["mdp"]) && (!empty($donnees["mdp"]))) ? $donnees["mdp"] : "" ?>" placeholder="********" />

                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="mpd">Mot de Passe <span
                                                style ="color:<?= ((isset($_POST['submit'])) && (empty($donnees["mpd"]))) || ((isset($_POST['submit'])) &&!($mdp === $mpd) ) ? 'red' : "bleu" ?>"><sup>*</sup></span></label>
                                                <input type="password" id="mpd" class="form-control form-control-lg"
                                                    name="mpd" value="<?= (isset($donnees["mpd"]) && (!empty($donnees["mpd"]))) ? $donnees["mpd"] : "" ?>" placeholder="********" />

                                            </div>

                                            <div class="form-check d-flex justify-content-center mb-5">
                                                <input class="form-check-input me-2" type="checkbox" value="oui"
                                                    id="form2Example3cg" />
                                                <label class="form-check-label" for="form2Example3g">
                                                    I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                            service</u></a>
                                                </label>
                                            </div>
                                       

                                        <div class="d-flex justify-content-center">
                                            <button type="submit"
                                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body"
                                                name="submit">Inscription</button>
                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0">J'ai deja un compte? <a
                                                href="?profile=administrateur&ressource=connexion" class="fw-bold text-body"><u>Connexion</u></a></p>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>