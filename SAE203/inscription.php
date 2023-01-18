<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Identification</title>
		<?php
			session_start();
			if(isset($_SESSION["mailUser"]))
				header("Location: page.php"); 
			include "connect.php"; 
		?>
	</head>
	<style>
		html, body{
			margin: 0;
			padding: 0;
		}

		label{
			display:block;
		}

		.colorMdp{
			border: 2px solid #970404;
			width: 12px;
			height: 12px;
			border-radius: 100%;
			display: none;
			margin-left: 1px;
		}

		div + b{
			display: inline;
			margin-left: 3px;
			font-size: 20px;
			color: #970404;
		}

		input + input{
			display: block;
			margin-top: 3px;
		}

	</style>
	<body>
		<h1>Création de compte</h1>
		<fieldset>
			<legend>Inscription :</legend>
			<form action="verification.php" method="post">
				<label>Nom :</label>
				<input type="text" name="prenomUser" required>
				<label>Prenom :</label>
				<input type="text" name="nomUser" required>
				<label>Mail Utilisateur :</label>
				<input type="text" name="mailUser" required>
				<!-- <p><b>Cette adresse mail est déjà utilisée</b></p> -->
				<label>Mot de passe :</label>
				<input type="password" id="mdp" name="mdpUser" required> 
				<div class="colorMdp"></div>
				<div class="colorMdp"></div>
				<div class="colorMdp"></div>
				<div class="colorMdp"></div>
				<div class="colorMdp"></div>
				<b id="adjMdp"></b>
				<label>Confirmez le mot de passe :</label>
				<input type="password" name="mdpUserConfirm" required>
				<input type="submit" name="valider" value="Inscription">
			</form>
		</fieldset>
		<script>
			var mdp = document.getElementById("mdp");  
			var colorMdp = document.getElementsByClassName("colorMdp"); 
			var adjMdp = document.getElementById("adjMdp"); 

			
			mdp.addEventListener("keyup", function(){
				console.log(mdp.value.length);
				let forceMdp = 0;
				let maj = false;
				let min = false;
				let num = false;
				let charSpe = false;
				let listCharSpe = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

				if(mdp.value.length >= 12)
					forceMdp++;

				for(let i = 0; i < mdp.value.length; i++)
				{
					if(!isNaN(mdp.value[i]))
						num = true;
					else if(listCharSpe.test(mdp.value[i]))
						charSpe = true;
					else
					{
						if(mdp.value[i] == mdp.value[i].toUpperCase())
							maj = true;
						if(mdp.value[i] == mdp.value[i].toLowerCase())
							min = true;
					}
				}

				if(num)
					forceMdp++;
				if(maj)
					forceMdp++;
				if(min)
					forceMdp++;
				if(charSpe)
					forceMdp++;


				switch(forceMdp)
				{
					case 1 : 
					{
						for(let i = 0; i < colorMdp.length; i++)
						{
							colorMdp[i].style.borderColor = "#FF0000";
							if(i == 0)
								colorMdp[i].style.backgroundColor = "#FF0000";
							else
								colorMdp[i].style.backgroundColor = "";
						}
						colorMdp[0].style.backgroundColor = "#FF0000";
						adjMdp.style.color = "#FF0000";
						adjMdp.innerHTML = "Très Faible";
						break;
					}
					case 2 : 
					{
						for(let i = 0; i < colorMdp.length; i++)
						{
							colorMdp[i].style.borderColor = "#FFC100";
							if(i == 0 || i == 1)
								colorMdp[i].style.backgroundColor = "#FFC100";
							else
								colorMdp[i].style.backgroundColor = "";
						}
						colorMdp[0].style.backgroundColor = "#FFC100";
						adjMdp.style.color = "#FFC100";
						adjMdp.innerHTML = "Faible";
						break;
					}
					case 3 : 
					{
						for(let i = 0; i < colorMdp.length; i++)
						{
							colorMdp[i].style.borderColor = "#FFFF00";
							if(i == 0 || i == 1 || i == 2)
								colorMdp[i].style.backgroundColor = "#FFFF00";
							else
								colorMdp[i].style.backgroundColor = "";
						}
						colorMdp[0].style.backgroundColor = "#FFFF00";
						adjMdp.style.color = "#FFFF00";
						adjMdp.innerHTML = "Moyens";
						break;
					}
					case 4 :
					{
						for(let i = 0; i < colorMdp.length; i++)
						{
							colorMdp[i].style.borderColor = "#D6FF00";
							if(i != 4)
								colorMdp[i].style.backgroundColor = "#D6FF00";
							else
								colorMdp[i].style.backgroundColor = "";
						}
						colorMdp[0].style.backgroundColor = "#D6FF00";
						adjMdp.style.color = "#D6FF00";
						adjMdp.innerHTML = "Fort";
						break;
					}	
					case 5 :
					{
						for(let i = 0; i < colorMdp.length; i++)
						{
							colorMdp[i].style.borderColor = "#63FF00";
							colorMdp[i].style.backgroundColor = "#63FF00";
						
						}
						colorMdp[0].style.backgroundColor = "#63FF00";
						adjMdp.style.color = "#63FF00";
						adjMdp.innerHTML = "Très Fort";
						break;
					}
				}

				if(mdp.value.length == 0)
				{
					for(let i = 0; i < colorMdp.length; i++)
						colorMdp[i].style.display = "none";
					adjMdp.innerHTML = " ";
				}
				else 
				{
					for(let i = 0; i < colorMdp.length; i++)
						colorMdp[i].style.display = "inline-block";
				}				
			})
		</script>
	</body>

	<?php 

		if (isset($_SESSION["connexionERROR"])) 
		{
			if($_SESSION["connexionERROR"] == "mdp")
				echo '<script> document.getElementById("errorMSG").innerHTML = "Mot de passe incorrect" </script>';
			if($_SESSION["connexionERROR"] == "mail")
				echo '<script> document.getElementById("errorMSG").innerHTML = "Adresse mail incorrect" </script>';
		}

	?>

</html>