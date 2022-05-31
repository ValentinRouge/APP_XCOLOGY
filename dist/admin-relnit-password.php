<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if(isset($_POST['username']))
{
    include 'php_func/connectionToBDD.php';
    include 'php_func/mail-func.php';
    // connexion à la base de données
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($connection,htmlspecialchars($_POST['username'])); 
    
    if($username !== "")
    {
        $requete = "SELECT User_id, email FROM User where 
              (email = '".$username."') OR (Pseudo = '".$username."')";
        $exec_requete = mysqli_query($connection,$requete);
        if($exec_requete){
            if (mysqli_num_rows($exec_requete) == 1){
                $values = $exec_requete->fetch_assoc();
                $userID = $values['User_id'];
                $email = $values['email'];
                $requete = "INSERT INTO password_reinitialisation (pass_relnit_ID, email, User_id) VALUES (UUID(), '$email', '$userID')";
                $exec_requete = mysqli_query($connection,$requete);
                if ($exec_requete){
                    $requete = "SELECT pass_relnit_ID FROM password_reinitialisation where User_id = '$userID' order by date_time DESC LIMIT 1";
                    $exec_requete = mysqli_query($connection,$requete);
                    $value = $exec_requete->fetch_assoc();
                    $passID = $value['pass_relnit_ID'];

                    $text = "Pour réinitialiser votre mot de passe cliquer sur le lien suivant : https://appg10b.herogu.garageisep.com/new-password.php?id=$passID";
                    
                    smtpMailer($email,"infinites.measure@gmail.com","Infinites Measure","Réinitialisation de mot de passe",$text);
                    
                    header("Location: connexion.php?erreur=3");
    
                }
            } else {
                header('Location: relnit-password.php?erreur=1'); // pas de compte liés
            }
        }
        else
        {
           header('Location: relnit-password.php?erreur=1'); // pas de compte liés
        }
    }
    else
    {
       header('Location: relnit-password.php?erreur=2'); // erreur
    }
}
else
{
   header('Location: connexion.php');
}


?>