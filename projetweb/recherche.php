<?php
session_start();
include('connexion.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ensak-cv</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/main.css" />
		<style>
		.liste{
			width: 35%;
			margin:auto;
			margin-right: 350px;
		}
		.liste li:hover{
			color:#3498db;
		}
		.liste li{
			color: black;
		}
		
		
	</style>
		
</head>

<body>
<header id="header" class="alt">
	<div class="logo"><a href="index1.php"><img src="images/logo.png" width="200" height="75" ></a></div>
</header>
<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="ajouter_annonce.php"> Créer une offre de stage</a></li>
					<li><a href="afficher_annonces.php">Afficher la liste des annonces</a></li>
					<li><a href="afficher_demande.php">Afficher la liste des CV des étudiants ayant postulés pour une offre de stage</a></li>
					<li><a href="recherche.php">Faire une recherche multicritère sur les CV</a></li>
					<li><a href="deconnexion.php">Déconnexion</a></li>
					
				</ul>
			</nav>	

<section id="banner">
				<div class="inner">
					<h2 style="color: white;"> Recherche multicritère sur les CV </h2>
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

	<div class="liste">
		<ul type="circle">
			<a href="recherche_age.php"><li>Recherche selon l'age</li></a><br>
			<a href="recherche_ville.php"><li>Recherche selon la ville</li></a><br>
			<a href="recherche_nationnalite.php"><li>Recherche selon la nationnalité</li></a><br>
			<a href="recherche_s_f.php"><li>Recherche selon la situation familiale</li></a><br>
			<a href="recherche_langue.php"><li>Recherche selon la langue</li></a><br>
		</ul>
		
	</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>