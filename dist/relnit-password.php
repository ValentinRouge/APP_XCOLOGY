<!DOCTYPE html>
<html>
<head>
    <title>Réinitialer mon mot de passe</title>
    <link rel="stylesheet" href="css/output.css">
    
</head>
<body class="bg-XBlueLight">
    <?php 
        include 'header.php';
    ?>

    <fieldset>
        <form action="admin-relnit-password.php" method="POST" class="bg-XBlueStrong w-11/12 md:w-3/5 lg:w-1/2 my-5 py-2 rounded-md mx-auto flex flex-col justify-center">
                <h1 class="text-lg text-white mb-2 mx-auto" >Entrez votre mail ou votre pseudo pour réinitialiser votre mot de passe</h1>
                <input type="text" placeholder="Entrer votre pseudo ou mail" name="username" required class="w-10/12 md:w-8/12 lg:w-5/12 bg-XBlueLight rounded-md pl-1 mx-auto"><br/>
                <input type="submit" name="formlogin" id="formlogin" value="Modifier mon mot de passe" class="text-lg bg-XBlueMiddle mt-2 px-2 rounded-md cursor-pointer mx-auto">    
                <?php 
                if (isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if ($err = 1){
                        echo "<p class='text-white'>Ce mail ou pseudo n'existe pas</p>";
                    }
                }
                ?>  
        </form>
    </fieldset>

    <?php
        include 'html/footer.html';
    ?>
</body>

</html>


