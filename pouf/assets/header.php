<?php




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
    <title>header.php</title>
</head>

<body>
    <header id="header">
        <div class="wrapper">
            <h1><span class="orange">Y</span>oupi</h1>
            <nav>
                <ul>
                    <li class="btn-1"><a href="index.php">Acceuil</a></li>
                    <li class="btn-1"><a href="recettes.php">Recettes</a></li>
                    <li class="btn-1"><a href="test.html">Fruits</a></li>
                    <li class="btn-1"><a href="">Qualite</a></li>
                    <li class="btn-1"><a href="contact.php">Contact</a></li>
                    <li><button class="btn-2"><i class="bi bi-person-add"><a href="deconnexion.php"></i>Deconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="well">
        <div class="wrapper">
            <div class="well">
                <h2>Bienvenue sur le site officiel de Youpi</h2>
                <h3>Meilleurs Site de Rencontre</h3>
            </div>
            <div id="search">
                <?php include_once('variables.php') ?>
                <form action="traitement.php" method="post">
                    <label for="search"></label>
                    <i class="bi bi-search"></i>
                    <input type="text" name="search" id="search">
                    <button type="submit" id="search" name="search">Search</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>