<?php
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ensak-Cv</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body>
			<header id="header" class="alt">
				<div class="logo"><a href="index2.php"><img src="images/logo.png" width="200" height="75" ></a></d>
				<a href="#menu">Menu</a>
			</header>
</body>
</html>


<?php
include('connexion.php');
$id=$_SESSION['Id_cv'];
	$sql1="SELECT * FROM experience WHERE Id_cv='".$_SESSION['Id_cv']."'";
	$result1=mysqli_query($link,$sql1);
	$res1=mysqli_fetch_assoc($result1);
	if($res1!=false)
	{
	$_SESSION['poste']=$res1['Poste'];
	}


	$sql="SELECT * FROM diplome WHERE Id_cv='".$_SESSION['Id_cv']."'";
	$result=mysqli_query($link,$sql);
	$res=mysqli_fetch_assoc($result);
	if($res!=false)
	{
		$_SESSION['td']=$res['Titre_dip'];
		$_SESSION['Date_obt']=$res['date_obt'];
		$_SESSION['Lieu_obt']=$res['lieu_obt'];
	}

	$sql2="SELECT * FROM cv WHERE Id_cv='".$_SESSION['Id_cv']."'";
	$result2=mysqli_query($link,$sql2);
	$res2=mysqli_fetch_assoc($result2);

	if($res2!=false)
	{
		
		$_SESSION['tel']=$res2['Tele'];
		$_SESSION['email']=$res2['Email'];
		$_SESSION['date_naiss']=$res2['Date_naissance'];
		$_SESSION['annee_naissance']=$res2['Annee_naissance'];
		$_SESSION['photo']=$res2['image'];
		$_SESSION['situation_familiale']=$res2['Situation_familiale'];
	}

	$sql3="SELECT * FROM competence WHERE Id_cv='".$_SESSION['Id_cv']."'";
	$result3=mysqli_query($link,$sql3);
	$res3=mysqli_fetch_assoc($result3);
	if($res3!=false)
	{
		$_SESSION['titre_comp']=$res3['Titre_comp'];
	}


	$sql5="select * from  langue  WHERE Id_langue=(select Id_langue FROM parler where Id_cv='$id')";
	$result5=mysqli_query($link,$sql5);
	$res5=mysqli_fetch_assoc($result5);
	if($res5!=false)
	{
		$_SESSION['titre_langue']=$res5['Titre_langue'];
        $_SESSION['niveau']=$res5['Niveau'];
	}
?>

<!DOCTYPE html >
<html>
<head>

	<title>Ensak-Cv</title>
	<meta http-equiv="content-type" content="text/html">
	<meta charset="utf-8">

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="resume.css" media="all" />
		<meta charset="utf-8">

</head>
<body>

<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h3><?php echo $_SESSION['Nom'];?></h3>
					<h3><?php echo $_SESSION['Prenom'];?></h3>
				</div>

				<div class="yui-u">
					<div class="contact-info">
						<?php printf('<img src="./images/%s" width="150" height="150">',$_SESSION['photo']);?>
						<h3><?php echo 'Email: '.$_SESSION['email'];?></h3>
						<h3><?php echo  'Tel: '.$_SESSION['tel'];?></h3>

					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Profile:</h2>
						</div>
						<div class="yui-u">
							<h2> Situation familiale:</h2>
							<p class="enlarge"> <?php echo $_SESSION['situation_familiale'] ?></p>

							<h2> Date de naissance:</h2>
							<p class="enlarge"> <?php echo $_SESSION['date_naiss']=$res2['Date_naissance'];?></p>
							<p class="enlarge"><?php echo "Annee naissance:"."<br>".$_SESSION['annee_naissance'];?></p>
						</div>
					</div>

					</div><!--// .yui-gf -->


						
						</div><!--// .yui-u -->

							

					
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Diplome:</h2>
						</div>
						<div class="yui-u">

								<div class="talent">
									<h2>Titre diplome:</h2>
									<p> <?php echo $_SESSION['td'];?> </p>
								</div>
								<div class="talent">
									<h2>Date d'obtention du diplome:</h2>
									<p> <?php echo $_SESSION['Date_obt'];?> </p>
								</div>
								<div class="talent">
									<h2>Lieu d'obtention du diplome:</h2>
									<p> <?php echo $_SESSION['Lieu_obt'];?> </p>
								</div>


								
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Compétences techniques:</h2>
						</div>
						<div class="yui-u">
							<ul class="talent">
								<?php echo $_SESSION['titre_comp'] ;?>
							</ul>

							
						</div>
					</div><!--// .yui-gf-->

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Experience:</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">

							<div class="job">
								<h2> Année d'experience:</h2> 
							</div>

							<div class="job">
								<h2> Poste:</h2>
								<?php echo $_SESSION['poste']=$res1['Poste'];?>
							</div>

							

			</div><!--// .yui-u -->
					</div><!--// .yui-gf -->


					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Langue:</h2>
						</div>
						<div class="yui-u">
							<?php echo $_SESSION['titre_langue'];?>
						</div>
						<div class="yui-u first">
							<h2>niveau:</h2>
						</div>
						<div class="yui-u">
							<?php echo $_SESSION['niveau'];?>
						</div>
					</div><!--// .yui-gf -->


				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		

	</div><!-- // inner -->


</div><!--// doc -->


</body>
</html>

