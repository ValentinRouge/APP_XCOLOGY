<?php
include 'connectionToBDD.php';

$requete = "INSERT INTO connexion (connexion_id, user_id) VALUES (UUID(),32)";
$exec_requete = mysqli_query($connection,$requete);
echo mysqli_insert_id($connection);

?>
