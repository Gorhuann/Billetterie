<?php
	session_start();
	include "connect.php";
	$_SESSION = []; //Mesure de sécurité: puisque cette page sert à l'inscription ou connexion la session doit être vide 
	if(isset($_POST["valider"]))
	{

		// -------- PARTIE CONNEXION -------

		if($_POST["valider"] == "Connexion")
		{
			foreach ($users as $user) 
			{
				if($_POST["mailUser"] == $user["mailUser"])
				{
					if($_POST["mdpUser"] == $user["mdpUser"])
					{
						$_SESSION["mailUser"] = $_POST["mailUser"];
						$_SESSION["prenomUser"] = $user["prenomUser"];
						$_SESSION["nomUser"] = $user["nomUser"];
						if($user["admin"] == 1)
							$_SESSION["admin"] = 1;
						header("Location: page.php");
						break;
					}
					else
					{
						$_SESSION["connexionERROR"] = "mdp";
						header("Location: identification.php");
						break;
					}
				}
				else
				{
					$_SESSION["connexionERROR"] = "mail";
					header("Location: identification.php");
				}
			}
		}

		// -------- PARTIE INSCRIPTION -------

		else if($_POST["valider"] == "Inscription")
		{
			foreach ($users as $user) 
			{
				if ($_POST["mailUser"] == $user["mailUser"]) 
				{
					$_SESSION["inscriptionERROR"] == "mail";
					header("Location: inscription.php");
					break;
				}
				else if($_POST["mdpUser"] != $_POST["mdpUserConfirm"])
				{
					$_SESSION["inscriptionERROR"] == "mdp";
					header("Location: inscription.php");
					break;
				}
			}
			$usersInsert->execute(array(
				"prenomUser" => $_POST["prenomUser"],
				"nomUser" => $_POST["nomUser"],
				"mailUser" => $_POST["mailUser"],	
				"mdpUser" => $_POST["mdpUser"])
			);
			
		}
	}
?>