<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="css/connexion.css">
    
</head>
<body>
    <?php 
        include 'header.php';
    ?>

    <center>
        <fieldset>
            
            <form action="admin-verif-login.php" method="POST">
                <h1>Connexion</h1>
                <hr>
                <table>
                    <input type="text" placeholder="Entrer votre pseudo ou mail" name="username" required><br/>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required><br/>
                    <input type="submit" name="formlogin" id="formlogin" value="Me connecter">
                </table>        
            </form>

            <a href="relnit-password.php">Reinitialiser mon mot de passe</a>

            <?php
                if(session_status() !== PHP_SESSION_ACTIVE) session_start();
                if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2){
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                        }
                        if ($err==3){
                            echo "<p style='color:white'>Vous avez reçu mail permettant de réinitialiser votre mot de passe.</p>";
                        }
                        if ($err==4){
                            echo "<p style='color:white'>Votre mot de passe a été modifié.</p>";
                        }
                    }
            ?>
        </fieldset>
    </center>

    <?php
        include 'html/footer.html';
    ?>
</body>

</html>


