<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/output.css">

        <title>Mon compte</title>
    </head>
    <body class="bg-XBlueLight">
        <?php 
            include 'header.php';
            include 'connectionToBDD.php';
            if(session_status() !== PHP_SESSION_ACTIVE) session_start();

            $connexionID = $_SESSION['sessionID'];

            $requete = "SELECT user_id FROM connexion WHERE connexion_id = '$connexionID'";
            $exec_requete = mysqli_query($connection,$requete);
            $value = $exec_requete->fetch_assoc();
            
            $userID = $value['user_id'];

            $requete = "SELECT * FROM User WHERE User_id = '$userID'";
            $exec_requete = mysqli_query($connection,$requete);
            $value = $exec_requete->fetch_assoc();

            $UserPeusdo = $value['Pseudo'];
            $UserFName = $value['firstName'];
            $UserLName = $value['lastName'];
            $UserEmail = $value['email'];




        ?>

        <div class="mt-5 pl-40">
            <h1 class="text-3xl mb-2">Bonjour <?php echo $UserPeusdo ?> 👋</h1>

            <h2 class="font-medium text-xl">Vos informations de compte : </h2>
            <p>Nom : <?php echo $UserLName ?></p>
            <p>Prénom : <?php echo $UserFName ?></p>
            <p>Adresse mail : <?php echo $UserEmail ?></p>


        </div>

        <div class="mt-5 pl-40">
            <form action="admin-update-profile.php" method="POST">
                <h1 class="text-3xl mb-2"> Bonjour <input type="text" value="<?php echo $UserPeusdo ?>"></input>👋<h1>

                <h2 class="font-medium text-xl">Vos informations de compte : </h2>
                <p>Nom : <input type="text" value="<?php echo $UserLName ?>"></input></p>
                <p>Prénom : <input type="text" value="<?php echo $UserFName ?>"></input></p>
                <p>Adresse mail : <input type="text" value="<?php echo $UserEmail ?>"></input></p>
            </form>

        </div>
        
        <?php include 'html/footer.html'?>

    </body>
</html>