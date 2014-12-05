<?php

# Fonction qui renvoie le code HTML du menu de toutes les pages
function menu() {
	$menu ='<ul>
			<li><a href="?action=accueil">Accueil</a></li>
			<li><a href="?action=analyse">Analyse du contenue </a></li>
			<li><a href="?action=crud">CRUD</a></li>
			</ul>
			';
	return $menu;
}

function footer(){
	$footer = '<p id="copyright">Generated by Diallo Abdoulaye &copy</p>';
	return $footer;
}

function headerr(){
	$header = '
				<!DOCTYPE html>
				<html>
				<head>
					<link rel="stylesheet" href="css/moncss.css">
					<link rel="stylesheet" href="css/model01.css">
					<link rel="stylesheet" href="css/table.css">
					<title>Projet SGBD</title>
					<meta http-equiv="content-type" content="text/html"; charset="iso-8859-1" />
				</head>
	
	';
	return $header;
}

// fonction qui renvoie le nom des tables de la bd dans une liste déroulante.
function choix_tables($tab){

	$menuChoixTableEtOperation = '	<form id ="formulaire" action="" method ="POST">';
	$menuDeSelectionTable = '<select name="choixTables">';
	for ($i=0;$i<count($tab);$i++) {			  
		$menuDeSelectionTable .=	 '<option>'.$tab[$i].'</option>';	
	}
	$menuDeSelectionTable .= '</select>';
	$menuChoixTableEtOperation	.='<p>Choix de la table '.$menuDeSelectionTable.'<input type="submit" value="Afficher la table"></p></form>';
			
			
	return $menuChoixTableEtOperation;
									  
}

/*
***********************************************************Days of WEEKS********************************************************************************
*/
function select_idDay($tab){

	$resultat = '<form id="formulaire" action="" method="POST">';
	$resultat .= '<select name="choixIdDay">';
	for ($i=0;$i<count($tab);$i++) {			  
		$resultat .=	 '<option>'.$tab[$i]['idDay'].'</option>';
	}
	$resultat .= '</select>';
	return $resultat;
}

// fonction qui va afficher toutes les opérations à effectuer sur la table daysofweek
function crud_dayOfWeeks($tab){
	$resultat = '	<form id="formulaire" action="?action=crud" method ="POST">
					<fieldset>
						<legend>Ajouter</legend>
							ID : '.increment_daysOfWeekID() .'<br>
					Label: <input type="text" name="labelDaysOfWeekInput"><input type="submit" name="ajouterLabelDaysOfWeek" value="Ajouter"><br>
					</fieldset>
					<fieldset>
						<legend>Modifier</legend>
							ID du jour a modifier : '.select_idDay(listeIdDaysOfWeek()).'<br>
							Nouveau label : <input type="text" name="nouveauLabelDaysOfWeek"><input type="submit" name="modifieridDayDaysOfWeek" value="Modifier">
					</fieldset>
					<table id="tableBalises">
						<thead>
							<tr>
								<th>ID du jour</th>
								<th>Jour</th>
								</tr>
						</thead>
						<tbody>';
				 
	foreach($tab as $elt) {
		$resultat .=		'<tr>';
		$resultat .=		'<td>'.$elt['idDay'].'</td>';
		$resultat .=		'<td>'.$elt['Label'] .'</td>';
		$resultat .=		'</tr>';	 
	}
		
	$resultat .= '	
					</tbody>
					</thead>
				   </table>
				   </form>';			   
	return $resultat;
}

/*
***********************************************************PLAYERS*********************************************************************************
*/

// fonction qui renvoi les idPlayer de la table players dans un menu déroulant
function select_idPlayer($tab){

	$resultat = '<form id="formulaire" action="" method="POST">';
	$resultat = '<select name="choixIdPlayer">';
	for ($i=0;$i<count($tab);$i++) {			  
		$resultat .=	 '<option>'.$tab[$i]['idPlayer'].'</option>';
	}
	$resultat .= '</select>';
	return $resultat;
}


