<?php
session_start();

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Ensak-cv</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="assets/css/main.css"/>
		<style>
			.logo_image{
				width: 350px;
				height: 150px;
				margin-left: 400px;
				margin-bottom: 100px;
			}
			h4
			{
				color: white;
			}
			#para{
				color:#333333; 
				width:50%;
				height: 50%;
				text-align: justify;
				position: relative;
				right: -25%;
			}
			ul, #para{
				list-style-type: none;
			}
		#pr{
			color: #3b5998;
			}
			
		</style>
	</head>
	<body>
			<header id="header" class="alt">
				<div class="logo"><a href="index1.php"><img src="images/logo.png" width="200" height="75" ></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="ajouter_annonce.php"> Créer une offre de stage</a></li>
					<li><a href="afficher_annonces.php">Afficher la liste des annonces </a></li>
					<li><a href="afficher_demande.php">Afficher la liste des CV des étudiants ayant postulés pour une offre de stage</a></li>
					<li><a href="recherche.php">Faire une recherche multicritère sur les CV</a></li>
					<li><a href="deconnexion.php">Déconnexion</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<?php 
						 echo '<h1>Bienvenue dans notre site-web</h1>';
						 echo '<h4>Espace Entreprise</h4>';
						?>
					</header>
				</div>
			</section>

		<!-- Main -->
			<div id="main">
					<section class="wrapper style1">
						<div class="inner">

						</div>
					</section>
			</div>
				<div id="para">
					<h3 id="pr">Présentation Générale</h3>
					<p>Ecole Nationale des Sciences Appliquées de Kénitra (ENSAK) a été créée en 2008. Sa Majesté le Roi Mohammed VI a procédé le Lundi 13 0ctobre 2008 à la pose de la première pierre pour la construction des locaux de l’établissement. L’ENSAK a pour vocation de former des ingénieurs d’état dans des domaines scientifiques et techniques mais avec des compétences en management et en communication. L’ouverture de l’ENSAK vient conforter les efforts déployés tant au niveau national que régional visant à répondre au programme national de formation des 10 000 ingénieurs. quatre cycles ingénieurs sont ouverts dans des spécialités susceptibles de connaître d’importants développements. Il s’agit des filières:
					<ul>
					<li>Génie Informatique</li>
					<li>Réseaux et systèmes de télécommunications</li>
					<li>Génie électrique</li>
					<li>Génie industriel</li>
					<li>Génie mécatronique</li>
					</ul>
					La formation à l’ENSAK se caractérise par une grande dimension pratique à travers les activités techniques, les stages et les projets réalisés en partenariat avec le milieu socio-économique national et international.</p>
				</div>

				<!--Scripts-->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>