<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="../css/output.css">
    </head>
    <body class="bg-XBlueLight">
        <?php 
            include 'header.php';
            include 'connectionToBDD.php';
        ?>

        <div id="FAQ">
            <h1>Gestion de la FAQ</h1>
            <table>
                <tr>
                    <th>Question</th>
                    <th>Réponse</th>
                </tr>
                <?php

                $requet = "SELECT question, answer FROM FAQ";
                $result = $connection->query($requet);
                while($row = $result->fetch_assoc()){ 
                ?>
                    <tr>
                        <td> <?php echo $row['question'] ?> </td>
                        <td> <?php echo $row['answer'] ?> </td>
                    </tr>
                <?php }
                ?>
            </table>
            

            <form action="admin-add-to-FAQ.php" method="POST">
                <input type="text" placeholder="Entrer la question" name="question" required>
                <input type="text" placeholder="Entrer la réponse" name="answer" required>
                <input type="submit" name="formlogin" id="formlogin" value="Ajouter à la FAQ">
            </form>
        </div>

        <?php include './html/footer.html' ?>
    </body>
</html>
