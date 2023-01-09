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
        <?php
        if(isset($_GET['msg'])){
            $msg=$GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
           '.$msg;
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
   <br><br>
<a href="index.php" class="btn btn-dark mb-5"><i class="bi bi-arrow-down-left-square-fill">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg>  Accueil</i> </a>

       




        <table class="table table-hover text center ">
  <thead class="table table-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">nom et prénom</th>
      <th scope="col">raison_social</th>
      <th scope="col">adresse</th>
      <th scope="col">ville</th>
      <th scope="col">pays</th>
      <th scope="col">telephone</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  <?php
 include "DB.php";
        $sql="select * from client";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
        ?>

    <tr>
       <tr>
            <td><?php echo $row['numClient'] ?> </td>
            <td><?php echo $row['nomClient'] ?> </td>
            <td><?php echo $row['raisonSocial'] ?> </td>
            <td><?php echo $row['adresseClient'] ?> </td>
            <td><?php echo $row['villeClient'] ?> </td>
            <td><?php echo $row['pays'] ?> </td>
            <td><?php echo $row['telephone'] ?> </td>
            <td>
       
            
       <a href="editclient.php?id=<?php echo $row['numClient']?> " class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
       <a href="deleteclient.php?id=<?php echo $row['numClient']?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
      </td>
        </tr>
        <?php
        }
        ?>
  

  </tbody>
</table>
<a href="addclient.php" class="btn btn-dark mb-5"> <i class="bi bi-arrow-down-left-square-fill">
       Ajouter client</i> </a>
        <a href="searchclient.php" class="btn btn-dark mb-5"><i class="bi bi-arrow-down-left-square-fill">
     chercher à un client</i> </a>
    </div>
</body>
</html>