<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/output.css">

        <title>Mon compte</title>
    </head>
    <body class="bg-XBlueLight min-h-screen">
        <?php 
            include 'header.php';
            include 'php_func/connectionToBDD.php';
            if(session_status() !== PHP_SESSION_ACTIVE) session_start();

        
            if (isset($_SESSION['connected'])){
                if ($_SESSION['connected']==1){

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

                    <div class="min-h-[70vh]">
                        <div class='mt-5 mb-5 md:mt-10 pl-40' id="view-account">
                            <img src="./img/pen.svg" alt="un stylo pour modifier" class="h-10 float-right pr-40 cursor-pointer transition-all ease-in-out hover:scale-105 duration-300 motion-reduce:transition-none motion-reduce:hover:transform-none" id="editBTN">
                            <h1 class="text-3xl mb-2">Bonjour <?php echo $UserPeusdo ?> 👋</h1>

                            <h2 class="font-medium text-xl">Vos informations de compte : </h2>
                            <p>Nom : <?php echo $UserLName ?></p>
                            <p>Prénom : <?php echo $UserFName ?></p>
                            <p>Adresse mail : <?php echo $UserEmail ?></p>

                        </div>

                        <div class="my-5 pl-40 hidden transition-all" id="modify-account">
                            <img src="./img/close.svg" alt="un stylo pour modifier" class="h-10 float-right pr-40 cursor-pointer transition-all ease-in-out hover:scale-105 duration-300 motion-reduce:transition-none motion-reduce:hover:transform-none" id="closeBTN">
                            <form action="admin-update-account.php" method="POST">
                                <h1 class="text-3xl mb-2"> Bonjour <input id="ChampPseudo" type="text" name="Pseudo" value="<?php echo $UserPeusdo ?>" required></input>👋<h1>

                                <h2 class="font-medium text-xl">Vos informations de compte : </h2>
                                <p>Nom : <input id="ChampNom" type="text" name="LName" value="<?php echo $UserLName ?>" required></input></p>
                                <p>Prénom : <input id="ChampPrénom" type="text" name="FName" value="<?php echo $UserFName ?>" required></input></p>
                                <p>Adresse mail : <input id="ChampMail" type="email" name="Email" value="<?php echo $UserEmail ?>" required></input></p>
                                <p class="text-sm text-red-800 hidden" id="erreurSTRINGAccount">Les mots de passe ne sont pas identiques</p>
                                <input type="submit" value="Sauvegarder" id="saveAccBTN" class="cursor-pointer px-2 mt-2 py-1 rounded bg-XBlueMiddle text-white hover:bg-XBlueStrong hover:text-XBlueLight transition animate-pulse">
                            </form>
                        </div>

                        <div id="changePasswordBTN"><button class="ml-40 cursor-pointer px-2 py-1 rounded bg-XBlueMiddle text-white hover:bg-XBlueStrong hover:text-XBlueLight transition">Modifier mon mot de passe</button><br></div>
                        <div class = "ml-40 hidden" id="changePassword">
                            <form action="admin-update-password.php" method="POST">
                                <p>Nouveau mot de passe : <input type="password" name="pass" id="pass" required></p>
                                <p>Confirmation de mot de passe : <input type="password" name="pass2" class="mt-1" id="pass2" required></p>
                                <p class="text-sm text-red-800 hidden" id="erreurSTRING">Les mots de passe ne sont pas identiques</p>
                                <input type="submit" value="Sauvegarder" id="savePassBTN" class="cursor-pointer px-2 mt-1 animate-pulse py-1 rounded bg-XBlueMiddle text-white hover:bg-XBlueStrong hover:text-XBlueLight transition">
                            </form>
                        </div>
                        <form action="admin-delete-ac$count.php" method="POST" class="ml-40 mb-5">
                            <input type="submit" value="Supprimer mon compte" class="cursor-pointer text-red-600">
                        </form>
                    </div>
                    
                    
                    <?php include 'html/footer.html'?>
                    <script src="./js/mon-compte.js"></script>
                    <?php
                } 
            }
        ?> 

    </body>
</html>