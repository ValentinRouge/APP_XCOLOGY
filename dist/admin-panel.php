<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="../css/output.css">
    </head>
    <body class="bg-XBlueLight">
        <div id="content">
            <!-- tester si l'utilisateur est connecté -->
            <?php
                include 'header.php';

                if(session_status() !== PHP_SESSION_ACTIVE) session_start();
                if ($_SESSION['connected']==1){
                    echo "connecté";
                } else {
                    echo 'non connexté';
                }

                if($_SESSION['admin'] == 1){
                    echo "Bonjour cher administrateur";
                }

                echo $_SESSION['sessionID'];
            ?>
            
        </div>
    </body>
</html>
