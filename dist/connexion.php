<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/connexion.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body class="body">
    <?php 
        include 'header.php';
    ?>
    <div class="container2">
        <div class="wrapper">
            <h1 class="title">Connexion</h1>
            <form action="admin-verif-login.php" method="POST">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Entrer votre pseudo ou mail" name="username" required><br/>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required><br/>
                </div>
                <div class="pass"><a href="relnit-password.php">Reinitialiser mon mot de passe</a></div>
                <div class="row button">
                    <input type="submit" name="formlogin" id="formlogin" value="Me connecter">
                </div>
                <div class="signuplink">Vous n'êtes pas encore membre? <a href="inscription.php">Inscrivez vous</a></div>
            </form>

            <?php
                if(session_status() !== PHP_SESSION_ACTIVE) session_start();
                if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2){
                            echo "<p style='color:red;text-align:center'>Utilisateur ou mot de passe incorrect</p>";
                        }
                        if ($err==3){
                            echo "<p style='color:#0b8abc;text-align:center'>Vous avez reçu mail permettant de réinitialiser votre mot de passe.</p>";
                        }
                        if ($err==4){
                            echo "<p style='color:#0b8abc;text-align:center'>Votre mot de passe a été modifié.</p>";
                        }
                    }
            ?>
        </div>
    </div>
        
    <?php
        include 'html/footer.html';
    ?>
</body>

</html>


