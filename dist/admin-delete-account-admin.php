<?php
include 'connectionToBDD.php';

$UsrID = $_GET['id'];


$requete = "DELETE c.*, u.* FROM User u INNER JOIN connexion c on u.User_id = c.user_id
WHERE u.User_id = '$UsrID'";
$exec_requete = mysqli_query($connection,$requete);

header("Location: admin-panel.php");

?>