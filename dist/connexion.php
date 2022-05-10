<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="css/connexion.css">
    
</head>
<body>
    <?php 
        include 'html/header.html';
    ?>

    <center>
        <fieldset>
            
            <form action="admin-verif-login.php" method="POST">
                <h1>Connexion</h1>
                <hr>
                <table>
                    <input type="email" placeholder="Entrer le nom d'utilisateur" name="username" required><br/>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required><br/>
                    <input type="submit" name="formlogin" id="formlogin" value="Se connecter">
                </table>        
            </form>
            <?php
                session_start();
                if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2)
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
            ?>
        </fieldset>
    </center>

    <?php
        include 'html/footer.html';
    ?>
</body>

</html>


