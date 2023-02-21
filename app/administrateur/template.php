<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Admin|Template</title>
</head>

<body>
    <div class="presentation">

        <h1><span class="orange">Y</span>oupi</h1>
        <h2>Bienvenue sur le site officiel de Youpi</h2>
        <h3><b>Administrateur</b></h3>
        <?php

        if (isset($_GET["ressource"]) && !empty($_GET["ressource"])) {

            switch ($_GET["ressource"]) {

                case "connexion":
                    require "app/administrateur/connexion/connexion.php";
                    break;

                case "connexion-traitement":
                    require "app/administrateur/connexion/connexion-traitement.php";
                    break;

                case "inscription":
                    require "app/administrateur/inscription/inscription.php";
                    break;

                case "inscription-traitement":
                    require "app/administrateur/inscription/inscription-traitement.php";
                    break;

                case "mot-de-passe-oublier":
                    require "app/administrateur/mot-de-passe-oublier/mot-de-passe-oublier.php";
                    break;

                default:
                    require "app/administrateur/connexion/connexion.php";
                    break;
            }
        } else {
            require "app/administrateur/inscription/inscription.php";
        }

        ?>

    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/js/adminlte.min.js"></script>
</body>

</html>