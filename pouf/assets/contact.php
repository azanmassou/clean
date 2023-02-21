<?php


session_start();


/*
if (isset($_SESSION['mdp']) && !empty($_SESSION["mdp"])) {
header("location: index.php ");
}
else 
header("location: connexion.php");
*/

if (isset($_FILES["avatar"])) {

  if (isset($_FILES["avatar"]["error"]) && 0 == $_FILES["avatar"]["error"]) {

    if (isset($_FILES["avatar"]["size"])& $_FILES["avatar"]["size"] <= 1000000) {

      $type_extension = explode("/", $_FILES["avatar"]["type"]);

      if (isset($type_extension[1]) && !empty($type_extension[1])) {

        $extensions_autorisees = ["png", "jpg", "jpeg" . "gif"];

        if (in_array($type_extension[1], $extensions_autorisees)) {

          if (!is_dir("uploads")) {

            mkdir("uploads");

          }
          move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/' . basename($_FILES['avatar']['name']));

          echo "Youppiii. L'upload a été efectué avec succès.";

        } else {

          echo "L'extension du fichier soumit n'est pas autorisée. Veuillez soumettre un fichier dont l'extension est png, jpg, jpeg ou gif";
        }
      }
    } else {

      echo "La taille du fichier est supérieur a 1 Mo.";
    }
  } else {

    echo "Une erreur s'est produite";
  }
} else {
  
  echo "NOT OK";
}



?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>contact</title>
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
                  <h2 class="text-uppercase text-center mb-5">Contacter-Nous</h2>

                  <form>
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="psuedo">Psuedo</label>
                      <input type="text" id="psuedo" class="form-control" name="psuedo" />

                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" id="email" class="form-control" name="email" />
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="msg">Message</label>
                      <textarea class="form-control" id="msg" rows="4" name="msg"></textarea>
                    </div>

                    <!-- Pic input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="avatar"></label>
                      <input type="file" name="avatar" id="avatar">

                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />
                      <label class="form-check-label" for="form4Example4">
                        Send me a copy of this message
                      </label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
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