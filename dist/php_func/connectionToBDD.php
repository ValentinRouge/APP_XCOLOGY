<?php
$DB_HOST = "herogu.garageisep.com";
$DB_USERNAME = "ETgzwb9R7W_appg10b";
$DB_PASSWORD = "SlF7CIqbxeiI45Gl";
$DB_NAME = "GFAheoPxRI_appg10b";


$connection = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
?>