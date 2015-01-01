<?php
$h2_titre = ": :: Analyse du contenu :: :";
$afficherJoueurInconnues = afficher_joueurs_Inconnues(joueursInconnues());
$afficherCoachInconnues = afficher_coachs_Inconnues(coachsInconnues());
$afficherTypeMatchInconnues = afficher_typeMatch_Inconnues(typeDeMatchInconnue());
$afficheridUserRolesInconnues = afficher_idUser_role_Inconnues(roleUserInconnue());
$afficherMailIncorrectesUSERS = afficher_Mail_Incorrectes_USERS(checkMailUsers());
$afficherMailIncorrectesPLAYERS = afficher_Mail_Incorrectes_PLAYERS(checkMailPlayers());
require('vues/analyse.inc.php');
?>