<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Ensak-cv</title>
		<meta charset="utf-8" />
		
		<link rel="stylesheet" href="assets/css/main.css" />
		<style >
			#age{
				display: flex;
				flex-direction: row;
				justify-content: space-around;
			}
			.selectionner{
				width: 300px;
			}
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
</header>
		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="recherche.php">Back</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<div id="main">
				<!-- Section -->
					<section class="wrapper style1">
						<div class="inner">
							<header class="align-center">
								<h2 >Recherche selon la langue</h2>
								
							</header>
							
				
					<form  method="POST" action="#">
						<div id="age">
						   <h4>veuillez choisir une langue :</h4>
						   <div class="annee">
							
									<?php
									include("connexion.php");
									$sql = "SELECT distinct Titre_langue FROM langue";
									$result = mysqli_query($link,$sql);
								    $nbre=mysqli_num_rows($result);
								    echo "<select  Class=\"selectionner\" name=\"langue\" >";
									if($nbre>0){
                                       while($row=mysqli_fetch_assoc($result)) {
										echo "<option  value=".$row['Titre_langue'].">";
				                        echo  $row['Titre_langue'];
				                        echo '</option>';
									}
										echo '</select>';
									}
									else {
										echo "0 results";
										echo '</select>';
									}
									mysqli_close($link);
								?> 
								
							</div>
							<div class="rech">
			
						    <button class="button" name="rechercher">Rechercher</button>
							  
							</div>
						</div>
						
				    </form>
		

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
include("connexion.php");
if(isset($_POST['rechercher']))
{  $langue=$_POST['langue'];
	
   $sql="SELECT etudiant.apogee,etudiant.nom,etudiant.prenom,etudiant.email,etudiant.id_cv,cv.Tele,langue.Titre_langue,parler.Id_langue,parler.Id_cv   from etudiant,cv,langue,parler where etudiant.id_cv=cv.Id_cv and langue.Titre_langue='$langue' and  parler.Id_langue=langue.Id_langue and parler.Id_cv=cv.Id_cv";
   $news='';
   $result=mysqli_query($link,$sql);
				
	while($row=mysqli_fetch_assoc($result))
				{ $news .= '<tr><td>'.$row["nom"].'</td><td>'.$row["prenom"].'</td><td>' .$row["apogee"].'</td><td>' .$row['Titre_langue']. '</td><td>' .$row["Tele"].'</td><td>' .$row["email"].'</td></tr>';

                }

	echo"<table border=\"1\" cellspacing=\"0\" cellpadding=\"1\">
		<tr>
			<th>Nom </th>
			<th>Prénom</th>
			<th>Apogée</th>
			<th>La langue</th>
			<th>Téléphone</th>
			<th>Email</th>
			
		</tr>
		
		$news
		</table>";

}
				
mysqli_close($link);

?>