// fonction qui va afficher toutes les opérations à effectuer sur la table players
function crud_players($tab){
	$resultat = '	<form id="formulaire" action="?action=crud" method ="POST">
						<fieldset>
							<h3>Ajouter</h3>
						ID auto-inc : 						'.increment_playersID() .'<br>
						Name : 					<br>		<input type="text" name="nameInPlayersInput"><br>
						Firstname : 			<br>		<input type="text" name="firstnameInPlayersInput"><br>
						Birthdate YYYY-MM-DD :  <br>		<input type="text" name="birthdateInPlayersInput"><br>
						Email : 				<br>		<input type="text" name="emailInPlayersInput"><br>
						Active : 				<br>		<input type="text" name="activeInPlayersInput"><br>
													<input type="submit" name="ajouterChampsInPlayers" value="Ajouter"><br>
						
						<h3>Modifier</h3>
							ID du joueur a modifier :  '.select_idPlayer(listeIdPlayers()).'<br>
							New name :  			  <br> <input type="text" name="newNamePlayers"><br>
							New firstname : 		  <br> <input type="text" name="newFirstNamePlayers"><br>
							New birthdate YYYY-MM-DD :<br> <input type="text" name="newBirthDatePlayers"><br>
							New email : 			  <br><input type="email" name="newEmailPlayers"><br>
							New active : 			  <br> <input type="text" name="newActivePlayers"><br>
													  <br> <input type="submit" name="modifierChampsInPlayers" value="Modifier">
					</fieldset>
					<p></p>
					<table id="tableBalises">
						<thead>
							<tr>
								<th>ID du joueur</th>
								<th>Nom</th>
								<th>Prenom</th>
								<th>Date de naissance</th>
								<th>Email</th>
								<th>Active</th>
								<th>Operation</th>
								</tr>
						</thead>
						<tbody>';
		foreach($tab as $elt){
			$resultat .=		'<tr>';				
			$resultat .=		'<td>'.$elt['idPlayer'].'</td>';
			$resultat .=		'<td>'.$elt['name'].'</td>';
			$resultat .=		'<td>'.$elt['firstname'].'</td>';
			$resultat .=		'<td>'.$elt['birthdate'].'</td>';
			$resultat .=		'<td>'.$elt['email'].'</td>';
			$resultat .=		'<td>'.$elt['active'].'</td>';
			
			if($elt['active'] == 1){
			$resultat .='<td><input type="submit" class="inactif" name="supprimerChampsInPlayers" value="Rendre Inactif"><input type="radio"  name="idPlayerPlayers" value='.$elt['idPlayer'].'>'.'</td>';
			}else{
			$resultat .='<td><input type="submit" class="actif" name="supprimerChampsInPlayers" value="Rendre   Actif"><input type="radio"  name="idPlayerPlayers" value='.$elt['idPlayer'].'>'.'</td>';
			}
		$resultat .=		'</tr>';	
		}
	$resultat .= '	
					</tbody>
					</thead>
				   </table>
				   </form>';			   
	return $resultat;
}

/*
************************************************************RoleType*************************************************************************************************************
*/

// fonction qui renvoi les idPlayer de la table players dans un menu déroulant
function select_idRoleType($tab){

	$resultat = '<form id="formulaire" action="" method="POST">';
	$resultat = '<select name="choixIdRoleType">';
	for ($i=0;$i<count($tab);$i++) {			  
		$resultat .=	 '<option>'.$tab[$i]['roleTypeId'].'</option>';
	}
	$resultat .= '</select>';
	return $resultat;
}

// fonction qui va afficher toutes les opérations à effectuer sur la table daysofweek
function crud_roletypes($tab){
	$resultat = '	<form id="formulaire" action="?action=crud" method ="POST">
					<fieldset>
						<legend>Ajouter</legend>
					ID : 					'.increment_roletypeID() .'<br>
					Label : 				<br><input type="text" name="labelInRoleTypeInput"><br>
					Ordre : 				<br><input type="text" name="ordreInRoleTypeInput"><br>
					Active :  				<br><input type="text" name="activeInRoleTypeInput"><br>
												<input type="submit" name="ajouterChampsInRoleType" value="Ajouter"><br>
					</fieldset>
					<fieldset>
						<legend>Modifier</legend>
							ID roleType a modifier : '.select_idRoleType(listeIdRoleType()).'<br>
							New Label :  	<br><input type="text" name="newLabelRoleType"><br>
							New ordre : 	<br><input type="text" name="newOrdreRoleType"><br>
							New active : 	<br><input type="text" name="newActiveRoleType"><br>
											<input type="submit" name="modifierChampsInRoleType" value="Modifier">
					</fieldset>
					<table id="tableBalises">
						<thead>
							<tr>
								<th>ID</th>
								<th>Label</th>
								<th>Ordre</th>
								<th>Active</th>
								<th>Cocher pour l\'action</th>
								</tr>
						</thead>
						<tbody>';
				 
	foreach($tab as $elt) {
		$resultat .=		'<tr>';
		$resultat .=		'<td>'.$elt['roleTypeId'].'</td>';
		$resultat .=		'<td>'.$elt['label'] .'</td>';
		$resultat .=		'<td>'.$elt['ordre'] .'</td>';
		$resultat .=		'<td>'.$elt['active'] .'</td>';
		if($elt['active'] == 1){
			$resultat .='<td><input type="submit" class="inactif" name="supprimerChampsInRoleType" value="Rendre Inactif"><input type="radio"  name="idRoleTypeRoletype" value='.$elt['roleTypeId'].'>'.'</td>';
			}else{
			$resultat .='<td><input type="submit" class="actif" name="supprimerChampsInRoleType" value="Rendre   Actif"><input type="radio"  name="idRoleTypeRoletype" value='.$elt['roleTypeId'].'>'.'</td>';
			}
		$resultat .=		'</tr>';	 
	}
		
	$resultat .= '	
					</tbody>
					</thead>
				   </table>
				   </form>';			   
	return $resultat;
}

