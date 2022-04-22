<?php
session_start();
if(isset($_POST['Identifiant']) && isset($_POST['motdepasse']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'mot_de_passe_bdd';
    $db_name     = 'nom_bdd';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    //mysqli_real_escape_string et htmlspecialchars attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['Identifiant'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['motdepasse']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
              nom_utilisateur = '".$username."' and mot_de_passe = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['Identifiant'] = $username;
           header('Location: connected.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); 
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); 
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db);
?>