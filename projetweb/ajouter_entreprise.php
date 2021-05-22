<?php
session_start();
	include('connexion.php');
	if(isset($_POST['Valider'])){
	$patente=$_POST['patente'];
	$nom_entreprise=$_POST['nom_entreprise'];
	$type_entreprise=$_POST['type_entreprise'];
	$specialite=$_POST['specialite'];
	$adresse=$_POST['adresse'];
	$email_e=$_POST['email_e'];
	$mot_passe=$_POST['mot_passe'];
	$telephone=$_POST['telephone'];
	$site_web=$_POST['site_web'];
	if(isset($_FILES['fichier']) && $_FILES['fichier']['error']==0){
		$dossier='image/';
		$temp_name=$_FILES['fichier']['tmp_name'];
		if(!is_uploaded_file($temp_name)){
			exit("le fichier est untrouvable");
		}
		$infosfichier = pathinfo($_FILES['fichier']['name']);
		$extension_upload =$infosfichier['extension'];
		if ($_FILES['fichier']['size'] >= 1000000){
			exit("Erreur, le fichier est volumineux");
		}
		$extension_upload = strtolower($extension_upload);
		$extensions_autorisees = array('png','jpeg','jpg');
		if (!in_array($extension_upload, $extensions_autorisees))
		{
		exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png, jpeg, jpg )");
		}
		$nom_photo=$nom_entreprise.$extension_upload;
		if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
		exit("Problem dans le telechargement de l'image, Ressayez");
		}
		$ph_name=$nom_photo;
	}
	else{
		$ph_name="SANS_IMAGE";
	}
	$requette="INSERT INTO entreprise (patente,nom_entreprise,type_entreprise,logo,specialite,adresse,email_e,mot_passe,telephone,site_web) VALUES('$patente','$nom_entreprise','$type_entreprise','$ph_name','$specialite','$adresse','$email_e','$mot_passe','$telephone','$site_web')";
	$resultat=mysqli_query($link,$requette);
	$row=mysqli_fetch_assoc($result);
	$_SESSION['patente']=$row['patente'];
	$_SESSION['nom_entreprise']=$row['nom_entreprise'];
	$_SESSION['type_entreprise']=$row['type_entreprise'];
	$_SESSION['specialite']=$row['specialite'];
	$_SESSION['adresse']=$row['adresse'];
	$_SESSION['email_e']=$row['email_e'];
	$_SESSION['mot_passe']=$row['mot_passe']; 
	$_SESSION['telephone']=$row['telephone'];
	$_SESSION['site_web']=$row['site_web'];
	header("location:afficher_entreprise.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Créer un compte pour une entreprise</title>
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

		.logo_image{
				width: 350px;
				height: 150px;
				margin-left: 400px;
				margin-bottom: 100px;

			}
			h3{
			color: white;
		}
	</style>
</head>
<body>
<header id="header" class="alt">
	<div class="logo"><a href="indexadmin.php"><img src="images/logo.png" width="200" height="75" ></a></div>
	<a href="#menu">Menu</a>
</header>
<!-- Nav -->
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
					<h4 style="color:white">Créer un compte pour une entreprise </h4>
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
			<label for="patente">Patente:</label>
			<input type="text" name="patente" required="required"/>
			<label for="nom_entreprise">Nom d'entreprise:</label>
			<input type="text" name="nom_entreprise" required="required"/>
			<label for="type_entreprise">Type d'entreprise:</label>
			<input type="text"  name="type_entreprise" required="required"/>
			<label for="specialite">Specialite:</label>
			<input type="text" name="specialite" required="required"/>
			<label for="adresse">Adresse:</label>
			<input type="text" name="adresse" required="required"/>
			<label for="email_e">Email:</label>
			<input type="text" name="email_e" required="required"/>
			<label for="mot_passe">Mot de passe:</label>
			<input type="text" name="mot_passe" required="required"/>
			<label for="telephone">Telephone:</label>
			<input type="text" name="telephone" required="required"/>
			<label for="site_web">Site Web:</label>
			<input type="text" name="site_web" required="required"/>
			<label for="fichier">Logo:</label>
			<input type="file" name="fichier"/>

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
<?php mysqli_close($link); ?>