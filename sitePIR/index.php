<!DOCTYPE html>
<html lang="fr">
<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=pirbddv1;charset=utf8', 'root', '');
}
catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
}?>

<head>
	<title>Salle 105 GEI</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta charset="utf-8">
	<link  href="./css/style.css" rel="stylesheet" type='text/css'>
	<link  href="./css/layout.css" rel="stylesheet" type='text/css'>
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
			<a href="./index.php" class="menu_onglet actif">Accueil</a>
			<a href="./inscription.php" class="menu_onglet">Inscription</a>
			<a href="./pretmateriel.php" class="menu_onglet">Prêt Matériel</a>
		</div>
		<!-- <div class="gris"></div> -->
	</div>

	</header>
	<div class="fondprincipal">
		<div id="conteneurpresentation">
			<div class="infog">	
				<div class="bienvenue">
						<div class="texte"><p><h2>Bienvenue au sein de la salle IoT du GEI </h2></br>
			Cette salle, mise à disposition de tous les étudiants de 4ème et 5ème année, est composée de nombreux équipements derniers cris. Elle a pour but de permettre aux étudiants de travailler sur le projet et d'emprunter certains des épuipements si ces derniers souhaitent travailler chez eux. </br></br> L'entrée de cette salle se fait à l'aide de la carte étudiante. Il faudra cependant préalablement s'inscrire en suivant les indications que vous trouverez en allant sur la rubrique "Auto-inscription".</p><a href="./inscription.php" class="forminscription" target="_blank">Auto-inscription</a>
						</div>
						<div class="image"></div>
				</div>
				<div class="horaires">
					<div class="texte"><p><h2>Horaires d'ouverture</h2> Lundi : 8h-19h</br>Mardi : 8h-19h</br>Mercredi : 8h-19h</br>Jeudi : 8h-19h</br>Vendredi : 8h-19h</br></p></div>	
				</div>
			</div>
				
		</div>
		
		<div id="conteneurprincipal">
		
		</div>
	</div>
	</div>
	<footer>
<a href="#"> Mentions légales </a> 
		<a href="./contact.html">Contact</a> 
		<div id ="logo">
		<a href="index.html"></a>
		</div>
	</footer>
</body>
<script src="./js/jquery.js"></script>
<script src="./js/app.js"></script>
</html>