
<?php
    session_start();
    if($_SESSION['Identifiant'] !== ""){
        $user = $_SESSION['Identifiant'];
        // afficher un message
        echo "Bonjour $user, vous êtes connecté";
    }
?>
            