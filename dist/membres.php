<?php
    session_start();

    include_once('db/connexion.php');

    $afficher_membres = $BDD->prepare("SELECT *
        FROM utilisateur");
    $afficher_membres->execute();

?>
<!doctype html>
<html lang ="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="lien" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Membres</title>
    </head>
    <body>
        <?php
            require_once('menu.php');
        ?>
        <?php
            if(isset($_SESSION ['id'])){
                echo "Bonjour" . $_SESSION['pseudo'];
            }else{
        ?>
            <h1>Hello, world ! </h1>
        <?php
           }
        ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="lien" crossorigin= "anonymous"></script>
        <script src="https://cdnnjs.cloudflare.com/ajax/libs/pepper.js/1.14.7/umd/popper.min.js" integrity="lien" crossorign= "anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="lien" crossorign= "anonymous"></script>
        </body>

</html>
</doctype>
