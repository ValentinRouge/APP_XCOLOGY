<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="css/connexion.css">
    
</head>
<body>
    <?php 
        include 'html/header.html';
        include 'connectionToBDD.php';
        global $connexion;
    ?>

    <center>
    <fieldset>
        
        <form method="post">
            <h1>Connexion</h1>
            <hr>
            <table>
                <input type="email" name="lemail" id="lemail" placeholder="Votre email" required><br/>
                <input type="password" name="lpassword" id="lpassword" placeholder="Votre mot de passe" required><br/>
                <input type="submit" name="formlogin" id="formlogin" value="Se connecter">
            </table>        
        </form>

    </fieldset>
    </center>

    <?php

        include 'html/Footer.html';

        if(isset($_POST['formlogin']))
        {
            extract($_POST);

            if(!empty($lemail) && !empty($lpassword))
            {
                $q = $connexion->prepare("SELECT * FROM User WHERE 'email' = :email");
                $q->execute(['email' => $lemail]);
                $result = $q->fetch();

                if ($result == true)
                {
                    //le compte existe 
                    $hashpassword = $result['password'];
                    if(password_verify($lpassword, $hashpassword))
                    {
                        echo "Le mot de passe est bon, connexion en cours ";

                        header('Location:capteur.php');

                        $_SESSION['email'] = $result['email'];
                        $_SESSION['date'] = $result['date'];

                    }
                    else 
                    {
                        echo "Le mot de passe n'est pas correcte";

                        header('Location:connexion.php');
                    }
                }
                else
                {
                    echo"Le compte portant l'email " . $lemail ."'existe pas";
                }
            }


            else{
                echo "Veuillez complétez l'ensemble des champs";
            }
        }

    ?>
</body>

</html>


