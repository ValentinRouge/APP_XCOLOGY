<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if(isset($_POST['pass']) && isset($_POST['pass2']))
{
    include 'php_func/connectionToBDD.php';

    $pass = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass'])); 
    $pass2 = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass2']));
    $connID = $_SESSION['sessionID'];

    if($pass !== "" && $pass2 !== "" && $pass == $pass2)
    {
        $passwordHash = password_hash($pass, PASSWORD_DEFAULT);
        $requete = "UPDATE User SET password = '$passwordHash'
        WHERE User_id = (SELECT user_id FROM connexion WHERE connexion_id = '$connID')";
        $exec_requete = mysqli_query($connection,$requete);
        
        header("Location: mon-compte.php");
    }
    else
    {
        header("Location: mon-compte.php");
    }
}
else
{
    header("Location: mon-compte.php");
}
?>