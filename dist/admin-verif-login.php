<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

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
            $reponse = mysqli_fetch_array($exec_requete);
            $userID = $reponse['User_id'];
            $requete = "INSERT INTO connexion (connexion_id, user_id) VALUES (UUID(),'$userID')";
            $exec_requete = mysqli_query($connection,$requete);
            if ($exec_requete){
                $requete = "SELECT connexion_id FROM connexion where user_id = '$userID' order by time DESC LIMIT 1";
                $exec_requete = mysqli_query($connection,$requete);
                $value = $exec_requete->fetch_assoc();

                $connexionID = $value['connexion_id'];
                $_SESSION['admin'] = $reponse['admin'];
                $_SESSION['connected'] = 1;
                $_SESSION['sessionID'] = $connexionID;

                header("Location: mon-compte.php");
            }
            
            //header('Location: admin-panel.php');
        }
        else
        {
           header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: connexion.php');
}
?>