/*
***********************************************************Staffs****************************************************************************************************
*/

function select_idStaffs($tab){

	$resultat = '<form id="formulaire" action="" method="POST">';
	$resultat = '<select name="choixIdStaffs">';
	for ($i=0;$i<count($tab);$i++) {			  
		$resultat .=	 '<option>'.$tab[$i]['idStaff'].'</option>';
	}
	$resultat .= '</select>';
	return $resultat;
}

// fonction qui va afficher toutes les opérations à effectuer sur la table daysofweek
function crud_staffs($tab){
	$resultat = '	<form id="formulaire" action="?action=crud" method ="POST">
					<fieldset>
						<legend>Ajouter</legend>
					ID : 						'.increment_staffsID() .'<br>
					Label : 					<br><input type="text" name="labelInStaffsInput"><br>
					Ordre : 					<br><input type="text" name="ordreInStaffsInput"><br>
					ShowInMenu :  				<br><input type="text" name="showInMenuInStaffsInput"><br>
					Active : 					<br><input type="text" name="activeInStaffsInput"><br>
												<input type="submit" name="ajouterChampsInStaffs" value="Ajouter"><br>
					</fieldset>
					<fieldset>
						<legend>Modifier</legend>
							ID roleType a modifier : '.select_idStaffs(listeIdStaffs()).'<br>
							New Label :  		<br><input type="text" name="newLabelStaffs"><br>
							New ordre : 		<br><input type="text" name="newOrdreStaffs"><br>
							New ShowInMenu :	<br><input type="text" name="newShowInMenuStaffs"><br>
							New active : 		<br><input type="text" name="newActiveStaffs"><br>
												<input type="submit" name="modifierChampsInStaffs" value="Modifier">
					</fieldset>
					<table id="tableBalises">
						<thead>
							<tr>
								<th>ID</th>
								<th>Label</th>
								<th>Ordre</th>
								<th>ShowInMenu</th>
								<th>Active</th>
								<th>Operation</th>
								</tr>
						</thead>
						<tbody>';
				 
	foreach($tab as $elt) {
		$resultat .=		'<tr>';
		$resultat .=		'<td>'.$elt['idStaff'].'</td>';
		$resultat .=		'<td>'.$elt['label'] .'</td>';
		$resultat .=		'<td>'.$elt['ordre'] .'</td>';
		$resultat .=		'<td>'.$elt['showInMenu'] .'</td>';
		$resultat .=		'<td>'.$elt['active'] .'</td>';
		if($elt['active'] == 1){
			$resultat .='<td><input type="submit" class="inactif" name="supprimerChampsInStaffs" value="Rendre Inactif"><input type="radio"  name="idStaffStaffs" value='.$elt['idStaff'].'>'.'</td>';
			}else{
			$resultat .='<td><input type="submit" class="actif" name="supprimerChampsInStaffs" value="Rendre   Actif"><input type="radio"  name="idStaffStaffs" value='.$elt['idStaff'].'>'.'</td>';
			}
		$resultat .=		'</tr>';	 
	}
		
	$resultat .= '	
					</tbody>
					</thead>
				   </table>
				   </form>';			   
	return $resultat;
}


/*
************************************************************Users*********************************************************************************************************
*/

function select_idUsers($tab){

	$resultat = '<form id="formulaire" action="" method="POST">';
	$resultat = '<select name="choixIdUsers">';
	for ($i=0;$i<count($tab);$i++) {			  
		$resultat .=	 '<option>'.$tab[$i]['idUser'].'</option>';
	}
	$resultat .= '</select>';
	return $resultat;
}

