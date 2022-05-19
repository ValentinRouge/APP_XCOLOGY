<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>XCOLOGY</title>
        <link href="css/output.css" rel="stylesheet">
        <div id="SESSION_CONNECTED" class="hidden"> 
            <?php if(session_status() !== PHP_SESSION_ACTIVE) session_start();
                if (isset($_SESSION['connected'])){
                    $connected = TRUE;
                    if ($_SESSION['admin']==1){
                        $isadmin = TRUE;
                    } else {
                        $isadmin = FALSE;
                    }
                } else {
                    $connected = FALSE;
                    $isadmin = FALSE;
                }
            ?> 
        </div>
    </head>
    <body >
        <div class="flex flex-row flex-wrap bg-XBlueStrong text-XBlueLight gap-x-5 px-3 min-h-16">
            <a href="index.php">
                <img src="../img/IM_logo.png" class="max-h-16 my-1">
            </a>
            <div class="flex flex-row">
                <a class="btn-header" href="../capteur.php">Capteur</a>
            </div>
            <div class="flex flex-row">
                <a class="btn-header" href="../pageenviro.html">Environnement</a>
            </div>
            <div class="flex flex-row">
                <a class="btn-header" href="../mini-jeu.php">Le mini jeu</a>
            </div>
            <div class="grow"></div>
            <div class="flex flex-row">
                <a class="btn-header w-40" href="../contact.php">Informations pratiques & contact</a>
            </div>
            <?php if (!$connected){ ?>
            <div class="flex flex-row">
                <a class="btn-header" href="../inscription.php">Inscription</a>
            </div>
            <div class="flex flex-row">
                <a class="btn-header" href="../connexion.php">Connexion</a>
            </div>
            <?php };
            if ($connected){ ?>
            <div class="flex flex-row">
                <a class="btn-header" href="../deconnexion.php">Deconnexion</a>
            </div>
            <div class="flex flex-row">
                <a class="btn-header" href="mon-compte.php">Mon Compte</a>
            </div>
            <?php };
            if ($isadmin){ ?>
            <div class="flex flex-row">
                <a class="btn-header" href="../admin-panel.php">Espace<br>administrateur</a>
            </div>
            <?php }; ?>

        </div>
    </body>
</html>