<?php
include "DB.php";
$id=$_GET['id'];
//modifier
if(isset($_POST['modifier'])) {
$nom = $_POST['nom'];
$raison_social = $_POST['raison_social'];
$adresse = $_POST['adresse'];
$ville = $_POST[ 'ville'];
$pays = $_POST[ 'pays'];
$telephone = $_POST[ 'telephone'];

$sql = "update client set nomClient='$nom', raisonSocial='$raison_social', adresseClient='$adresse',
 villeClient='$ville', pays='$pays', telephone='$telephone' where numClient=$id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Failed: " . mysqli_error($conn);
}
else{
    ?> <h2>client modifié avec succès</h2> <?php
}
}
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

      <title>modifier Client</title>

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
        <div class="text-center mb-4">
        <h2 style="font-family:italic">Modifier le client</h2>
            <p class="text-muted"> clicker sur modifer après chaque modification des informations</p>
        </div>

        <?php
      
        $id=$_GET['id'];
        $sql="select * from client where numClient = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result)
        ?>
    
        <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width:50vw; min-width:300px ;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Nom :</label>
                            <input type="text" class="form-control" name="nom" value="<?php echo $row['nomClient'] ?>" required>
                        </div>

                        <div class="col">
                            <label class="form-label">Raison social :</label>
                            <input type="text" class="form-control" name="raison_social" value="<?php echo $row['raisonSocial'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                            <label class="form-label">Adresse :</label>
                            <input type="text" class="form-control" name="adresse" value="<?php echo $row['adresseClient'] ?> " required>
                        </div>
                        <div class="col">
                            <label class="form-label">Ville :</label>
                            <input type="text" class="form-control" name="ville" value="<?php echo $row['villeClient'] ?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                            <label class="form-label">Pays :</label>
                            <input type="text" class="form-control" name="pays"value="<?php echo $row['pays'] ?>" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Téléphone :</label>
                            <input type="tel" class="form-control" name="telephone" value="<?php echo $row['telephone'] ?>" >
                        </div>
                    </div>
                <div>
                    
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-success" value="modifier" name="modifier" >modifier</button>
                    </div>

                </div>
                </form>
        </div>
</div>
</body>
</html>
