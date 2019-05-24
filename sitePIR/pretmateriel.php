<!DOCTYPE html>
<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=pirbddv1;charset=utf8','root', '');
}
catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
}
global $emprunter,$mailentre;
$emprunter=1;
echo date("Y-m-d");
?>
<html lang="fr">
<head>
	<title>Salle 105 GEI</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta charset="utf-8">
	<link  href="./css/layout.css" rel="stylesheet" type='text/css'>
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
			<a href="./inscription.php" class="menu_onglet">Inscription</a>
			<a href="./pretmateriel.php" class="menu_onglet actif">Prêt Matériel</a>
		</div>
		<!-- <div class="gris"></div> -->
	</div>

	</header>
	<div class="fondprincipal">

		<div class="form">
			<h2> La location de matériel est désormais disponible ! </br></br> 

		<form  method="post">

			Vous venez pour :</br></br> 
			<input type="radio" name="ok" value=1 id="emprunt" checked="checked" /> <label for="moins15">un emprûnt</label>
       		<input type="radio" name="ok" value=0 id="retour" /> <label for="medium15-25">un retour</label></br></br> 
       		<label> Votre @ mail INSA </label> : <input type="text" name="mail2" id="name" placeholder="Ex : dupont@etud.insa-toulouse.fr" /></br></br>
			
       		<input type="submit" name="submit2" value="Confirmation">
       	</form>	


			<form  method = "POST">

			

       		</h2>



			
			<img class="photomatos" src="./img/diode.jpg" />
			<div id="diode">
				<p class="label-diode">Diode</p>
				<select class="boutonderoulant" name="boutonderoulantdiode">


					<?php 
					if(isset($_POST['submit2']))
					{
						echo 'empruntouretrait';
						$mailentre=$_POST["mail2"];
						if($_POST["ok"]==0){ //cas retour
							$emprunter=0;
							echo 'emprunt';
						 	$result = $bdd->query("SELECT MAX(quantiteemprunt)
						 		FROM prêt
						 		NATURAL JOIN matériel
						 		WHERE matériel.nom='Diode' AND email=$mailentre");
						 	$donnees = $result->fetch();
						 	echo $donnees;
						 	$cpt = $donnees['MAX(quantiteemprunt)'];
						  	$num = 0;
						  	for ($num; $num<=$cpt; $num++) {
						  		echo '<option value='.$num.' selected>'.$num.'</option>';
							}
						}

						elseif($_POST["ok"]==1){ //cas d'un emprunt
							echo 'retour';
							$emprunter=1;
							$result = $bdd->query("SELECT `quantite` FROM `matériel` where nom='Diode'");
						 	$donnees = $result->fetch();
						 	$cpt = $donnees['quantite'];
						  	$num = 0;
						  	for ($num; $num<=$cpt; $num++) {
						  		echo '<option value='.$num.' selected>'.$num.'</option>';
							}
						}
					}


					?>

				</select>
    		</div>

    		<img class="photomatos" src="./img/capteurgaz.jpg" />
			<div id="capteurgaz">
				<p class="label-capteurgaz">Capteur gaz</p>
				<select class="boutonderoulant" name="boutonderoulantgaz">
					<?php 
					if(isset($_POST['submit2']))
					{
						echo 'empruntouretrait';
						if($_POST["ok"]==0){ //cas retour
							echo 'emprunt';
							$emprunter=0;
						 	$result = $bdd->query("SELECT MAX(quantiteemprunt)
						 		FROM prêt
						 		NATURAL JOIN matériel
						 		WHERE matériel.nom='Gaz'AND email=$mailentre");
						 	$donnees = $result->fetch();
						 	$cpt = $donnees['MAX(quantiteemprunt)'];
						 	echo $cpt;
						  	$num = 0;
						  	for ($num; $num<=$cpt; $num++) {
						  		echo '<option value='.$num.' selected>'.$num.'</option>';
							}
						}

						elseif($_POST["ok"]==1){ //cas d'un emprunt
							echo 'retour';
							$emprunter=1;
							$result = $bdd->query("SELECT `quantite` FROM `matériel` where nom='Gaz'");
						 	$donnees = $result->fetch();
						 	$cpt = $donnees['quantite'];
						  	$num = 0;
						  	for ($num; $num<=$cpt; $num++) {
						  		echo '<option value='.$num.' selected>'.$num.'</option>';
							}
						}
					}


					?>
				</select>
			</div>


			<img class="photomatos" src="./img/potentiometre.jpg" />
			<div id="potentiometre">
				<p class="label-potentiometre">Potentiomètre</p>
				<select class="boutonderoulant" name="boutonderoulantpotentiometre">
				 <?php 
					if(isset($_POST['submit2']))
					{
						echo 'empruntouretrait';
						if($_POST["ok"]==0){ //cas retour
							echo 'emprunt';
						 	$result = $bdd->query("SELECT MAX(quantiteemprunt)
						 		FROM prêt
						 		NATURAL JOIN matériel
						 		WHERE matériel.nom='Potentiomètre'AND email=$mailentre");
						 	$donnees = $result->fetch();
						 	$cpt = $donnees['MAX(quantiteemprunt)'];
						 	echo $cpt;
						  	$num = 0;
						  	for ($num; $num<=$cpt; $num++) {
						  		echo '<option value='.$num.' selected>'.$num.'</option>';
							}
						}

						elseif($_POST["ok"]==1){ //cas d'un emprunt
							echo 'retour';
							$result = $bdd->query("SELECT `quantite` FROM `matériel` where nom='Potentiomètre'");
						 	$donnees = $result->fetch();
						 	$cpt = $donnees['quantite'];
						  	$num = 0;
						  	for ($num; $num<=$cpt; $num++) {
						  		echo '<option value='.$num.' selected>'.$num.'</option>';
							}
						}
					}


					?>
				</select>
			</div>

			<img class="photomatos" src="./img/capteurtemperature.jpg" />
			<div id="capteurtemperature">
				<p class="label-capteurtemperature">Capteur </br> température</p>
				<select class="boutonderoulant" name="boutonderoulanttemperature">
				<?php 
					if(isset($_POST['submit2']))
					{
						echo 'empruntouretrait';
						if($_POST["ok"]==0){ //cas retour
							$emprunter=0;
						 	$result = $bdd->query("SELECT MAX(quantiteemprunt)
						 		FROM prêt
						 		NATURAL JOIN matériel
						 		WHERE matériel.nom='Température'AND email=$mailentre");
						 	$donnees = $result->fetch();
						 	$cpt = $donnees['MAX(quantiteemprunt)'];
						 	echo $cpt;
						  	$num = 0;
						  	for ($num; $num<=$cpt; $num++) {
						  		echo '<option value='.$num.' selected>'.$num.'</option>';
							}
						}

						elseif($_POST["ok"]==1){ //cas d'un emprunt
							$emprunter=1;
							$result = $bdd->query("SELECT `quantite` FROM `matériel` where nom='Température'");
						 	$donnees = $result->fetch();
						 	$cpt = $donnees['quantite'];
						  	$num = 0;
						  	for ($num; $num<=$cpt; $num++) {
						  		echo '<option value='.$num.' selected>'.$num.'</option>';
							}
						}
					}


					?>
				</select>
			</div>


			<img class="photomatos" src="./img/capteurrfid.jpg" />
			<div id="capteurrfid">
				<p class="label-capteurrfid">Capteur RFID</p>
				<select class="boutonderoulant" name="boutonderoulanfid">
				  <?php 
					if(isset($_POST['submit2']))
					{
						echo 'empruntouretrait';
						if($_POST["ok"]==0){ //cas retour
							echo 'emprunt';
							$emprunter=0;
						 	$result = $bdd->query("SELECT MAX(quantiteemprunt)
						 		FROM prêt
						 		NATURAL JOIN matériel
						 		WHERE matériel.nom='Fid'AND email=$mailentre");
						 	$donnees = $result->fetch();
						 	$cpt = $donnees['MAX(quantiteemprunt)'];
						 	echo $cpt;
						  	$num = 0;
						  	for ($num; $num<=$cpt; $num++) {
						  		echo '<option value='.$num.' selected>'.$num.'</option>';
							}
						}

						elseif($_POST["ok"]==1){ //cas d'un emprunt
							$emprunter=1;
							echo 'retour';
							$result = $bdd->query("SELECT `quantite` FROM `matériel` where nom='Fid'");
						 	$donnees = $result->fetch();
						 	$cpt = $donnees['quantite'];
						  	$num = 0;
						  	for ($num; $num<=$cpt; $num++) {
						  		echo '<option value='.$num.' selected>'.$num.'</option>';
							}
						}
					}


					?>
				</select>
			</div>

				<label>
				<input type="submit" name="submit" value="Je valide'">
				</label>

		</form>

				


					<?php
					if(isset($_POST["boutonderoulantdiode"]) ){

				 	$result = $bdd->query("SELECT `quantite`,'id_materiel','nom' FROM `matériel` where nom='Diode'");
				 	$donnees = $result->fetch();
				 	$cpt = $donnees['quantite'];
				 	$nomdiode="Diodes";//$donnees['nom'];
				 	$idmateriel=$donnees['id_materiel'];

					$nbdiodechoisi=$_POST['boutonderoulantdiode'];
					
					

					if(isset($_POST['submit'])){
						if($emprunter==0){ //cas retour

						$nvquantitediode = $cpt+$nbdiodechoisi;
						}
						else{
							include 'gmail.php';
							$nvquantitediode = $cpt-$nbdiodechoisi;
							$req = $bdd->prepare("INSERT INTO prêt(email,id_materiel,quantiteemprunt,duree_location) VALUES (:email,:id_materiel,:quantiteemprunt,:duree_location)");
							$req->execute(array(
								'email' => (string)$mailentre,
								'id_materiel' => $idmateriel,
								'quantiteemprunt' => $nbdiodechoisi,
								'duree_location' => date("Y-m-d")

							));
						}
					}

				
					$bdd->exec("UPDATE matériel SET quantite=$nvquantitediode WHERE nom='Diode' ");
					
					}

					if(isset($_POST["boutonderoulantgaz"]) ){

				 	$result = $bdd->query("SELECT `quantite`,'id_materiel' FROM `matériel` where nom='Gaz'");
				 	$donnees = $result->fetch();
				 	$idmateriel=$donnees['id_materiel'];
				 	$cpt = $donnees['quantite'];
				 	

					$nbgazchoisi=$_POST['boutonderoulantgaz'];
					
					

					if(isset($_POST['submit'])){
						if($emprunter==0){ //cas retour

						$nvquantitegaz = $cpt+$nbgazchoisi;
						}
						else{
							$nvquantitegaz = $cpt-$nbgazchoisi;
							$req = $bdd->prepare("INSERT INTO Prêt(email,id_materiel,quantiteemprunt,duree_location) VALUES (:email,:id_materiel,:quantiteemprunt,:duree_location)");
							$req->execute(array(
								'email' => (string)$mailentre,
								'id_materiel' => $idmateriel,
								'quantiteemprunt' => $nbgazchoisi,
								'duree_location' => "date"

							));
						}
					}

				
					$bdd->exec("UPDATE matériel SET quantite=$nvquantitegaz WHERE nom='Gaz' ");
					}





							//// pourquoi emprunter n'existe pas

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