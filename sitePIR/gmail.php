<?php

	
	date_default_timezone_set('Etc/UTC');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';


	$mailto = "lucas.radureau86@gmail.com";

	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "salleiot.insat@gmail.com";
	//Password to use for SMTP authentication
	$mail->Password = "7nainsToulouse";
	//Set who the message is to be sent from
	$mail->setFrom('noreply@test.com', 'Salle IOT INSA Toulouse');
	//Set an alternative reply-to address
	$mail->addReplyTo('replyto@example.com', 'Salle IOT INSA Toulouse');
	//Set who the message is to be sent to
	$mail->addAddress($mailto, 'test'); // $_POST['email']
	//Set the subject line
	$mail->Subject = 'Emprunt matériel';
	
	//Replace the plain text body with one created manually
	//faire liste materiel a emprunter
	//$nbmat= $bdd->query('SELECT COUNT(id_materiel) FROM Prêt WHERE email = \'manuf83@hotmail.fr\''); // $_POST['email']
	// reqete sql 
	//$sql = "SELECT * FROM Prêt WHERE email = $mailto";

	// on envoie la requête
	//$req = mysqli_query($bdd, $sql);

	$message = '
	<!DOCTYPE html>
	<html>
	<body>
		<p> Bonjour, </br>
		Vous avez emprunter du matériel à l\'INSA qui se trouvait dans la salle IOT (105). </br>
		Voici la liste des objets pris : 
		<ul>';
		//while($row = mysqli_fetch_assoc($req)) 
	    //{
		    // on affiche les informations de l'enregistrement en cours
		    $message .=	'<li> '.$nbdiodechoisi.' '.$nomdiode.'</li>';
	    //};
	//mysqli_free_result($req);
	$message .=	'
		</ul>
		</p>
	</body>
	</html>	'; 



	//utiliser la fonction qui convertit de iso-8859-1 en utf-8
	$mail->CharSet = "UTF-8";
	$mail->Body = $message;
	$mail->IsHTML(true);       // <=== call IsHTML() after $mail->Body has been set.


	//send the message, check for errors
	if (!$mail->send()) {
		echo "Mailer Error: ".$mail->ErrorInfo;
	} else {
		echo "		Mail sent!";
	}
?>