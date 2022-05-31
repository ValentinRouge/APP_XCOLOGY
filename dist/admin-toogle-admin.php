<?php

if(isset($_GET['id']) && isset($_GET['adm']))
{
    include 'php_func/connectionToBDD.php';

    $id = mysqli_real_escape_string($connection,htmlspecialchars($_GET['id']));
    $adm = mysqli_real_escape_string($connection,htmlspecialchars($_GET['adm']));


    if($id !== "" && $adm !== "")
    {
        if ($adm == '1'){
            $newAdm=0;
        } else {
            $newAdm = 1;
        }

        $requete = "UPDATE User SET admin = '$newAdm' WHERE User_id = '$id' ";
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