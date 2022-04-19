<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/login.css" medias="screen" type="text/css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
    </head>
    <body>
        <div id="container">
            <form action="verification.php" method="POST"
                <h1> Connexion </h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrez le nom d'utilisateur" name="Identifiant" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrez le mot de passe" name="motdepasse" required>
                
                <input type="submit" id='submit' value='LOGIN' >
                <?php
                    if(isset($_GET['Erreur'])){
                        $err = $_GET['Erreur'];
                        if($err==1 || $err==2)
                                echo "<p style='color:red'>Identifiant ou mot de passe incorrect</p>";
                    }
                    ?>
            ></form>
        </div>
        
    </body>
</html>