<!DOCTYPE html>
<html>
<head>
    <title>Nouveau mot de passe</title>
    <link rel="stylesheet" href="css/output.css">
    
</head>
<body class="bg-XBlueLight">
    <?php 
        include 'header.php';
    ?>

    <center>
        <fieldset>
            <?php
                $id = $_GET['id'];
            ?>
            <form action="admin-set-new-password.php?id=<?php echo $id ?>" method="POST" class="bg-XBlueStrong w-11/12 md:w-3/5 lg:w-1/2 my-5 py-2 rounded-md">
                <h1 class="text-lg text-white mb-2" >Entrez votre nouveau mot de passe</h1>
                <input type="text" placeholder="Mot de passe" name="pass" required class="w-10/12 md:w-8/12 lg:w-5/12 bg-XBlueLight rounded-md pl-1"><br/>
                <input type="text" placeholder="Confirmation de mot de passe" name="pass2" required class="w-10/12 md:w-8/12 lg:w-5/12 bg-XBlueLight rounded-md pl-1"><br/>
                <input type="submit" name="formlogin" id="formlogin" value="Changer mon mot de passe" class="text-lg bg-XBlueMiddle mt-2 px-2 rounded-md cursor-pointer">  
            </form>



        </fieldset>
    </center>

    <?php
        include 'html/footer.html';
    ?>
</body>

</html>


