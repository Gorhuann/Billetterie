<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Identification</title>
		<?php include "connect.php"; ?>
	</head>
	<body>
		<h1>Identification</h1>
		<fieldset>
			<legend>Connexion :</legend>
			<form action="verification.php" method="post">
				<label>Mail Utilisateur :</label>
				<input type="text" name="mailUser" required>
				<label>Mot de passe :</label>
				<input type="password" name="mdpUser" required>
				<input type="submit" name="valider" value="Connexion">
				<p id="errorMSG" style="font-weight: bold;"></p>
				<p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous !</a></p>
			</form>
		</fieldset>
	</body>

	<?php 

		session_start();
		if(isset($_SESSION["mailUser"]))
			header("Location: page.php");

		if (isset($_SESSION["connexionERROR"])) {
			if($_SESSION["connexionERROR"] == "mdp")
				echo '<script> document.getElementById("errorMSG").innerHTML = "Mot de passe incorrect" </script>';
			if($_SESSION["connexionERROR"] == "mail")
				echo '<script> document.getElementById("errorMSG").innerHTML = "Adresse mail incorrect" </script>';
			}
	?>

</html>