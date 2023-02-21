<?php


session_start();



session_start();

if (isset($_SESSION['mdp']) && !empty($_SESSION["mdp"])) {

    header("location: index.php ");

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <?php include_once('header.php'); ?>
    </header>
    <section>
        <h1>Bienvenue <?php  $_SESSION['psuedo']?></h1>
    </section>
    

    <footer>
        <?php include_once('footer.php'); ?>
    </footer>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</body>

</html>