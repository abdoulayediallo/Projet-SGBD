<?php
# Modèle
require('modeles/variablesGlobales.inc.php');
require('modeles/fonctionsHTML.inc.php');
require('modeles/fonctionsSQL.inc.php');
$menu = menu();
$header = headerr();
$footer = footer();

$actions = array('accueil','crud','analyse','update');
if(isset($_GET['action']) && in_array($_GET['action'], $actions)){
	require('controleurs/'.$_GET['action'].'.inc.php');
}else{
	require('controleurs/accueil.inc.php');
}


?>