<?php

	$db = new PDO("mysql:host=localhost; dbname=bddsae203", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

	$usersStatement = $db->prepare("SELECT * FROM sae203_utilisateur");
	$usersStatement->execute();
	$users = $usersStatement->fetchAll();

	$usersInsert = $db->prepare("INSERT INTO sae203_utilisateur(prenomUser, nomUser, mailUser, mdpUser) VALUES (:prenomUser, :nomUser, :mailUser, :mdpUser)");
	

?>