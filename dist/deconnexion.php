<?php 
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    session_destroy();
    include 'header.php';
    include 'html/page-deconnexion.html';
    include 'html/footer.html';
?>
