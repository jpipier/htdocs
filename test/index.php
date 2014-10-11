<?php
$adresse = "http://www.covoiturage.fr/rechercher-resultats?fn=toulouse&fc=43.604652|1.444209&fcc=FR&tn=Paris&tc=48.856614|2.3522219&tcc=FR&db=29%2F05%2F2014&sort=trip_date&order=asc&limit=10&page=1"; // adresse de la page à exploiter
echo "$adresse <br>"; // afficher l'adresse
$page = file_get_contents ($adresse); // récupérer le contenu de la page
echo $page ; // afficher la page
?>
 