// fonction qui va afficher toutes les opérations à effectuer sur la table daysofweek
function crud_users($tab){
	$resultat = '	<form id="formulaire" action="?action=crud" method ="POST">
					<fieldset>
						<legend>Ajouter</legend>
					ID : 						'.increment_usersID() .'<br>
					Nom : 						<br><input type="text" name="nameInUsersInput"><br>
					Prenom :					<br><input type="text" name="firstnameInUsersInput"><br>
					Mail : 						<br><input type="email" name="mailInUsersInput"><br>
					PW : 						<br><input type="text" name="passwordInUsersInput"><br>
					Active : 					<br><input type="text" name="activeInUsersInput"><br>
												<input type="submit" name="ajouterChampsInUsers" value="Ajouter"><br>
					</fieldset>
					<fieldset>
						<legend>Modifier</legend>
							ID users a modifier : '.select_idUsers(listeIdUsers()).'<br>
							New Name :  		<br><input type="text" name="newNameUsers"><br>
							New Firstname : 	<br><input type="text" name="newFirstNameUsers"><br>
							New Mail :			<br><input type="email" name="newMailUsers"><br>
							New PW :			<br><input type="text" name="newPassWordUsers"><br>
							New active : 		<br><input type="text" name="newActiveUsers"><br>
												<input type="submit" name="modifierChampsInUsers" value="Modifier">
					</fieldset>
					<table id="tableBalises">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nom</th>
								<th>Prenom</th>
								<th>Mail</th>
								<th>Mot de passe</th>
								<th>Active</th>
								<th>Operation</th>
								</tr>
						</thead>
						<tbody>';
				 
	foreach($tab as $elt) {
		$resultat .=		'<tr>';
		$resultat .=		'<td>'.$elt['idUser'].'</td>';
		$resultat .=		'<td>'.$elt['name'] .'</td>';
		$resultat .=		'<td>'.$elt['firstname'] .'</td>';
		$resultat .=		'<td>'.$elt['mail'] .'</td>';
		$resultat .=		'<td>'.$elt['password'] .'</td>';
		$resultat .=		'<td>'.$elt['active'] .'</td>';
		if($elt['active'] == 1){
			$resultat .='<td><input type="submit" class="inactif" name="supprimerChampsInUsers" value="Rendre Inactif"><input type="radio"  name="idUsersUser" value='.$elt['idUser'].'>'.'</td>';
			}else{
			$resultat .='<td><input type="submit" class="actif" name="supprimerChampsInUsers" value="Rendre   Actif"><input type="radio"  name="idUsersUser" value='.$elt['idUser'].'>'.'</td>';
			}
		$resultat .=		'</tr>';	 
	}
		
	$resultat .= '	
					</tbody>
					</thead>
				   </table>
				   </form>';			   
	return $resultat;
}

/************************************************************************************************************************************************************************************/


/*
************************************************************Teams*********************************************************************************************************
*/

function select_idTeams($tab){

	$resultat = '<form id="formulaire" action="" method="POST">';
	$resultat = '<select name="choixIdTeams">';
	for ($i=0;$i<count($tab);$i++) {			  
		$resultat .=	 '<option>'.$tab[$i]['idTeam'].'</option>';
	}
	$resultat .= '</select>';
	return $resultat;
}

// fonction qui va afficher toutes les opérations à effectuer sur la table daysofweek
function crud_teams($tab){
	$resultat = '	<form id="formulaire" action="?action=crud" method ="POST">
					<fieldset>
						<legend>Ajouter</legend>
					ID : 						'.increment_teamsID() .'<br>
					Label : 						<br><input type="text" name="labelInTeamsInput"><br>
					Age Min :					<br><input type="text" name="ageMinInTeamsInput"><br>
					Age Max : 						<br><input type="text" name="ageMaxInTeamsInput"><br>
					Godfather : 						<br><input type="text" name="godFatherInTeamsInput"><br>
					Ordre : 						<br><input type="text" name="ordreInTeamsInput"><br>
					Active : 					<br><input type="text" name="activeInTeamsInput"><br>
												<input type="submit" name="ajouterChampsInTeams" value="Ajouter"><br>
					</fieldset>
					<fieldset>
						<legend>Modifier</legend>
							ID users a modifier : '.select_idTeams(listeIdTeams()).'<br>
							New Label :  		<br><input type="text" name="newLabelTeams"><br>
							New Age Min : 	<br><input type="text" name="newAgeMinTeams"><br>
							New Age Max :			<br><input type="text" name="newAgeMaxTeams"><br>
							New Godfather :			<br><input type="text" name="newGodFatherTeams"><br>
							New Ordre :			<br><input type="text" name="newOrdreTeams"><br>
							New active : 		<br><input type="text" name="newActiveTeams"><br>
												<input type="submit" name="modifierChampsInTeams" value="Modifier">
					</fieldset>
					<table id="tableBalises">
						<thead>
							<tr>
								<th>ID</th>
								<th>Label</th>
								<th>Age Min</th>
								<th>Age Max</th>
								<th>Godfather</th>
								<th>Ordre</th>
								<th>Active</th>
								<th>Operation</th>
								</tr>
						</thead>
						<tbody>';
				 
	foreach($tab as $elt) {
		$resultat .=		'<tr>';
		$resultat .=		'<td>'.$elt['idTeam'].'</td>';
		$resultat .=		'<td>'.$elt['label'] .'</td>';
		$resultat .=		'<td>'.$elt['ageMin'] .'</td>';
		$resultat .=		'<td>'.$elt['ageMax'] .'</td>';
		$resultat .=		'<td>'.$elt['godFather'] .'</td>';
		$resultat .=		'<td>'.$elt['ordre'] .'</td>';
		$resultat .=		'<td>'.$elt['active'] .'</td>';
		if($elt['active'] == 1){
			$resultat .='<td><input type="submit" class="inactif" name="supprimerChampsInTeams" value="Rendre Inactif"><input type="radio"  name="idTeamTeams" value='.$elt['idTeam'].'>'.'</td>';
			}else{
			$resultat .='<td><input type="submit" class="actif" name="supprimerChampsInTeams" value="Rendre   Actif"><input type="radio"  name="idTeamTeams" value='.$elt['idTeam'].'>'.'</td>';
			}
		$resultat .=		'</tr>';	 
	}
		
	$resultat .= '	
					</tbody>
					</thead>
				   </table>
				   </form>';			   
	return $resultat;
}

