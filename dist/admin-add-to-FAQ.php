<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if(isset($_POST['question']) && isset($_POST['answer']))
{
    include 'php_func/connectionToBDD.php';

    $question = mysqli_real_escape_string($connection,htmlspecialchars($_POST['question'])); 
    $answer = mysqli_real_escape_string($connection,htmlspecialchars($_POST['answer']));

    if($question !== "" && $answer !== "")
    {
        $requete = "INSERT INTO FAQ (question, answer) VALUES ('$question','$answer')";
        $exec_requete = mysqli_query($connection,$requete);
        
        header("Location: admin-panel.php");
    }
    else
    {
       header('Location: admin-panel.php');
    }
}
else
{
   header('Location: admin-panel.php');
}
?>