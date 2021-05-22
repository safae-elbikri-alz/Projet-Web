<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="Layout/css/style.css">
 <link rel="stylesheet" href="fonts/fonts.css">	
 <title>Log In To Your Account</title>
</head>
<body>
	<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
        	<form action="verification.php" method="POST">
                <h1>Ensak Cv</h1>
                <label><b>Login:</b></label>
                <input type="text" placeholder="Entrer votre login" name="login" required="required">

                <label><b>Mot de passe:</b></label>
                <input type="password" placeholder="Entrer votre mot de passe" name="pass" required="required">

                <input type="radio" name="choix" value="etudiant"><b>Etudiant</b>
                <input type="radio" name="choix" value="entreprise"><b>Entreprise</b>
                <input type="radio" name="choix" value="admin"><b>Administrateur</b>

                <input type="submit" name="connecter" value="Se connecter">
            </form>
        </div>
    </body>
</html>




