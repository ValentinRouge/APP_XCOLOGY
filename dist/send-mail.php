<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

function smtpMailer($to, $from, $from_name, $subject, $body) {
	$mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
	$mail->IsSMTP(); // active SMTP
	$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
	$mail->SMTPAuth = true;  // Authentification SMTP active
	$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = 'infinites.measure@gmail.com';
	$mail->Password = 'Xcology2022';
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		return 'Mail error: '.$mail->ErrorInfo;
	} else {
		return true;
	}
}

if(isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['ameliorer']) && isset($_POST['sujet']) && isset($_POST['Mail']) && isset($_POST['Telephone'])){
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

	header('Location: contact.php');

}


?>
