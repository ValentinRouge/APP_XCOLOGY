<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if (isset($_SESSION['username'])){
                    echo "connecté";
                } else {
                    echo 'non connexté';
                }

                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "Bonjour $user, vous êtes connecté";
                }

                if($_SESSION['admin'] == 1){
                    echo "Bonjour cher administrateur";
                }
            ?>
            
        </div>
    </body>
</html>
