<?php session_start(); 
$id=$_SESSION['Id_cv'];
include("connexion.php");
    $sql1="SELECT * FROM experience WHERE   Id_cv='".$_SESSION['Id_cv']."'";
    $result1=mysqli_query($link,$sql1);

    $row1=mysqli_num_rows($result1);
    $res1=mysqli_fetch_assoc($result1);

    if(($row1==1)&&($res1!=false))
    {
    $_SESSION['poste']=$res1['Poste'];
    }
    $sql="SELECT * FROM diplome WHERE Id_cv='".$_SESSION['Id_cv']."'";
    $result=mysqli_query($link,$sql);

    $row=mysqli_num_rows($result);
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
        $_SESSION['situation_familiale']=$res2['Situation_familiale'];
        $_SESSION['loisirs']=$res2['Loisirs'];
    }
    $sql3="SELECT * FROM competence WHERE Id_cv='".$_SESSION['Id_cv']."'";
    $result3=mysqli_query($link,$sql3);
    $res3=mysqli_fetch_assoc($result3);

    if($res3!=false)
    {
        $_SESSION['titre_comp']=$res3['Titre_comp']; 
    }

    
 $em=$_SESSION['email'];
      
$st=$_SESSION['situation_familiale'];

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Layout/css/profile.css">
</head>

<body>
<header id="header" class="alt">
    <div class="logo"><a href="index2.php"><img src="images/logo.png" width="200" height="75" ></a></div>

                
</header>   

<section id="banner">
                <div class="inner">
                    <h4> veuillez modifier votre CV </h4>
                </div>
            </section>
<section class="wrapper style1">
                        <div class="inner">
                            <!-- 2 Columns -->
                                <div class="flex flex-2">
                                    <div class="col col1">
                                        <div class="image round fit">
                                            <img src="images/cvs.png" alt="" />
                                        </div>
                                    </div>
                        </div>
                    </section>
<form action="modification.php" method="POST">

    <label class="left">Email:</label><br>
    <input type="email" name="gmail" value=<?php echo $em?>><br><br>
    
 
    <label class="left">Date de naissance:</label><br>
    <input type="date" name="date_naissance" value=<?php echo $_SESSION['date_naiss']?> ><br><br>
    

    <label class="left">Ville:</label><br>
    <input type="text" name="ville"  ><br><br>
    

    <label class="left">numéro de téléphone:</label><br>
    <input type="text" name="telephone" value=<?php echo $_SESSION['tel']?> ><br><br>
    

    <label class="left"> Nationalité:</label><br>
    <input type="text" name="nationalité"><br><br>
    
    
    
    <label class="left"> Situation familiale:</label><br>
    <input type="radio" name="situation" value="célibataire" ><label>Célibataire</label> <br>
    <input type="radio" name="situation" value="marié" ><label>Marié</label> <br>
    

    <label class="left">Loisirs:</label><br>
    <textarea name="loisir"></textarea><br><br>
    

    <label class="left">Expérience Professionnelle:</label><br><br>
    <label>Année:</label><br>
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

    <input type="submit" name="valider" value="Modifier">
</form>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

<?php

if (isset($_POST['valider'])) 
{
$Email=$_POST['gmail'];
$NumeroTele=$_POST['telephone'];
$dateNaissance=$_POST['date_naissance'];
$Ville=$_POST['ville'];
$situation_fami=$_POST['situation'];
$Loisirs=$_POST['loisir'];
$Nat=$_POST['nationalité'];
$AnnéeExp=$_POST['année_exp'];
$PosteExp=$_POST['poste'];


$Diplome=$_POST['titre'];
$Date_obtention=$_POST['date_obt'];
$lieu_obtention=$_POST['lieu_obt'];

$langue=$_POST['langue'];
$Niveau=$_POST['niveau'];

$Competence=$_POST['comp'];
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=ensakcv;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$req1= $bdd->query("UPDATE experience SET Année_Exp='$AnnéeExp'  WHERE Id_cv='$id'");
$req2= $bdd->query("UPDATE experience SET Poste='$PosteExp' WHERE Id_cv='$id'");
$req3= $bdd->query("UPDATE diplome SET Titre_dip='$Diplome' WHERE Id_cv='$id'");
$req4= $bdd->query("UPDATE diplome SET date_obt='$Date_obtention' WHERE Id_cv='$id'");
$req5= $bdd->query("UPDATE diplome SET lieu_obt='$lieu_obtention' WHERE Id_cv='$id'");
$req6= $bdd->query("UPDATE competence SET Titre_comp='$Competence' WHERE Id_cv='$id'");
$req7= $bdd->query("UPDATE cv SET Tele='$NumeroTele' WHERE Id_cv='$id'");
$req8= $bdd->query("UPDATE cv SET Email='$Email' WHERE Id_cv='$id'");
$req9= $bdd->query("UPDATE cv SET Date_naissance='$dateNaissance' WHERE Id_cv='$id'");
$req10= $bdd->query("UPDATE cv SET  Nationnalité='$Nat' WHERE Id_cv='$id'");
$req11= $bdd->query("UPDATE cv SET  Situation_familiale='$situation_fami' WHERE Id_cv='$id'");
$req12= $bdd->query("UPDATE cv SET  Loisirs='$Loisirs' WHERE Id_cv='$id'");
$req13= $bdd->query("UPDATE langue SET Titre_langue='$langue' WHERE Id_langue=(SELECT Id_langue FROM parler where Id_cv='$id') ");
$req14= $bdd->query("UPDATE langue SET Niveau='$Niveau' WHERE Id_langue=(SELECT Id_langue FROM parler where Id_cv='$id' ) ");
}
?>