<?php
include "DB.php";
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
    <a href="produit.php" class="btn btn-dark"><i class="bi bi-arrow-down-left-square-fill">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg> gestion des produits</i> </a>

        <div class="text-center mb-4">
        <h2  style="font-family:italic"> Chercher un produit</h2>
            <p class="text-muted"> Saisir les critères que vous voulez pour trouver votre produit</p>
        </div>

    <br>
   
  
    
    <form method="post">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-6">
    <input type="number" min="0" name="search" class="form-control" placeholder="saisir le code du produit" required>
         </div>
<br>
        <div class="col-2">
    <div class="d-grid ">
  <button type="submit" class="btn btn-primary btn-block" name="done">chercher</button>
  </div>
</div>
    </form>
    <br><br>





    <?php

    if(isset($_POST['done'])) {
        $name=$_POST['search'];
        $sql="select * from produit where refProduit like '$name%' order by refProduit";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            echo ' <br><h2 class="text text-center" style="font-family:italic">La Liste Des produits:</h2><br>
            <table class="table table-hover text-center">
            <thead class="table table-success table-striped">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom du produit</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité du stock</th>
                <th scope="col">Indispensable</th>
                <th scope="col">Action</th>
          
              </tr>
                ';
        }
        else{
            echo '<br><br><h3 class="text text-center">Aucun Produit avec ce code !</h2>';
        }
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['refProduit'] ?> </td>
            <td><?php echo $row['nomProduit'] ?> </td>
            <td><?php echo $row['prixUnitaire'] ?> </td>
            <td><?php echo $row['qteStocke'] ?> </td>
            <td><?php echo $row['indisponible'] ?> </td>
            <td>
                <a href="editproduit.php?id=<?php echo $row['refProduit']?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="deleteproduit.php?id=<?php echo $row['refProduit']?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
        </tr>
        <?php
        }
        }
        ?>
    </table>
    <br>
        <div class="text text-center">
        <h3<br><br><h2 class="text text-center" style="font-family:italic">Lister les produits inférieur à une quantité en stock:</h3><br>
        </div>
   
    <form method="post">
    <div class="row" >
        <div class="col-2"></div>
        <div class="col-6">
    <input type="number" min="0" name="search2" class="form-control" placeholder="saisir la quantité en stock " required>
        </div>
   
    <div class="col-2">
     <div class="d-grid">
  <button type="submit" class="btn btn-primary bnt-block" name="done2">chercher</button>
  </div>
</div>
    </form>
    <br>
    <?php

    if(isset($_POST['done2'])) {
        
        $seuil=$_POST['search2'];
        $sql="select * from produit where qteStocke <= $seuil order by qteStocke";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            echo ' <br>
            <table bgcolor="black">
            <table class="table table-hover text-center">
            <thead class="table-dark">
              <tr>
                <th scope="col">id</th>
                <th scope="col">nom du produit</th>
                <th scope="col">prix</th>
                <th scope="col">quantité du stock</th>
                <th scope="col">indispensable</th>
                <th scope="col">action</th>
          
              </tr>';
        }
        else{
            echo '<br><br><h3 class="text text-center">Aucun produit trouvé ! </h3>';
        }
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <th><?php echo $row['refProduit'] ?> </th>
            <th><?php echo $row['nomProduit'] ?> </th>
            <th><?php echo $row['prixUnitaire'] ?> </th>
            <th><?php echo $row['qteStocke'] ?> </th>
            <th><?php echo $row['indisponible'] ?> </th>
            <th> <a href="editproduit.php?id=<?php echo $row['refProduit']?>" class="link-light"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                 <a href="deleteproduit.php?id=<?php echo $row['refProduit']?>" class="link-light"><i class="fa-solid fa-trash fs-5"></i></a>
            
            </th>
        </tr>
        <?php
        }
        }
        ?>
    </table>
    <br>   <br><br><br> 

</body>
</html>