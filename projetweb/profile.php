<?php 
session_start(); 
$id=$_SESSION['Id_cv'];
?>
<!DOCTYPE html>
<html>
<head>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
	<title>Ensak-Cv</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Layout/css/profile.css">
</head>

<body>
    <header id="header" class="alt">
    <div class="logo"><a href="index2.php"><img src="images/logo.png" width="200" height="75" ></a></div>
</header>

<section id="banner">
				<div class="inner">
					<h4>veuillez remplir votre CV</h4>
				</div>
			</section>


<section class="wrapper style1">
	<div class="inner">
		<div class="flex flex-2">
			<div class="col col1">
				<div class="image round fit">
					<img src="images/cvs.png" alt=""/>
                </div>
			</div>
		</div>
	</div>
</section>




<form action="profile.php" method="POST" enctype="multipart/form-data">
    <label class="left">Email:</label><br>
    <input type="email" name="gmail"><br><br>

    <label class="left">Ville:</label><br>
    <input type="text" name="ville"><br><br>
 
    <label class="left">Date de naissance:</label><br>
    <input type="date" name="date_naissance" ><br><br>
    

     <label class="left">Année de naissance:</label><br>
    <input type="number" name="annee_naissance" min="1900"><br><br>
    

    <label class="left">numéro de téléphone:</label><br>
    <input type="text" name="telephone" ><br><br>
    

    <label class="left"> Nationalité:</label><br>
    <input type="text" name="nationalité"><br><br>
    

    <label class="left"> Situation familiale:</label><br>
    <input type="radio" name="situation" value="célibataire"><label>Célibataire</label> <br>
    <input type="radio" name="situation" value="marié"><label>Marié</label> <br>
    

    <label class="left">Loisirs:</label><br>
    <textarea name="loisir"></textarea><br><br>
    

    <label class="left">Expérience Professionnelle:</label><br><br>
    <label class="left">Année:</label><br>
    <input type="text" name="année_exp"><br>

    <label class="left">Poste:</label><br>
    <textarea name="poste"></textarea> <br><br>
    

    <label class="left">Diplome:</label><br><br>
    <textarea name="titre"></textarea><br><br>

    <label class="left">Date Obtention:</label><br><br>
    <input type="date" name="date_obt"><br><br>

    <label class="left">Lieu Obtention:</label><br><br>
    <input type="text" name="lieu_obt"><br><br>
    

    <label class="left">Langues:</label><br><br>
    <input type="text" name="langue">
    <input type="range" name="niveau" min="0" max="5"><br><br>
    

    <label class="left">Compétence:</label><br>
    <textarea name="comp"></textarea><br><br>

    <label class="left">Image:</label><br>
    <input type="file" name="fichier"><br><br>

    <input type="submit" name="valider" value="Créer le Cv">
</form>

</body>
</html>

<?php
if (isset($_POST['valider'])) 
{

$Email=$_POST['gmail'];
$NumeroTele=$_POST['telephone'];
$dateNaissance=$_POST['date_naissance'];
$Annee_naissance=$_POST['annee_naissance'];

$Nat=$_POST['nationalité'];
$situation_fami=$_POST['situation'];
$Loisirs=$_POST['loisir'];

$AnnéeExp=$_POST['année_exp'];
$PosteExp=$_POST['poste'];
$Ville=$_POST['ville'];


$Diplome=$_POST['titre'];
$Date_obtention=$_POST['date_obt'];
$lieu_obtention=$_POST['lieu_obt'];

$langue=$_POST['langue'];
$Niveau=$_POST['niveau'];

$Competence=$_POST['comp'];

if(isset($_FILES['fichier']) and $_FILES['fichier']['error']==0){
        $dossier= 'images/';
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
        exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png)");
        }
        $nom_photo=$id.$extension_upload;
        if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
        exit("Problem dans le telechargement de l'image, Ressayez");
        }
        $ph_name=$nom_photo;
    }
    else{
        $ph_name="SANS_IMAGE";
    }
try
{
    $bdd =new PDO('mysql:host=localhost;dbname=ensakcv;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$req1= $bdd->query("INSERT into cv(Id_cv,Tele,Email,Ville,Date_naissance,Annee_naissance,Nationnalité,Situation_familiale,Loisirs,image)VALUES('$id','$NumeroTele','$Email','$Ville','$dateNaissance','$Annee_naissance','$Nat','$situation_fami','$Loisirs','$ph_name')");

$req2= $bdd->query("INSERT into competence(Titre_comp,Id_cv) values('$Competence','$id')");
$req3=$bdd->query("INSERT into diplome(Titre_dip,date_obt,lieu_obt,Id_cv) values('$Diplome','$Date_obtention','$lieu_obtention','$id')");
$req4=$bdd->query("INSERT into experience(Année_Exp,Poste,Id_cv) values('$AnnéeExp','$PosteExp','$id')");
$req5=$bdd->query("INSERT into langue(Titre_langue,Niveau) values('$langue','$Niveau')");
$Id_langue= $bdd->lastInsertId();
$req6=$bdd->query("INSERT into parler(Id_cv,Id_langue) values('$id','$Id_langue')");
}
?>


