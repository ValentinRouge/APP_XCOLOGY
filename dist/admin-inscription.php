<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['pseudo']))
{
    include 'connectionToBDD.php';

    $username = mysqli_real_escape_string($connection,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($connection,htmlspecialchars($_POST['password']));
    $password2 = mysqli_real_escape_string($connection,htmlspecialchars($_POST['password2']));
    $pseudo = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pseudo']));

    if($username !== "" && $password !== "" && $password2 !== "" && $pseudo !== "")
    {
        $requete = "INSERT INTO User (Pseudo, password, admin, email) VALUES ('$pseudo','$password', 0, '$username')";
        $exec_requete = mysqli_query($connection,$requete);
        if ($exec_requete){
            $_SESSION['username'] = $pseudo;
            $_SESSION['admin'] = 0;
            $_SESSION['connected'] = 1;
            header('Location: admin-panel.php');
        } else {
            header('Location: inscription.php');
        }

    }
    else
    {
       header('Location: inscription.php?erreur=2');
    }
}
else
{
   header('Location: inscription.php');
}
?>