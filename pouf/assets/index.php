<?php

/*
@ Initialisation de Cookie et Session 
@ Qui permet de sauvegarder des information sur le user
@ retenir l'email de la personne connectée pendant 1 an
*/

session_start();




?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <title>index.php</title>
</head>

<body>
    <?php if (isset($_SESSION['mdp'])) { ?>

        <?php include_once('header.php') ?>



        <h2><?= htmlspecialchars($_COOKIE['email']) ?></h2>


        <h2><?= htmlspecialchars($_SESSION['mdp']) ?></h2>

    <?php } ?>

    <?php if (!isset($_SESSION['mdp']) || empty($_SESSION['mdp'])) { ?>

        <div class="presentation">

            <h1><span class="orange">Y</span>oupi</h1>
            <h2>Bienvenue sur le site officiel de Youpi</h2>
            <h3>Meilleurs Site de Rencontre</h3>
            <div class="lmoves">
                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab-login" href="inscription.php" role="tab"
                            aria-controls="pills-login" aria-selected="true">Inscription</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab-register" href="connexion.php" role="tab" aria-controls="pills-register"
                            aria-selected="false">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
        <section>
            <div id="carouselExampleCaptions" class="carousel slide" data-mdb-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/th (2).jpeg" class="d-block w-100"
                            alt="Wild Landscape" />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Irene Duval</h5>
                            <p>Celibataire de 30 ans</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/th.jpeg" class="d-block w-100" alt="Camera" />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Lopen Green</h5>
                            <p>Veuve de 38 ans</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/th (4).jpeg" class="d-block w-100"
                            alt="Exotic Fruits" />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Dora Muchet</h5>
                            <p>Divorce de 26 ans</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleCaptions"
                    data-mdb-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Precedent</span>
                </button>
                <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleCaptions"
                    data-mdb-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Suivant</span>
                </button>
            </div>
        </section>
    <?php } ?>


    <?php if (isset($_SESSION['mdp'])) { ?>

        <?php include_once('footer.php') ?>

    <?php } ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

</body>

</html>