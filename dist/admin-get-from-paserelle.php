<?php

function addToDb(){     
    include 'php_func/connectionToBDD.php';
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL, 
        "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=110B"
    );
    curl_setopt($ch, CURLOPT_HEADER, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    $data = curl_exec($ch);
    curl_close($ch);
    
    $data_tab = str_split($data,33);
    
    $lc;
    for($i=0, $size=count($data_tab); $i<$size; $i++){
        $trame = $data_tab[$i];
        // décodage avec des substring
        $t = substr($trame,0,1); 
        $o = substr($trame,1,4);
    
        // décodage avec sscanf
        list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        //echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");
        //echo($c);
        $lc=$c;
    }

    thisOne(2, $data_tab, $connection);
    thisOne(3, $data_tab, $connection);
}


function thisOne($x, $data_tab, $connection){
    $trame = $data_tab[count($data_tab)-$x];
    $trame = substr($trame, 3);
    list($o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame,"%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    $v = hexdec($v)/100;
    if ($c == 4){
        $requete = "INSERT INTO capteur_data(value, date_time, data_type_id) VALUES ($v, now(), 1)";
        $exec_requete = mysqli_query($connection,$requete);
    } else if ($c == 3){
        $requete = "INSERT INTO capteur_data(value, date_time, data_type_id) VALUES ($v, now(), 2)";
        $exec_requete = mysqli_query($connection,$requete);
    }
}

addToDb();

//echo($data_tab[count($data_tab)-3]);
//echo("<br>");
//echo($data_tab[count($data_tab)-2]);
//trest co 
?>

