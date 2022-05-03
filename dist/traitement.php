<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Envoie d'un mail via le formulaire</title>
</head>

    <body>
        <?php
         if (isset($_POST['message'])) {
            $retour = mail('guillaume.legeai@gmail.com','Page contact', $_POST['message'],'From: webmaster@monsite.fr')
            if($retour)
                echo '<p>votre message a bien été envoyé.</p>';
            }
        ?>
    </body>
</html>
