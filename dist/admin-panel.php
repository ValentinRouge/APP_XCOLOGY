<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="../css/output.css">
    </head>
    <?php 
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        
        if (isset($_SESSION['admin'])){
            if ($_SESSION['admin']==1){
                ?>
                <body class="bg-XBlueLight">
                    <?php 
                        include 'header.php';
                        include 'connectionToBDD.php';
                    ?>

                    <div id="FAQ">
                        <h1 class="text-3xl my-2 text-center underline">Gestion de la FAQ</h1>
                        <table class="border-collapse table-auto w-11/12 mx-auto mb-2">
                            <tr>
                                <th class="faq-td-td bg-XBlueStrong text-white font-bold">Question</th>
                                <th class="faq-td-td bg-XBlueStrong text-white font-bold">Réponse</th>
                            </tr>
                            <?php

                            $requet = "SELECT FAQ_id,question, answer FROM FAQ ORDER BY FAQ_id";
                            $result = $connection->query($requet);
                            while($row = $result->fetch_assoc()){ 
                            ?>
                                <tr>
                                    <td class="faq-td-td"> <?php echo $row['question'] ?> </td>
                                    <td class="faq-td-td"> <?php echo $row['answer'] ?> </td>
                                    <th class="pl-1 w-8"><a href="admin-delete-FAQ.php?id=<?php echo $row['FAQ_id'] ?>"><img src="./img/delete.svg" alt="Supprimer"></a></th>
                                </tr>
                            <?php }
                            ?>

                            <form action="admin-add-to-FAQ.php" method="POST">
                                <td class="faq-td-td px-0">
                                    <input type="text" placeholder="Entrer la question" name="question" required class="w-full mx-0 bg-XBlueLight">
                                </td>
                                <td class="faq-td-td px-0">
                                    <input type="text" placeholder="Entrer la réponse" name="answer" required class="w-full mx-0 bg-XBlueLight">
                                </td>
                                <td class="pl-1">
                                    <input type="image" src="./img/add.svg" alt="Ajouter">
                                </td>
                            </form>

                        </table>
                    </div>

                    <div id="User">
                        <h1 class="text-3xl my-2 text-center underline">Gestion des utilisateurs</h1>
                        <table class="border-collapse table-auto w-11/12 mx-auto mb-2">
                            <tr>
                                <th class="faq-td-td bg-XBlueStrong text-white font-bold">Nom</th>
                                <th class="faq-td-td bg-XBlueStrong text-white font-bold">Prénom</th>
                                <th class="faq-td-td bg-XBlueStrong text-white font-bold">Pseudo</th>
                                <th class="faq-td-td bg-XBlueStrong text-white font-bold">Adresse mail</th>
                                <th class="faq-td-td bg-XBlueStrong text-white font-bold">Admin</th>

                            </tr>
                            <?php

                            $requet = "SELECT User_id, Pseudo,admin, email, lastName, firstName FROM User ORDER BY User_id";
                            $result = $connection->query($requet);
                            while($row = $result->fetch_assoc()){ 
                            ?>
                                <tr>
                                    <td class="faq-td-td"><?php echo $row['lastName'] ?></td>
                                    <td class="faq-td-td"><?php echo $row['firstName'] ?></td>
                                    <td class="faq-td-td"><?php echo $row['Pseudo'] ?></td>
                                    <td class="faq-td-td"><?php echo $row['email'] ?></td>
                                    <td class="faq-td-td"><?php echo $row['admin'] ?></td>
                                    <th class="pl-1 w-8"><a href="admin-toogle-admin.php?id=<?php echo $row['User_id'] ?>&adm=<?php echo $row['admin'] ?>"><img src="./img/user-admin.svg" alt="A"></a></th>
                                    <th class="w-8"><a href="admin-delete-account-admin.php?id=<?php echo $row['User_id'] ?>"><img src="./img/delete.svg" alt="S"></a></th>

                                </tr>
                            <?php }
                            ?>


                        </table>
                    </div>

                    <?php include './html/footer.html' ?>
                </body>
                <?php
            } 
        }
    ?> 
</html>
