<?php
include 'connectionToBDD.php';
$requet = "SELECT * FROM FAQ";
$result = $connection->query($requet);
$row = $result->fetch_assoc();
echo $row['question'];
?>