<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/output.css">
        <div id="SESSION_CONNECTED" class="hidden"> 
            <?php if(session_status() !== PHP_SESSION_ACTIVE) session_start();
                if (isset($_SESSION['connected'])){
                    echo '1';
                } else {
                    echo '0';
                }
            ?> 
        </div>
            
        <title>Capteurs zone singe</title>
    </head>
    <body class="bg-XBlueLight">
        <?php 
            include 'header.php';
            include 'php_func/connectionToBDD.php'
        ?>
        <div class="relative">
            <img class="w-full blur-sm" src="/img/page-singe.jpeg" alt="image d'un singe"> 
            <h1 class="absolute z-10 tracking-wider text-4xl text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 font-bold ">Capteurs zone singes</h1>
        </div>

        <div class="flex flex-row flex-wrap justify-center ">
            <div class="flex flex-row flex-wrap justify-center border-4 border-XBlueStrong mt-2 rounded-2xl text-center border-separate" id="datas">
                <div class="px-2 border-r-4 border-XBlueStrong">
                    <h3>Température</h3>
                    <p class="text-4xl font-bold">
                    <?php
                        $requet = "SELECT CD.value, ct.name,ct.unité FROM capteur_data CD LEFT JOIN capteur_type ct on CD.data_type_id = ct.capteur_type_id WHERE CD.data_type_id = 1 ORDER BY CD.date_time";
                        $result = $connection->query($requet);
                        $row = $result->fetch_assoc();
                        echo $row['value']." ".$row['unité'];
                    ?>
                    </p>
                </div>
                <div class="px-2 border-r-4 border-XBlueStrong">
                    <h3>Humidité</h3>
                    <p class="text-4xl font-bold">
                    <?php
                        $requet = "SELECT CD.value, ct.name,ct.unité FROM capteur_data CD LEFT JOIN capteur_type ct on CD.data_type_id = ct.capteur_type_id WHERE CD.data_type_id = 2 ORDER BY CD.date_time";
                        $result = $connection->query($requet);
                        $row = $result->fetch_assoc();
                        echo $row['value']." ".$row['unité'];
                    ?>
                    </p>
                </div>
                <div class="px-2 border-r-4 border-XBlueStrong">
                    <h3>Niveau sonore</h3>
                    <p class="text-4xl font-bold">
                    <?php
                        $requet = "SELECT CD.value FROM capteur_data CD WHERE CD.data_type_id = 3 ORDER BY CD.date_time";
                        $result = $connection->query($requet);
                        $row = $result->fetch_assoc();
                        if ($row['value'] < 50){
                            echo "Faible";
                        } elseif ($row['value'] > 70) {
                            echo "Eleve";
                        } else {
                            echo "Moyen";
                        }
                    ?>
                    </p>
                </div>
                <div class="mx-2 ">
                    <h3>Luminosité</h3>
                    <p class="text-4xl font-bold">
                    <?php
                        $requet = "SELECT CD.value FROM capteur_data CD WHERE CD.data_type_id = 3 ORDER BY CD.date_time";
                        $result = $connection->query($requet);
                        $row = $result->fetch_assoc();
                        if ($row['value'] < 50){
                            echo "Nuit";
                        } elseif ($row['value'] > 70) {
                            echo "Aube";
                        } else {
                            echo "Jour";
                        }
                    ?>
                    </p>
                </div>  
            </div>
            
            <div class="justify-center text-3xl text-XBlueStrong mt-3 font-bold" id="notConnected">
                <p>Veuillez vous connecter pour voir les données</p>
            </div>

            <div class="flex flex-row items-center">
                <p class="mt-4 text-light px-4">
                    Un grand nombre de singes vivent dans les forêts : ils sont arboricoles, c’est-à-dire qu'ils savent grimper et y vivre, dans les arbres. On pense que les premiers singes, nos ancêtres à tous, étaient probablement arboricoles. Par la suite, le groupe s'est diversifié et de nombreux singes se sont adaptés à de nouveaux milieux très différents.
                    <br>
                    Les singes utilisent généralement leurs mains (ainsi que leurs pieds, qui, contrairement à celui de l'homme, ont souvent aussi un pouce opposable), pour attraper les branches et s'y accrocher. Cela permet aux singes de se déplacer dans les arbres sans tomber. Un grand nombre d'espèces de singes sont assez petits. En cas de danger, ils se réfugient dans les arbres, sur les plus hautes branches, où leurs prédateurs, plus gros et plus lourds, ne peuvent pas venir les chercher.
                    <br>
                    Certains singes sont tout particulièrement adaptés à la vie dans les arbres et n'en descendent que rarement, voire jamais. Les singes-araignée ont de longs bras, mais aussi une queue qui est capable de s'enrouler autour d'une branche et de s'y accrocher. C'est presque comme une « cinquième main », grâce à laquelle le singe ne tombe jamais ! Il peut ainsi rester suspendu par la queue, pendant qu'il utilise ses mains pour se nourrir, par exemple. Les gibbons, eux, n'ont pas de queue, mais des bras gigantesques, capables de grands mouvements. Ces singes ne marchent quasiment jamais : ils se déplacent en se balançant de branches en branches, suspendus par leurs bras et « volent » littéralement d'arbre en arbre.
                    <br>
                </p>

                <img class="max-h-96" src="img/capteur-singe.jpeg" alt="un singe dans les arbres">
            </div>

            
        </div>
        

        <?php include 'html/footer.html'?>

        <script src="./js/capteur.js"></script>

    </body>
</html>