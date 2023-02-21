<?php

$donnees = [];

$erreurs = [];

if (isset($_GET["donnees"]) && !empty($_GET["donnees"])) {

    $donnees = json_decode($_GET["donnees"], true);
}

if (isset($_GET["erreurs"]) && !empty($_GET["erreurs"])) {

    $erreurs = json_decode($_GET["erreurs"], true);
}

?>

<?php if (isset($_GET["message"]) && !empty($_GET["message"])) { ?>
    <div class="alert alert-success" role="alert">
        <p>
            <?= $_GET["message"]; ?>
        </p>
    </div>
<?php } ?>

<?php if (isset($_GET["erreur"]) && !empty($_GET["erreur"])) { ?>
    <div class="alert alert-danger" role="alert">
        <p>
            <?= $_GET["erreur"]; ?>
        </p>
    </div>
<?php } ?>