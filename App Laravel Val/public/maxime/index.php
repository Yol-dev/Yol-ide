<?php

// informations de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "sti2d";
$basededonnees = "boite_noire";

// connexion à la base de données
$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $basededonnees);

// récupérer donnée dans la base de donnée
$sql = "SELECT * FROM capteurs";
$result = mysqli_query($connexion, $sql);

// récupération du fichier
//$page = file_get_contents("https://maximeue4.github.io/the-blanche-box/index.html");
//echo($page);

// Envoi de la réponse JSON
//echo("Test");


echo("<h1>The Blanche Box</h1>");


echo("<ul>");

echo("<li><a href=''>GPS</a></li>");
echo("<li><a href=''>Température</a></li>");
echo("<li><a href=''>Pression</a></li>");
echo("<li><a href=''>Taux de CO2</a></li>");
echo("<li><a href=''>Accelerometre</a></li>");
echo("<li><a href=''>Gyroscope</a></li>");

echo("</ul>");

echo("<img class='img_home' src='https://urlz.fr/laSk'>");

function add_capteur($name_capteur_fonc, $etat_capteur_fonc){

	echo("<div>");

	echo("<h2>".$name_capteur_fonc."</h2>");

	echo("<h4> Etat : ");
	if($etat_capteur_fonc){
		echo("ON");
	} else {
		echo("OFF");
	}
	echo("</h4>");

	echo("<h3>Données</h3>");
	echo("<canvas></canvas>");
	echo("<button>Télécharger les donées</button>");
	echo("<button>API du Capteur</button>");

	echo("<h2>Température</h2>");
	echo("<h2>Pression</h2>");
	echo("<h2>Taux de CO2</h2>");
	echo("<h2>Accelerometre</h2>");
	echo("<h2>Gyroscope</h2>");

	echo("</div>");

}

add_capteur("GPS", true);

?>

<style>

*{
	padding: 0;
	margin: 0;
	font-family: "Arial", sans-serif;
}

h1{
	text-align: left;
	margin-top: 20px;
	margin-bottom: -20px;
	margin-left: 40px;
}

/* Bar de navigation */
ul{
	list-style-type: none;
	display: flex;
	flex-wrap: wrap;
	padding: 20px;
}

li {
	margin: 20px 20px;
}

a {
	color: black;
	text-decoration: none;
	padding-bottom: 5px;
}

a:hover {
	border-bottom: solid 5px rgb(42,42,42);
}

/* Image principale */
.img_home{
	width: 100vw;
	height: 25vw;

	object-fit: cover;
	object-position: center;
}

</style>
