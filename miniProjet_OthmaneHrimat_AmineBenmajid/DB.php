<?php
$server_name="localhost";
$username="root";
$password="";
$db="gestion_commerciale";

$conn = mysqli_connect($server_name,$username,$password,$db);

if(!$conn)
{
    die("connection failed:".mysqli_connect_error());
}
else{
    //echo "connection succesfully";
}
?>