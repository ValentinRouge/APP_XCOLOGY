<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Envoie d'un mail via le formulaire</title>
    <link rel="stylesheet" href="../css/contact.css" />
</head>

    <body>
        <?php
         if(isset($_POST['mailform']))

         $header="MIME-Version: 1.0\r\n";
         $header.='From:"guillaume.legeai@gmail.com"<guillaume.legeai@gmail.com>'."\n";
         $header.='Content-Type:text/html; charset="uft-8"'."\n";
         $header.='Content-Transfer-Encoding: 8bit';
         
         $message='J\'ai envoyé ce mail avec PHP ';
         
         mail("guillaume.legeai@gmail.com", "retour xcolozoo!", $message, $header);
         }
         ?>
         <form method="POST" action="">
             <input type="submit" value="Recevoir un mail !" name="mailform"/>
         </form>
    </body>
</html>
