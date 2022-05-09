<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    include 'connectionToBDD.php';
    // connexion à la base de données
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($connection,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($connection,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT User_id, admin FROM User where 
              email = '".$username."' AND password = '".$password."' ";
        $exec_requete = mysqli_query($connection,$requete);
        $count = mysqli_num_rows($exec_requete);
        if($count==1) // nom d'utilisateur et mot de passe correctes
        {
            $reponse      = mysqli_fetch_array($exec_requete);
            $_SESSION['username'] = $reponse['User_id'];;
            $_SESSION['admin'] = $reponse['admin'];
            header('Location: admin-panel.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
?>