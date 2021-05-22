<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Afficher la liste des entreprises</title>
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
		img{
			border-radius: 20px;
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

<!-- Nav -->
<section id="banner">
				<div class="inner">
					<h3>Afficher la liste des entreprises</h3>
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
	<div id="tbl">
	<table border="1" cellspacing="0" cellpadding="1">
		<tr>
			<th>Nom d'entreprise </th>
			<th>Type d'entreprise</th>
			<th>Specialite</th>
			<th>Adresse</th>
			<th>Email</th>
			<th>Telephone</th>
			<th>Site Web</th>
			<th>Logo</th>
		</tr>
			<?php
				include('connexion.php');
				$sql="SELECT * from entreprise ";
				$result=mysqli_query($link,$sql);
				$nb_etudiant=mysqli_num_rows($result);
				while($row=mysqli_fetch_assoc($result))
				{
					$nom_entreprise=$row['nom_entreprise'];
					$type_entreprise=$row['type_entreprise'];
					$specialite=$row['specialite'];
					$adresse=$row['adresse'];
					$email_e=$row['email_e'];
					$telephone=$row['telephone'];
					$site_web=$row['site_web'];
					$image=$row['logo'];
					if($nom_entreprise!="" && $type_entreprise!="" && $specialite!="" && $image!=""){
					echo"<tr>
						<td> $nom_entreprise</td>
						<td> $type_entreprise</td>
						<td> $specialite</td>
						<td> $adresse</td>
						<td> $email_e</td>
						<td> $telephone</td>
						<td> $site_web</td>
						<td> <img src=\"image/$image\" alt=\"image\" height=40 width=40/></td>
						</tr>";
					}
				}

			?>
	</table>
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
<?php mysqli_close($link); ?>