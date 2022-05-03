<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php 
    include 'html/header.html' ; 
    include 'html/footer.html' ; 
    ?>

    <form method="post">
        <input type="email" name="email" id="email" placeholder="Votre email" required><br/>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe" required><br/>
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirmez votre mot de passe" required><br/>
        <input type="submit" name="envoie" id="envoie" value="Confirmer">
    </form>
    
    <?php
        
        if(isset($_POST['envoie'])) {

            extract($_POST);

            if (!empty $password) && !empty($cpassword) && !empty($email)) {
                
                if($password == $cpassword) {
                   
                    $options = [
                        'cost' => 13,
                    ];
    
                    $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

                    include 'connectionToBDD.php';
                    global $connection;

                    $q = $connection->prepare("INSERT INTO Utilisateur(email,password) VALUES(:email,:password)");
                    $q->execute([
                        'email' => $email,
                        'password' => $hashpass
                    ]);

                }

            }else {
                echo "Veuilez remplir tous les champs";
            }
            

        }
    ?>

</body>
</html>