/************************************************************************************************************************************************************************************/

/*
************************************************************TypeMatch*********************************************************************************************************
*/

function select_idTypeMatch($tab){

	$resultat = '<form id="formulaire" action="" method="POST">';
	$resultat = '<select name="choixIdTypeMatch">';
	for ($i=0;$i<count($tab);$i++) {			  
		$resultat .=	 '<option>'.$tab[$i]['idTypeMatch'].'</option>';
	}
	$resultat .= '</select>';
	return $resultat;
}

// fonction qui va afficher toutes les opérations à effectuer sur la table daysofweek
function crud_typematchs($tab){
	$resultat = '	<form id="formulaire" action="?action=crud" method ="POST">
					<fieldset>
						<legend>Ajouter</legend>
					ID : 						<br><input type="text" name="IDTypeMatchInTypeMatchsInput"><br>
					Type de match : 			<br><input type="text" name="TypeMatchInTypeMatchsInput"><br>
												<input type="submit" name="ajouterChampsInTypeMatchs" value="Ajouter"><br>
					</fieldset>
					<fieldset>
						<legend>Modifier</legend>
							ID : '.select_idTypeMatch(listeIdTypeMatch()).'<br>
							New Type match :  	<br><input type="text" name="newTypeMatchTypeMatchs"><br>
												<input type="submit" name="modifierChampsInTypeMatchs" value="Modifier">
					</fieldset>
					<table id="tableBalises">
						<thead>
							<tr>
								<th>ID</th>
								<th>Type de match</th>
								<th>Operation</th>
								</tr>
						</thead>
						<tbody>';
				 
	foreach($tab as $elt) {
		$resultat .=		'<tr>';
		$resultat .=		'<td>'.$elt['idTypeMatch'].'</td>';
		$resultat .=		'<td>'.$elt['TypeMatch'] .'</td>';
		$resultat .='<td><input type="submit" name="supprimerChampsInTypesMatchs" value="Supprimer"><input type="radio"  name="idTypeMatchTypeMatchs" value='.$elt['idTypeMatch'].'></td>';
			
		$resultat .=		'</tr>';	 
	}
		
	$resultat .= '	
					</tbody>
					</thead>
				   </table>
				   </form>';			   
	return $resultat;
}

/************************************************************************************************************************************************************************************/


/***********************************************************************END OF CRUDPART1*****************************************************************************************/

/***********************************************************************CRUD PART2*****************************************************************************************/
 
