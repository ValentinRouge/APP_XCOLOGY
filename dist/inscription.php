<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="css/inscription2.css">
    <script src="https://kit.fontawesome.com/0167946be9.js" crossorigin="anonymous"></script>
    <!-- css -->
</head>
<body>
    <?php 
        include 'header.php' ; 
    ?>
    <div class="container2">
        <div class="wrapper">
        <h1 class="title">Inscrivez-Vous !</h1>
            <form method="POST" action="admin-inscription.php">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Votre peusdo" required><br/>
                </div>
                <div class="row">
                    <i class="fa-solid fa-person"></i>
                    <input type="text" name="nom" id="nom" placeholder="Votre nom" required><br/>
                </div>
                <div class="row">
                    <i class="fa-solid fa-users"></i>
                    <input type="text" name="prenom" id="prenom" placeholder="Votre prenom" required><br/>
                </div>
                <div class="row">
                    <i class="fas fa-at"></i>
                    <input type="email" name="username" id="username" placeholder="Votre email" required><br/>
                </div>
                <div class="row">
                    <i class="fa-solid fa-unlock-keyhole"></i>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required><br/>
                </div>
                <div class="row">
                    <i class="fa-solid fa-unlock-keyhole"></i>
                    <input type="password" name="password2" id="password2" placeholder="Confirmez votre mot de passe" required><br/>
                </div>
                <div class="row button">
                    <input type="submit" name="envoie" id="envoie" value="S'inscrire">
                </div>
                <div class="signuplink">Vous avez déjà un compte ? <a href="inscription.php">Connectez vous</a></div>


            </form>
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Les mots de passe ne sont pas identiques</p>";
                }
            ?>
        </div>
    </div>
    


    <?php
        include 'html/footer.html';
    ?>

</body>
</html>



