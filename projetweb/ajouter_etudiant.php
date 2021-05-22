<?php
     session_start();
	
	if(isset($_POST['Valider']))
	{
	$apogee=$_POST['apogee'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$email=$_POST['email'];
	include('connexion.php');

	$requette="INSERT INTO etudiant (apogee,nom,prenom,email) VALUES('$apogee','$nom','$prenom','$email')";
	$resultat=mysqli_query($link,$requette);
	$row=mysqli_fetch_assoc($resultat);
	$_SESSION['apogee']=$row['apogee'];
	$_SESSION['nom']=$row['nom'];
	$_SESSION['prenom']=$row['prenom'];
	$_SESSION['email']=$row['email'];
	header("location:afficher_etudiant.php");
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajouter un compte pour un étudiant</title>
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
		h3{
			color: white;
		}
		.logo_image{
				width: 350px;
				height: 150px;
				margin-left: 400px;
				margin-bottom: 100px;

			}
	</style>
</head>

<body>
<header id="header" class="alt">
	<div class="logo"><a href="indexadmin.php"><img src="images/logo.png" width="200" height="75" ></a></div>
	<a href="#menu">Menu</a>
</header>

			<nav id="menu">
				<ul class="links">
					<li><a href="ajouter_entreprise.php"> Créer un compte pour une entreprise</a></li>
					<li><a href="ajouter_etudiant.php">Ajouter un compte pour un étudiant</a></li>
					<li><a href="afficher_entreprise.php">Afficher la liste des entreprises</a></li>
					<li><a href="afficher_etudiant.php">Afficher la liste des étudiants </a></li>
					<li><a href="deconnexion.php">Déconnexion</a></li>

				</ul>
			</nav>

<section id="banner">
				<div class="inner">
					<h4 style="color:white"> Ajouter un compte pour un étudiant</h4>
				</div>
			</section>
<section class="wrapper style1">
						<div class="inner">
							<!-- 2 Columns -->
								<div class="flex flex-2">
									<div class="col col1">
						
									</div>
					    </div>
					</section>

	<form action="#" method="post" id="monform" enctype="multipart/form-data">
			<label for="apogee">Apogée:</label>
			<input type="number" name="apogee" required="required"/>
			<label for="nom">Nom:</label>
			<input type="text" name="nom" required="required"/>
			<label for="prenom">Prenom:</label>
			<input type="text"  name="prenom" required="required"/>
			<label for="email">Email:</label>
			<input type="text" name="email" required="required"/>

			<input type="submit" name="Valider" value="Valider" style="width: 200px; text-align:center;padding-top: 0px;"/>
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