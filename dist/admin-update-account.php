<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if(isset($_POST['Pseudo']) && isset($_POST['LName']) && isset($_POST['FName']) && isset($_POST['Email']))
{
    include 'connectionToBDD.php';

    $Pseudo = mysqli_real_escape_string($connection,htmlspecialchars($_POST['Pseudo'])); 
    $LName = mysqli_real_escape_string($connection,htmlspecialchars($_POST['LName']));
    $FName = mysqli_real_escape_string($connection,htmlspecialchars($_POST['FName']));
    $Email = mysqli_real_escape_string($connection,htmlspecialchars($_POST['Email']));
    $connID = $_SESSION['sessionID'];

    if($Pseudo !== "" && $LName !== "" && $FName !== "" && $Email !== "")
    {
        $requete = "UPDATE User SET Pseudo = '$Pseudo', email = '$Email', lastName = '$LName', firstName = '$FName'
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