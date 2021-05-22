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
			#flex_annonce1{
				display: flex;
				flex-direction: row;
				justify-content: space-between;
			}
            .flex_annonce2{
            	margin: 20px;
            }
            .flex_annonce3{
            	margin: 5px;
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
								<h2 >Les annonces des entreprises</h2>
								
							</header>
							<?php
							include("connexion.php");
				$sql="SELECT id_annonce,titre,description,dt_debut,dt_fin,logo from annonce ";
				$result=mysqli_query($link,$sql);
				while($row=mysqli_fetch_assoc($result))
				{   $id_annonce=$row['id_annonce'];
					$titre=$row['titre'];
					$description=$row['description'];
	                $dt_debut=$row['dt_debut'];
	                $dt_fin=$row['dt_fin'];
					$logo=$row['logo'];
					if($titre!="" && $logo!="" && $description!="" && $dt_debut!="" && $dt_fin!=""){
					echo"<div id=\"flex_annonce1\">
					    
								<div class=\"col align-center\">
					    
									<div class=\"image round fit\">
										<img src=\"logos/$logo\" alt=\"logo\" width=\"200px\" hight=\"200px\">										
							        </div>
							        
                                
                                </div>
                         
                        
                         
                                <div class=\"flex_annonce2\">
                                     <p class=\"button\">L'intitulé : $titre</p><br>
                                     <p class=\"button\">N° d'annonce : $id_annonce</p>
                               </div>

                               <div class=\"flex_annonce3\">
                               <h4 style=\"color:#4aa3df;\"><u>Les compétences requises : </u></h4> $description <br>
                                <h4 style=\"color:#4aa3df;\"><u>La durée du stage : </u></h4> de $dt_debut à $dt_fin
                                </div>
                         </div>
                     
                         <hr size=4 color=black>
                         

                         ";
					
					
					}
				}

				?>

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
	<?php mysqli_close($link); ?>
