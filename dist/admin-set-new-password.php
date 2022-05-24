<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if(isset($_POST['pass']) && isset($_POST['pass2']))
{
    include 'connectionToBDD.php';

    $pass = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass'])); 
    $pass2 = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass2']));
    $connID = $_GET['id'];

    if($pass !== "" && $pass2 !== "" && $pass == $pass2)
    {
        $passwordHash = password_hash($pass, PASSWORD_DEFAULT);
        $requete = "UPDATE User SET password = '$passwordHash'
        WHERE User_id = (SELECT User_id FROM password_reinitialisation WHERE pass_relnit_ID = '$connID')";
        $exec_requete = mysqli_query($connection,$requete);
        
        header("Location: connexion.php?erreur=4");
    }
    else
    {
        header("Location: connexion.php");
    }
}
else
{
    header("Location: connexion.php");
}
?>