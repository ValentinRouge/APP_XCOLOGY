<?php

include 'admin-mail-func.php';

if(isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['ameliorer']) && isset($_POST['sujet']) && isset($_POST['Mail']) && isset($_POST['Telephone'])){
	echo 'ici';
	$Nom = $_POST['Nom']; 
    $Prenom = $_POST['Prenom'];
    $ameliorer = $_POST['ameliorer'];
    $sujet = $_POST['sujet'];
    $Mail =$_POST['Mail'];
    $Telephone = $_POST['Telephone'];

	$text = "
	Nom : $Nom
	Prenom : $Prenom
	Telephone : $Telephone
	Adresse mail : $Mail

	Sujet : $sujet

	Texte : $ameliorer
	
	";

	$text2 = "
	Nous vous confirmons la bonne réception de votre message suivant : 

	Nom : $Nom
	Prenom : $Prenom
	Telephone : $Telephone
	Adresse mail : $Mail

	Sujet : $sujet

	Texte : $ameliorer
	
	";

	smtpMailer("infinites.measure@gmail.com","infinites.measure@gmail.com","Infinites Measure","Nouveau contact sur le site Infinite Measure : $sujet",$text);

	smtpMailer($Mail,"infinites.measure@gmail.com","Infinites Measure","Confirmation d'envoie de mail à propos de : $sujet",$text2);

	//header('Location: contact.php#autres-questions?mail=1');
}


?>
