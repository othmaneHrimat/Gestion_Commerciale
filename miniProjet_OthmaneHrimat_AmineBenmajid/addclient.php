<?php
include "DB.php";
//ajouter

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
     integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

      <title>Ajouter Client</title>

<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container">
        <a class="navbar-brand" href="index.php">Gestion commerciale</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="client.php">Client</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produit.php">Produit</a>
            </li>
            
          </ul>
        </div>
      </div>
</nav>
    <div class="container">
    <br><br>
    <a href="client.php" class="btn btn-dark"><i class="bi bi-arrow-down-left-square-fill">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg>   gestion des clients</i> </a>

<?php
     if(isset($_POST['ajouter'])) {
        $nom = $_POST['nom'];
        $raison_social = $_POST['raison_social'];
        $adresse = $_POST['adresse'];
        $ville = $_POST[ 'ville'];
        $pays = $_POST[ 'pays'];
        $telephone = $_POST[ 'telephone'];
        
        $sql = "INSERT INTO client VALUES (NULL,'$nom', '$raison_social', '$adresse', '$ville', '$pays','$telephone')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Failed: " . mysqli_error($conn);
        }
        else
        {
            echo ' <br><br><div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert"> Ajouter avec succés
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        }
        }

?>
        <div class="text-center mb-4">
        <h2 style="font-family:italic">Ajouter un nouveau client</h2>
            <p class="text-muted"> Completer le formulaire ci-dessous pour ajouter un nouveau client</p>
        </div>
        <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width:50vw; min-width:300px ;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Nom :</label>
                            <input type="text" class="form-control" name="nom" placeholder="Saisir le nom" required>
                        </div>

                        <div class="col">
                            <label class="form-label">Raison social :</label>
                            <input type="text" class="form-control" name="raison_social" placeholder="Saisir la raison social" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                            <label class="form-label">Adresse :</label>
                            <input type="text" class="form-control" name="adresse" placeholder="Saisir l'adresse" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Ville :</label>
                            <input type="text" class="form-control" name="ville" placeholder="Saisir la ville">
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                            <label class="form-label">Pays :</label>
                            <input type="text" class="form-control" name="pays" placeholder="Saisir le pays" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Téléphone :</label>
                            <input type="tel" class="form-control" name="telephone" placeholder="Saisir le numéro de téléphone">
                        </div>
                    </div>
                <div>
                    
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-success" name="ajouter" >Ajouter</button>
                    </div>

                </div>
                </form>
        </div>
</div>
</body>
</html>