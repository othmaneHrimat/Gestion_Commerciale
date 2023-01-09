<?php
include "DB.php";
$id=$_GET['id'];

$sql="INSERT INTO archive_commande (numCommande, numClient, dateCommande) 
select numCommande, numClient, dateCommande from commande where numClient=$id;";
$result = mysqli_query($conn, $sql);

$sql = "INSERT INTO archive_client ( numClient, nomClient, raisonSocial, adresseClient, villeClient, pays, telephone) 
select numClient, nomClient, raisonSocial, adresseClient, villeClient, pays, telephone 
from client where numClient=$id;";
$result = mysqli_query($conn, $sql);

$sql="delete from client where numClient=$id;";
$result = mysqli_query($conn, $sql);

$sql="delete from commande where numClient=$id;";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Failed: " . mysqli_error($conn);
}
else
{
    header('location:client.php');
}


?>



