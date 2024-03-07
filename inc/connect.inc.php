<?php 
	$servername="mysql-kathy.alwaysdata.net";
	$username="kathy";
	$password="whothefuckareyou";
	$database="kathy_grocery";

	// Connexion à la base de données
	$con = mysqli_connect($servername, $username, $password, $database);

	// Vérifier la connexion
	if (!$con) {
	    die("La connexion a échoué : " . mysqli_connect_error());
	}
	
	// Pour effectuer des opérations sur la base de données, vous pouvez maintenant utiliser la variable $con.
?>
