<?php 
session_start();
  include("connexion.php");
if(isset($_POST['valider'])){
	$titre=$_POST['titre'];
	$description=$_POST['competences'];
	$dt_debut=$_POST['dt_debut'];
	$dt_fin=$_POST['dt_fin'];

	if(isset($_FILES['fichier']) and $_FILES['fichier']['error']==0){
		$dossier= 'logos/';
		$temp_name=$_FILES['fichier']['tmp_name'];
		if(!is_uploaded_file($temp_name)){
		exit("le fichier est untrouvable");
		}
		$infosfichier = pathinfo($_FILES['fichier']['name']);
		$extension_upload = $infosfichier['extension'];
		if ($_FILES['fichier']['size'] >= 1000000){
			exit("Erreur, le fichier est volumineux");
		}
		$extension_upload = strtolower($extension_upload);
		$extensions_autorisees = array('png','jpeg','jpg');
		if (!in_array($extension_upload, $extensions_autorisees))
		{
		exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png,jpeg et jpg)");
		}
		$nom_photo=$titre.$extension_upload;
		if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
		exit("Problem dans le telechargement de l'image, Ressayez");
		}
		$ph_name=$nom_photo;
	}
	else{
		$ph_name="SANS_IMAGE";
	}

	
	$requette="INSERT INTO annonce(titre,description,dt_debut,dt_fin,logo) VALUES('$titre','$description','$dt_debut','$dt_fin','$ph_name')";
	$resultat=mysqli_query($link,$requette);
	header("location:afficher_annonces.php");
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
<header id="header" class="alt">
	<div class="logo"><a href="index1.php"><img src="images/logo.png" width="200" height="75" ></a></div>
	<a href="#menu">Menu</a>
</header>
				
</header>
<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="ajouter_annonce.php"> Créer une offre de stage</a></li>
					<li><a href="afficher_annonces.php">Afficher la liste des annonces </a></li>
					<li><a href="afficher_cv.php">Afficher la liste des CV des étudiants ayant postulés pour une offre de stage</a></li>
					<li><a href="recherche.php">Faire une recherche multicritère sur les CV</a></li>
					<li><a href="deconnexion.php">Déconnexion</a></li>
					
				</ul>
			</nav>	

<section id="banner">
				<div class="inner">
					<h2 style="color: white;"> Créer une offre de stage </h2>
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

	<form action="#" method="POST" id="monform" enctype="multipart/form-data">
			<label for="titre"><h5>L'intitulé :</h5></label>
			<input type="text" name="titre" required/>
			<label for="competences"><h5>Les compétences requises :</h5></label>
			<textarea name="competences"  required></textarea>
			<label for="dt_debut"><h5>La date de debut du stage :</h5></label>
			<input type="date"  name="dt_debut" required/>
			<label for="dt_fin"><h5>La date de fin du stage :</h5></label>
			<input type="date"  name="dt_fin" required/>
			<label for="fichier"><h5>Logo de l'entreprise :</h5></label>
			<input type="file"  name="fichier"/><br><br>

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
<?php mysqli_close($link); ?>
       


