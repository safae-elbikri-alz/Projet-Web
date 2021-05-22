<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Ensak-cv</title>
		<meta charset="utf-8" />
		
		<link rel="stylesheet" href="assets/css/main.css" />
		<style>
		td{
			border: .5px solid #92c9ed;
			color:black;
		}
		th{
			border: .5px solid #92c9ed;

		}
		table{
			border:.5px solid #92c9ed;
			width: 70%;
			margin: auto;
			margin-bottom: 10%;
		}
		
	</style>
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="index1.php"><img src="images/logo.png" width="200" height="75" ></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index1.php">Home</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<div id="main">
				<!-- Section -->
					<section class="wrapper style1">
						<div class="inner">
							<header class="align-center">
								<h2 >la liste des étudiants ayant postulés pour une offre de stage</h2>
								
							</header>
							<div id="tbl">
	<table border="1" cellspacing="0" cellpadding="1">
		<tr>
			<th>N° d'annonce </th>
			<th>N° apogée</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Email</th>
			
		</tr>
			<?php
			    include("connexion.php");
				$sql="SELECT  demande.id_annonce_demande,demande.apogee_demande,etudiant.apogee,etudiant.nom,etudiant.prenom,etudiant.email,etudiant.id_cv  from demande,etudiant where demande.apogee_demande=etudiant.apogee ";
				$result=mysqli_query($link,$sql);
				while($row=mysqli_fetch_assoc($result))
				{
					
					$id_annonce_demande=$row['id_annonce_demande'];
					$apogee_demande=$row['apogee_demande'];
					$apogee_etudiant=$row['apogee'];
					$nom=$row['nom'];
					$prenom=$row['prenom'];
					$id_cv=$row['id_cv'];
					$email=$row['email'];
					if( $id_annonce_demande!="" && $apogee_etudiant!="" && $apogee_demande!="" && $nom!="" && $prenom!=""  && $email!="" && $id_cv!=""){
					echo"<tr>
						<td> $id_annonce_demande</td>
						<td> $apogee_demande</td>
						<td> $nom</td>
						<td> $prenom</td>
						<td>$email</td>
						
						</tr>";
					}
				}

			?>
	</table>
</div>

						</div>
					</section>

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
	<?php 
	mysqli_close($link);
	 ?>
