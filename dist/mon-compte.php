<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/output.css">

        <title>Capteur zone singe</title>
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


        ?>

        <h1>Bonjour <?php echo $UserPeusdo ?> 👋</h1>
        
        <?php include 'html/footer.html'?>

    </body>
</html>