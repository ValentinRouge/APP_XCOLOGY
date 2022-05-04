<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h1>Bienvenue sur votre profil</h1>
    <?php
        if(isset($_SESSION['email']) && (isset($_SESSION['date'])))
        {
            ?>
            <p> Votre Email : <?= $_SESSION['email']; ?> </p>
            <p> Date : <?= $_SESSION['date']; ?> </p>
        }
    ?>
    <?php
        include 'html/header.html';
        include 'html/Footer.html';
        include 'connectionToBDD.php';
        global $connexion;
    ?>
</body>
</html>