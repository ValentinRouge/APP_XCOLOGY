<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <!-- css -->
    <link rel="stylesheet" href="css/Inscription.css">
    <!-- css -->
</head>
<body>

    <?php 
        include 'header.php' ; 
    ?>
    
    <fieldset>
            
        <form method="POST" action="admin-inscription.php">
            <hr>
            <div class="SignIn-box">
                <div class="textbox">
                    <input type="text" name="pseudo" id="pseudo" placeholder="Votre peusdo" required><br/>
                    <input type="text" name="nom" id="nom" placeholder="Votre nom" required><br/>
                    <input type="text" name="prenom" id="prenom" placeholder="Votre prenom" required><br/>
                    <input type="email" name="username" id="username" placeholder="Votre email" required><br/>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required><br/>
                    <input type="password" name="password2" id="password2" placeholder="Confirmez votre mot de passe" required><br/>
                    <input type="button" class="btn" value=" S'inscrire">
                </div>
            </div>
        </form>
        <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:red'>Les mots de passe ne sont pas identiques</p>";
            }
        ?>
    </fieldset>
    

    <?php
        include 'html/footer.html';
    ?>

</body>
</html>