/***********************************************************************TEAMSCOACHES*****************************************************************************************/
	
	
	function show_coaches_per_team($tab){
		$resultat  = '<form id="formulaire" action="?action=crud" method ="POST">';
		$resultat .= '<table id="tableBalises">
						<thead>
							<tr>
								<th>TEAM</th>
								<th>ID TEAM</th>
								<th>ID COACH</th>
								<th>COACHE(S)</th>
							</tr>
						</thead>
						<tbody>';
		$resultat .=		'<tr>';				
		$resultat .=		'<td rowspan="10">'.$tab[0]['Teams'].'</td>';
			   $id = '';
		foreach($tab as $elt) {
			   $id = $elt['idTeam'];
		$resultat .=		'<td>'.$elt['idTeam'].'</td>';
		$resultat .=		'<td>'.$elt['idCoach'].'</td>';
		$resultat .=		'<td><input type="radio" name="idCoachToDel" value='.$elt['idCoach'].'><input type="submit" name="delCoach" value="delete" class="actif"> '.$elt['Coach'] .'</td>';
		$resultat .=		'</tr>';	 
	}
		
	$resultat .= '	
					</tbody>
				   </table>	';
	$resultat .= '<hr>
					<legend>ADD A NEW COACH IN '.$tab[0]['Teams'].' </legend>
					<table id="tableBalises">
						<thead>
							<tr>
								<th>ID USER</th>
								<th>COACH</th>
								<th>MAIN COACH</th>
								<th>YEARTEAM</th>
							</tr>
						</thead>
						<tbody>';
						
	$tabCoachNotInTeam = coach_not_in_team();						
	foreach($tabCoachNotInTeam as $elt2){
		$resultat .= '<input type="hidden" name="nomDeLEquipe" value='.$id.'>';
		$resultat .= '<tr>';
		$resultat .= '<td>'.$elt2['idUser'].'</td>';		
		$resultat .= '<td><input type="radio" value='.$elt2['idUser'].' name="newCoach"><input type="submit" value="ADD" name="addNewCoach"  class="actif">'.$elt2['Coach'].'</td>';
		$resultat .= '<td><input type="text" name="newMainCoachTeam"></td>';
		$resultat .= '<td><input type="text" name="newYearTeamTeam"></td>';
		$resultat .= '</tr>';
	}				
					
	$resultat .=   '</tbody>
					</table>		   
				    </form>';
						
	return $resultat;
	}
	
	function afficher_coachs_par_equipes($tab){
		$resultat  = '	<form id="formulaire" action="?action=crud" method ="POST">';
		$resultat .=	'<p>Liste des equipes avec leurs entraineurs</p>';	
		$resultat .=	'<table id="tableBalises" >
						<thead>
							<tr>
								<th>IDTEAMCOACH</th>
								<th>ID TEAM</th>
								<th>Nom de l\'equipe</th>
								<th>ID USER</th>
								<th>ID COACH</th>
								<th>COACH</th>
								<th>YEAR TEAM</th>
								<th>MAIN COACH STATUS</th>
								<th>OPERATION</th>
								</tr>
						</thead>
						<tbody>';
		
		foreach($tab as $elt) {
		$resultat .=		'<tr>';
		$resultat .=		'<td>'.$elt['idTeamCoach'].'</td>';
		$resultat .=		'<td>'.$elt['idTeam'].'</td>';
		$resultat .=		'<td>'.$elt['Nom de l\'equipe'].'</td>';
		$resultat .=		'<td>'.$elt['ID USER'] .'</td>';
		$resultat .=		'<td>'.$elt['ID COACH'] .'</td>';
		$resultat .=		'<td>'.$elt['COACH'] .'</td>';
		$resultat .=		'<td>'.$elt['Annee de l\'equipe'] .'</td>';
		$resultat .=		'<td>'.$elt['MAIN COACH STATUS'] .'</td>';
		$resultat .=		'<td><input type="radio" name="nomDeLEquipe" value='.$elt['idTeam'].'><input type="submit" name="modifierTeamCoach" value="Modifier" class="actif"></td>';
		$resultat .=		'</tr>';	 
	}
		
	$resultat .= '	
					</tbody>
					</thead>
				   </table>
				   </form>';
	return $resultat;
	}
	
