<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['pseudo']))
{
    include 'connectionToBDD.php';

    $username = mysqli_real_escape_string($connection,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($connection,htmlspecialchars($_POST['password']));
    $password2 = mysqli_real_escape_string($connection,htmlspecialchars($_POST['password2']));
    $pseudo = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pseudo']));
    $firstName = mysqli_real_escape_string($connection,htmlspecialchars($_POST['prenom']));
    $lastName = mysqli_real_escape_string($connection,htmlspecialchars($_POST['nom']));

    if ($password !== $password2){
        header('Location: inscription.php?erreur=1');
        exit();
    }

    if($username !== "" && $password !== "" && $password2 !== "" && $pseudo !== "")
    {
        $requete = "INSERT INTO User (Pseudo, password, admin, email, lastname, firstname) VALUES ('$pseudo','$password', 0, '$username','$lastName','$firstName')";
        $exec_requete = mysqli_query($connection,$requete);
        if ($exec_requete){
            $_SESSION['username'] = $pseudo;
            $_SESSION['admin'] = 0;
            $_SESSION['connected'] = 1;
            $_SESSION['sessionID'] = 0;
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