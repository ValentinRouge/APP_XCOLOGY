<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if(isset($_GET['id']))
{
    include 'connectionToBDD.php';

    $id = mysqli_real_escape_string($connection,htmlspecialchars($_GET['id']));

    if($id !== "")
    {
        $requete = "DELETE FROM FAQ WHERE FAQ_id = '$id'";
        $exec_requete = mysqli_query($connection,$requete);
        
        header("Location: admin-panel.php");
    }
    else
    {
       header('Location: admin-panel.php');
    }
}
else
{
   header('Location: admin-panel.php');
}
?>