/****************************************************************************************************************************************************************************/
/**************************************************************TeamsCalendar*************************************************************************************************/
	function show_teams_calendar($tab){
		$resultat  = '	<form id="formulaire" action="?action=crud" method ="POST">
	                        <fieldset>
	                            <legend>ADD A NEW CALENDAR</legend>

	                 ';
        $teamToSelect = select_team_for_calendar();
        $resultat .= 'TEAM   ';
        $selectMenu = '<select name="teamSelectedForCalendar">';
        for($i = 0; $i<count($teamToSelect); $i++) {
            $selectMenu .=	 '<option>'.$teamToSelect[$i].'</option>';
        }
        $selectMenu .= '</select>';
        $resultat .= '<p>'.$selectMenu.'</p><br>';
        $resultat .= 'YEAR TEAM   <br><input type="text" name="newYearTeamInTeamsCalendarUpdate" ><br>';
        $resultat .= 'IN TEAM     <br><input type="text" name="newIndTeamInTeamsCalendarUpdate" ><br>';
        $resultat .= 'OUT TEAM    <br><input type="text" name="newOutTeamInTeamsCalendarUpdate" ><br>';
        $resultat .= 'SCORE IN    <br><input type="text" name="newScoreINInTeamsCalendarUpdate" ><br>';
        $resultat .= 'SCORE OUT   <br><input type="text" name="newScoreOUTInTeamsCalendarUpdate" ><br>';
        $resultat .= 'TYPE MATCH  <br><input type="text" name="newTypeMatchInTeamsCalendarUpdate" ><br>';
        $resultat .= 'MODIFIED    <br><input type="text" name="newmodifiedInTeamsCalendarUpdate" ><br>';
        $resultat .= '#MATCH      <br><input type="text" name="newnumMatchInTeamsCalendarUpdate" ><br>';
        $resultat .= 'TIME MATCH  <br><input type="text" name="newTimeMatchInTeamsCalendarUpdate" ><br>';
        $resultat .= 'DATE MATCH  <br><input type="text" name="newDateMatchInTeamsCalendarUpdate" ><br>';
        $resultat .= '<input type="submit" name="addNewCalendar" value="ADD"><br>';
        $resultat .= '</fieldset>';
        $resultat .=	'<table id="tableBalises" >
						<thead>
							<tr>
								<th>ID CALENDAR</th>
								<th>ID TEAM</th>
								<th>YEAR TEAM</th>
								<th>TEAM</th>
								<th>IN TEAM</th>
								<th>OUT TEAM</th>
								<th>SCORE IN</th>
								<th>SCORE OUT</th>
								<th>TYPE MATCH</th>
								<th>MODIFIED</th>
								<th>#MATCH</th>
								<th>TIME MATCH</th>
								<th>DATE MATCH</th>
								<th>OPERATION</th>
							</tr>
						</thead>
						<tbody>';
		
		foreach($tab as $elt) {
		$resultat .=		'<tr>';
		$resultat .=		'<td>'.$elt['idCalendar'].'</td>';
		$resultat .=		'<td>'.$elt['idTeam'].'</td>';
		$resultat .=		'<td>'.$elt['Year Team'].'</td>';
		$resultat .=		'<td>'.$elt['TEAM'] .'</td>';
		$resultat .=		'<td>'.$elt['IN TEAM'] .'</td>';
		$resultat .=		'<td>'.$elt['OUT TEAM'] .'</td>';
		$resultat .=		'<td>'.$elt['SCORE IN'] .'</td>';
		$resultat .=		'<td>'.$elt['SCORE OUT'] .'</td>';
		$resultat .=		'<td>'.$elt['TypeMatch'] .'</td>';
		$resultat .=		'<td>'.$elt['modified'] .'</td>';
		$resultat .=		'<td>'.$elt['#MATCH'] .'</td>';
		$resultat .=		'<td>'.$elt['TIME MATCH'] .'</td>';
		$resultat .=		'<td>'.$elt['DATE MATCH'] .'</td>';
		$resultat .=		'<td><input type="radio" name="idCalendarCRUD" value='.$elt['idCalendar'].'><input type="submit" name="modifierTeamCalendar" value="Modifier" class="actif"></td>';
		$resultat .=		'</tr>';	 
	}
		
		$resultat .= '	
					</tbody>
					</thead>
				   </table>
				   </form>';
		return $resultat;
	}
	
	function show_selected_team_calendar($tab){
		$resultat  = '	<form id="formulaire" action="?action=crud" method ="POST">';
		foreach($tab as $elt) {
			$resultat .= 'ID CALENDAR  <br><input type="text" name="YearTeamInTeamsCalendarUpdate" value='.$elt['idCalendar'].'><br><input type="hidden" 							name="idCalendarCRUD" 		value='.$elt['idCalendar'].'>';
			$resultat .= 'ID TEAM      <br><input type="text" name="YearTeamInTeamsCalendarUpdate" value='.$elt['idTeam'].'><br>';
			$resultat .= 'TEAM :       <br><input type="text" name="YearTeamInTeamsCalendarUpdate" value='.$elt['TEAM'].'><br>';
			$resultat .= 'YEAR TEAM   <br><input type="text" name="YearTeamInTeamsCalendarUpdate" value='.$elt['Year Team'].'><br>';
			$resultat .= 'IN TEAM     <br><input type="text" name="IndTeamInTeamsCalendarUpdate" value='.$elt['IN TEAM'].'><br>';
			$resultat .= 'OUT TEAM    <br><input type="text" name="OutTeamInTeamsCalendarUpdate" value='.$elt['OUT TEAM'].'><br>';
			$resultat .= 'SCORE IN    <br><input type="text" name="ScoreINInTeamsCalendarUpdate" value='.$elt['SCORE IN'].'><br>';
			$resultat .= 'SCORE OUT   <br><input type="text" name="ScoreOUTInTeamsCalendarUpdate" value='.$elt['SCORE OUT'].'><br>';
			$resultat .= 'TYPE MATCH  <br><input type="text" name="TypeMatchInTeamsCalendarUpdate" value='.$elt['TypeMatch'].'><br>';
			$resultat .= 'MODIFIED    <br><input type="text" name="modifiedInTeamsCalendarUpdate" value='.$elt['modified'].'><br>';
			$resultat .= '#MATCH      <br><input type="text" name="numMatchInTeamsCalendarUpdate" value='.$elt['#MATCH'].'><br>';
			$resultat .= 'TIME MATCH  <br><input type="text" name="TimeMatchInTeamsCalendarUpdate" value='.$elt['TIME MATCH'].'><br>';
			$resultat .= 'DATE MATCH  <br><input type="text" name="DateMatchInTeamsCalendarUpdate" value='.$elt['DATE MATCH'].'><br>';
		}
			$resultat .= '<input type="submit" value="UPDATE" name="updateCalendar">';
			$resultat .= '</form>';
		return $resultat;
	}
