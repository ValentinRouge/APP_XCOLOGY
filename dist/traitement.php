<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Envoie d'un mail via le formulaire</title>
    <link rel="stylesheet" href="../css/contact.css" />
</head>

    <body>

    <!-- Inserer le html ici-->
        <?php
        if(isset($_POST["message"])){
            $message = "Ce message vous a été envoyé via la page contact du sute Xcolozoo
            Nom : " . $_POST["Nom"] . "
            Email : " . $_POST["Prenom"] . "
            Message : " $_POST["ameliorer"] . "
            $retour = mail("guillaume.legeai@gmail.com","retour Xcolozoo",$ameliorer,"From: contact.xcolozoo@garageisep.com\r\nReply-to:" . $POST["Mail"]);
            if($retour) {
                echo "<p> L'email a bien été envoyé.<p>"
            }
        }
         ?>
      
    </body>
</html>
