<?php
session_start();


/*
$firstname = $name = $email = $phone = $message = "";
$firstnamemError = $nameError = $emailError = $phoneError = $messageError = "";
$isSucces = false;
$emailto = 'azanmassouhappylouis@gmail.com';
if ($_SERVER("REQUEST_METHOD") = $_POST) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    $isSucces = true;
    $emailtext = "";
    if (empty($firstname)) {
        $isSucces = false;
        $firstnamemError = 'Je veux connaitre ton Prenom !!!';
    } else {
        $emailtext .= "First Name: $firstname\n ";
    }
    if (empty($name)) {
        $isSucces = false;
        $nameError = 'Et Oui.. Je veux connaitre meme ton nom';
    } else {
        $emailtext .= "Name: $name\n ";
    }
    if (empty($message)) {
        $isSucces = false;
        $messageError = 'Que suis-je sence savoir';
    } else {
        $emailtext .= "Message: $message\n ";
    }
    if (!isemail($email)) {
        $isSucces = false;
        $emailError = 'T\'essaies de me rouler ? C\'est pas un email ca ';
    } else {
        $emailtext .= "Email: $email\n ";
    }
    if (!isphone($phone)) {
        $isSucces = false;
        $phoneError = 'Que des chiffres et des espaces ... stp !!!';
    } else {
        $emailtext .= "Phone: $phone\n ";
    }
    if ($isSucces) {
        
        $headers = "From: $firstname $name<$email>\r\nReply-To: $email";
        mail($emailto, "Un message de mon site", $email, $headers);
        $firstname = $name = $email = $phone = $message = "";
        header("location:index.php?message=$isSucces");
    }
}





function isphone($var)
{
    $isSucces = false;
    return preg_match("/^[0-9 ]*$/", $var);
}
function isemail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}
function verifyinput($var)
{
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return;
}
*/

// Traitement Search


// Validation du formulaire

if(isset($_POST['valider']))
{
    if (isset($_POST['email']) &&  isset($_POST['password'])) {
        foreach ($users as $user) {
            if (
                $user['email'] === $_POST['email'] &&
                $user['password'] === $_POST['password']
            ) {
                $loggedUser = [
                    'email' => $user['email'],
                ];
            } else {
                $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                    $_POST['email'],
                    $_POST['password']
                );
            }
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
    <title>traitement.php</title>
</head>
<body>
    <footer>
        <?php include_once('header.php');?>
    </footer>
    <section>
        <h1>Youpi</h1>
        <h2>Bienvenue <?php echo($_POST['user']) ?></h2>
    </section>
    <section>
    <?php include_once('footer.php');?>
    </section>
</body>
</html>
<?php 