/****************************************************************************************************************************************************************************/

// Fonction qui va afficher le contenue de la table teamsplayers qui contient des joueurs inconnues si il y'en a
function afficher_joueurs_Inconnues($tab){
	if(count($tab)== 0)
		return "Tous les joueurs de teamsplayers se trouvent dans players (pas de clandestins ouff..) !";
	
	$tableau = '<table id="tableBalises">
				  <thead>
					<tr>
						<th>ID du joueur</th>
					</tr>
				  </thead>
			      <tbody>';
				 
	for ($i=0;$i<count($tab);$i++) {
		$tableau .=		'<tr>';
		$tableau .=		'<td>'.$tab[$i]['idPlayer'] .'</td>';
		$tableau .=		'</tr>';
						
	 
	}
	$tableau .= '</tbody>
					</thead>
				   </table>';
	return $tableau;
}

// Fonction qui va afficher les coachs de la table teamscoachs qui ne sont pas dans users
function afficher_coachs_Inconnues($tab){
	if(count($tab)== 0)
		return "Tous les coachs de teamscoachs se trouvent dans coachs (pas de clandestins ouff..) !";
	
	$tableau = '<table id="tableBalises">
				  <thead>
					<tr>
						<th>ID du coach</th>
					</tr>
				  </thead>
			      <tbody>';
				 
	for ($i=0;$i<count($tab);$i++) {
		$tableau .=		'<tr>';
		$tableau .=		'<td>'.$tab[$i]['idCoach'] .'</td>';
		$tableau .=		'</tr>';
						
	 
	}
	$tableau .= '</tbody>
					</thead>
				   </table>';
	return $tableau;
}

// Fonction qui va afficher les types de matchs  de la table teamsc qui ne sont pas dans users
function afficher_typeMatch_Inconnues($tab){
	if(count($tab)== 0)
		return "Tous les coachs de teamscoachs se trouvent dans coachs (pas de clandestins ouff..) !";
	
	$tableau = '<table id="tableBalises">
				  <thead>
					<tr>
						<th>Label du type de match inconnues</th>
					</tr>
				  </thead>
			      <tbody>';
				 
	for ($i=0;$i<count($tab);$i++) {
		$tableau .=		'<tr>';
		$tableau .=		'<td>'.$tab[$i]['TypeMatch'] .'</td>';
		$tableau .=		'</tr>';
						
	 
	}
	$tableau .= '</tbody>
					</thead>
				   </table>';
	return $tableau;
}

// Fonction qui va afficher les idUser dans role n'existant pas dans users
function afficher_idUser_role_Inconnues($tab){
	if(count($tab)== 0)
		return "Tous les idUser dans roles";
	
	$tableau = '<table id="tableBalises">
				  <thead>
					<tr>
						<th>idRole dans roles absent dans users</th>
					</tr>
				  </thead>
			      <tbody>';
				 
	for ($i=0;$i<count($tab);$i++) {
		$tableau .=		'<tr>';
		$tableau .=		'<td>'.$tab[$i]['idUser'] .'</td>';
		$tableau .=		'</tr>';
						
	 
	}
	$tableau .= '</tbody>
					</thead>
				   </table>';
	return $tableau;
}

function afficher_Mail_Incorrectes_USERS($tabUsers){
	if(count($tabUsers)== 0)
		return "Mail valide";
	$tableau = '<table id="tableBalises">
				  <thead>
					<tr>
						<th>Mail incorrectes dans users</th>
					</tr>
				  </thead>
			      <tbody>';
				 
	for ($i=0;$i<count($tabUsers);$i++) {
		$tableau .=		'<tr>';
		$tableau .=		'<td>'.$tabUsers[$i]['mail'] .'</td>';
		$tableau .= 	'</tr>';
	}
	$tableau .= '</tbody>
					</thead>
				   </table>';
	return $tableau;
}

function afficher_Mail_Incorrectes_PLAYERS($tabPlayers){
	if(count($tabPlayers)== 0)
		return "Mail valide";
	$tableau = '<table id="tableBalises">
				  <thead>
					<tr>
						<th>Mail incorrectes dans players</th>
					</tr>
				  </thead>
			      <tbody>';
				 
	for ($i=0;$i<count($tabPlayers);$i++) {
		$tableau .=		'<tr>';
		$tableau .=		'<td>'.$tabPlayers[$i]['email'] .'</td>';
		$tableau .= 	'</tr>';
	}
	$tableau .= '</tbody>
					</thead>
				   </table>';
	return $tableau;
}
?>