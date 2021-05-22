<?php
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		$rep=$_POST['choix'];
		if(empty($login)||empty($pass))
		{
			echo "Saisissez votre Login et votre mot de passe";
		}
		else{
			if($rep=='etudiant')
			{
				include("connexion.php");
				$sql="select * from etudiant where email='".$login."'and apogee='".$pass."'";
				$result=mysqli_query($link,$sql);
				if($row=mysqli_fetch_assoc($result))
				{
					session_start();
					$_SESSION['Apogee']=$row['apogee'];
					$_SESSION['Nom']=$row['nom'];
					$_SESSION['Prenom']=$row['prenom'];
					$_SESSION['Email']=$row['email'];
					$_SESSION['Id_cv']=$row['id_cv'];
					header("location:index2.php");
				}
				else{
					echo"Mot de passe ou login incorrect"."<br/>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			}


			if($rep=='entreprise')
			{
				include("connexion.php");
				$sql="SELECT * from entreprise where email_e='".$login."'and mot_passe='".$pass."'";
				$result=mysqli_query($link,$sql);
				if($row=mysqli_fetch_assoc($result))
				{
					session_start();
					$_SESSION['Email_e']=$row['email_e'];
					$_SESSION['Mot_passe']=$row['mot_passe'];
					header("location:index1.php");
				}
				else{
					echo"Mot de passe ou login incorrect "."<br/>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			}
		


			if($rep=='admin')
			{
				include("connexion.php");
				$sql="SELECT * from administrateur where login='".$login."'and password='".$pass."'";
				$result=mysqli_query($link,$sql);
				if($row=mysqli_fetch_assoc($result))
				{
					session_start();
					$_SESSION['Id_admin']=$row['id_admin'];
					$_SESSION['Login']=$row['login'];
					$_SESSION['Password']=$row['password'];
					header("location:indexadmin.php");
				}
				else{
					echo"Mot de passe ou login incorrect "."<br/>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
		    }
		}
?>