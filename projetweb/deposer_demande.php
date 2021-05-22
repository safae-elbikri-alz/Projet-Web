<?php 
session_start();
  include("connexion.php");
if(isset($_POST['valider'])){
	$id_annonce=$_POST['id_annonce'];
	$apogee=$_POST['apogee'];
	$requette="INSERT INTO demande(id_annonce_demande,apogee_demande) VALUES('$id_annonce','$apogee')";
	$resultat=mysqli_query($link,$requette);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Ensak-cv</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/main.css" />
		<style>
		#monform{
			width: 50%;
			margin:auto;
		}
		#monform input,#monform select{
			display: block;
			width: 90%;
			height: 30px;
			margin: 10px;
			border-radius: 5px;
			border: 1px solid #92c9ed;
			padding: 5px;
		}
	</style>
</head>

<body>

	<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="index2.php"><img src="images/logo.png" width="200" height="75" ></a></div>
				<a href="#menu">Menu</a>
			</header>
			<nav id="menu">
				<ul class="links">
					<li><a href="profile.php">Créer Votre Cv</a></li>
					<li><a href="srt-resume.php">voir Cv</a></li>
					<li><a href="modification.php">Modifier-cv</a></li>
					<li><a href="deposer_demande.php">Deposer demande</a></li>
					<li><a href="afficher_annoncespouretudiant.php">Afficher annonces pour etudiants</a></li>
					<li><a href="deconnexion.php">Déconnexion</a></li>
				</ul>
			</nav>

			<section id="banner">
				<div class="inner">
					<h2 style="color: white;"> Déposer une candidature pour une offre de stage </h2>
				</div>
			</section>
			
			<section class="wrapper style1">
						<div class="inner">
							<!-- 2 Columns -->
								<div class="flex flex-2">
									<div class="col col1">
						
									</div>
								</div>
					    </div>
					</section>

	<form action="#" method="POST" id="monform" >
			<label for="id_annonce"><h5>N° d'annonce :</h5></label>
			<input type="number" name="id_annonce" required/>
			<label for="apogee"><h5>N° apogée :</h5></label>
			<input type="text"   name="apogee" pattern="[0-9]*" required/>
			<label for="nom"><h5>Nom :</h5></label>
			<input type="text"  name="nom" required/>
			<label for="prenom"><h5>Prénom :</h5></label>
			<input type="text"  name="prenom" required/>

			<input type="submit" name="valider" value="valider" style="width: 120px; height: 50px; margin-left: 270px;">
			<br><br>
			
	</form>
	<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>