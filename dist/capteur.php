<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/output.css">

        <title>Capteur zone singe</title>
    </head>
    <body class="bg-XBlueLight">
        <?php include 'html/header.html';
        include 'connectionToBDD.php'
        ?>
        <div class="relative">
            <img class="w-full blur-sm" src="/img/page-singe.jpeg" alt="image d'un singe"> 
            <h1 class="absolute z-10 tracking-wider text-4xl text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 font-bold">Capteur zone singe</h1>
        </div>

        <div class="flex flex-row flex-wrap justify-center ">
            <div class="flex flex-row flex-wrap justify-center border-4 border-XBlueStrong mt-2 rounded-2xl text-center border-separate">
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
            
        </div>
        


        <?php include 'html/footer.html'?>
    </body>
</html>