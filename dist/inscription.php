<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <!-- css -->
    <link rel="stylesheet" href="css/Inscription.css">
    <!-- css -->
</head>
<body>

    <?php 
    include 'html/header.html' ; 
    ?>

    <center>
    <fieldset>
        
        <form method="post">
            <h1>Inscrivez-Vous !</h1>
            <hr>
            <table>
                <input type="email" name="email" id="email" placeholder="Votre email" required><br/>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe" required><br/>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirmez votre mot de passe" required><br/>
                <input type="submit" name="envoie" id="envoie" value="S'inscrire">
            </table>
        </form>
        
    </fieldset>
    </center>

    <?php

        include 'html/footer.html';
        
        if(isset($_POST['envoie'])) {

            extract($_POST);

            if (!empty ($password) && !empty($cpassword) && !empty($email)) {
                
                if($password == $cpassword) {
                   
                    $options = [
                        'cost' => 13,
                    ];
    
                    $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

                    include 'connectionToBDD.php';
                    global $connection;

                    $c = $connection->prepare("SELECT email FROM User WHERE email = :email");
                    $c->execute([
                        'email' => $email
                    ]);

                    $result = $c->rowCount();

                    if($result == 0) {
                        $q = $connection->prepare("INSERT INTO User(email,password) VALUES(:email,:password)");
                        $q->execute([
                            'email' => $email,
                            'password' => $hashpass
                        ]);
                        echo "Le compte a été créé";

                        header('Location:index.php');
                    }else{
                        echo"Un email existe déjà";
                        header('Location:index.php');
                    }
                    


                }

            }else {
                echo "Veuilez remplir tous les champs";
            }
            

        }
    ?>

</body>
</html>



