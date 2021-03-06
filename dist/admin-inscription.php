<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['pseudo']))
{
    include 'php_func/connectionToBDD.php';

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
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $requete = "INSERT INTO User (Pseudo, password, admin, email, lastname, firstname) VALUES ('$pseudo','$passwordHash', 0, '$username','$lastName','$firstName')";
        $exec_requete = mysqli_query($connection,$requete);
        if ($exec_requete){
            $userID = mysqli_insert_id($connection);
            $requete = "INSERT INTO connexion (connexion_id, user_id) VALUES (UUID(),'$userID')";
            $exec_requete = mysqli_query($connection,$requete);
            if ($exec_requete){
                $requete = "SELECT connexion_id FROM connexion where user_id = '$userID' order by time DESC LIMIT 1";
                $exec_requete = mysqli_query($connection,$requete);
                $value = $exec_requete->fetch_assoc();

                $connexionID = $value['connexion_id'];
                $_SESSION['admin'] = 0;
                $_SESSION['connected'] = 1;
                $_SESSION['sessionID'] = $connexionID;

                header("Location: mon-compte.php");

            }

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