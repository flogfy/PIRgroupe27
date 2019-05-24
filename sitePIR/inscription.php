<!DOCTYPE html>
<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=pirbddv1;charset=utf8', 'root', '');
}
catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
}
?>
<html lang="fr">
<head>
	<title>Salle 105 GEI</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta charset="utf-8">
	<link  href="./css/layout.css" rel="stylesheet" type='text/css'>
	<link  href="./css/style.css" rel="stylesheet" type='text/css'>
	<link  href="./css/pretmateriel.css" rel="stylesheet" type='text/css'>
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
	<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="./img//favicon.ico" type="image/x-icon">
</head>

<body>
	<header>
	<div id="haut">
		<img id="logo" src="img/logo.png" alt="valtho"/>
		<div class="menuprincipal">
		<i class="wi wi-night-sleet"></i>
			<a href="./index.php" class="menu_onglet ">Accueil</a>
			<a href="./inscription.php" class="menu_onglet actif">Inscription</a>
			<a href="./pretmateriel.php" class="menu_onglet">Prêt Matériel</a>
		</div>
		<!-- <div class="gris"></div> -->
	</div>


	</header>
	<div class="fondprincipal">
		<div class="form">
			<h2> Auto-inscription étudiants ! </br></br>
			<form action = " inscription.php " method = "POST">
				<label> Votre nom de famille </label> : <input type="text" name="nom" id="name" /></br>
				<label> Votre prénom </label> : <input type="text" name="prenom" id="name" /></br>
				<label> Votre @ mail INSA </label> : <input type="email" name="mailinsa" id="name" placeholder="Ex : dupont@etud.insa-toulouse.fr" /></br>
				<label> Votre numéro de carte étudiante (visible avec l'appli NFC) </label> : <input type="text" name="numetudiant" id="name" /></br>
			</h2>
			
				<label id="labelinscrit">
				</br>
				<input type="submit" name="submit" class="forminscription" value="Je m'inscris">
				</label>
			</form>


		</div> 
	</div>

			<?php 


			if(isset($_POST['submit']) and isset($_POST["nom"]) and isset($_POST["prenom"]) and isset($_POST["mailinsa"]) and isset($_POST["numetudiant"]) ){


				$nom=$_POST["nom"];
				$prenom=$_POST["prenom"];
				$mail=$_POST["mailinsa"];
				$numetudiant=$_POST["numetudiant"];


				//echo 'utilisateur'. $nom . 'et'. $prenom  .'a bien été ajouté !';


				$req = $bdd->prepare('INSERT INTO utilisateur(Nom_etudiant, Prenom_etudiant, mail_INSA, numetudiant) VALUES(:Nom_etudiant, :Prenom_etudiant, :mail_INSA, :numetudiant)');
				$req->execute(array(
				'Nom_etudiant' => (string)$nom,
				'Prenom_etudiant' => (string)$prenom,
				'mail_INSA' => (string)$mail,
				'numetudiant' => $numetudiant,
				));
				}

			?>




		


	</div>
	<footer>
<!--
<a href="#"> Mentions légales </a>
		<a href="./contact.html">Contact</a>
		<div id ="logo">
		<a href="index.html"></a>
		</div>
	</footer>
-->
</body>
<!--<script src="./js/jquery.js"></script>
<script src="./js/pretmateriel.js"></script>
-->
</html>