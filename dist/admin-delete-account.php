<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();


include 'connectionToBDD.php';

$connID = $_SESSION['sessionID'];


$requete = "DELETE c.*, u.* FROM connexion c INNER JOIN User u on u.User_id = c.user_id
WHERE c.connexion_id = '$connID'";
$exec_requete = mysqli_query($connection,$requete);

header("Location: deconnexion.php");

?>