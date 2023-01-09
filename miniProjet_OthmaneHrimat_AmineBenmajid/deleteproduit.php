<?php
include "DB.php";
$id=$_GET['id'];

$sql="INSERT INTO archive_produit (refProduit, nomProduit, prixUnitaire, qteStocke, indisponible) 
select refProduit, nomProduit, prixUnitaire, qteStocke, indisponible from produit where refProduit=$id;";
$result = mysqli_query($conn, $sql);

$sql = "INSERT INTO archive_detailscommande (refProduit, numCommande, qteCommmande) 
select refProduit, numCommande, qteCommmande
from detailscommande where refProduit=$id;";
$result = mysqli_query($conn, $sql);

$sql="delete from produit where refProduit=$id;";
$result = mysqli_query($conn, $sql);

$sql="delete from detailscommande where refProduit=$id;";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Failed: " . mysqli_error($conn);
}
else
{
    header('location:produit.php');
}


?>



