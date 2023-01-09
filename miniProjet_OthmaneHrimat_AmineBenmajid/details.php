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
    <title>details</title>
</head>
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


        <div class="text text-center">
            <h1>les données du client:</h1>
        </div>



      </div>
</nav>
    <?php
    include "DB.php";
    $id=$_GET['id'];
    $sql="select * from client where numClient =$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo'    <br><br><div class="text text-center">
                <h2 class="text text-center" style="font-family:italic">Les données du client :</h2>
                    </div>';


echo '<div class="container">
<table class="table table-hover text-center">
<thead class="table table-success table-striped">
  <br>
    <th scope="col">nom Complet </th>
    <th scope="col">Raison Social</th>
    <th scope="col">Adresse</th>
    <th scope="col">Ville</th>
    <th scope="col">Pays</th>
    <th scope="col">télephone</th>

 
  </thead>
  <tbody>
  <td>'.$row['nomClient'];
  echo'</td>';
  echo'<td>'.$row['raisonSocial'];
  echo'</td>';
  echo'<td>'.$row['adresseClient'];
  echo'</td>';
 echo' <td>'.$row['villeClient'];
 echo'</td>';
  echo'<td>'.$row['pays'];
  echo'</td>';
  echo'<td>'.$row['telephone'];
  echo'</td>';
  echo'</tbody>
  </table>
  </div>
  '
  ;
  


    $sql="select * from commande where numClient =$id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        echo '<h1>La Liste Des Commandes:</h1>

        <div class="container">
       
        <table class="table table-hover text-center">
        <thead class="table table-success table-striped">
        <tr>
            <th scope="col">Id commande</th>
            <th scope="col">Id client</th>
            <th scope="col">Date du commande</th>
        
    
        </tr>';
    }
    else{
      echo '<br><br><h2 class="text text-center">Data not found</h2>';
    }
    while ($row = mysqli_fetch_assoc($result)) {
?>
<tbody>
  
        <td><?php echo $row['numCommande'] ?> </td>
        <td><?php echo $row['numClient'] ?> </td>
        <td><?php echo $row['dateCommande'] ?> </td>
  
    <tbody>
    <?php
    }
    ?>
</body>
</html>