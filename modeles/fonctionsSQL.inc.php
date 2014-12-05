<?php

// fonction qui affiche la liste des tables de la db
	function show_DB_tables(){
	
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'show tables';
	$result = $dbh->query($query);
	$tab=array();
	$i=0;
	
	if($result->rowcount() != 0) {
		while ($row = $result->fetch()) {
			$tab[$i] = $row['Tables_in_basketproject'];
			$i++;
		}
	}
	$dbh=null;
	return $tab;
}

	function increment_daysOfWeekID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idDay) FROM daysofweek';
	$result = $dbh->query($query);
	$r = $result->fetch();
	$dbh = null;
	return $r['max(idDay)']+1;
}

	function increment_teamsID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idTeam) FROM teams';
	$result = $dbh->query($query);
	$r = $result->fetch();
	$dbh = null;
	return $r['max(idTeam)']+1;
}

	function increment_teamsTrainingID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idTraining) FROM teamstraining';
	$result = $dbh->query($query);
	$r = $result->fetch();
	return $r['max(idTraining)']+1;
}

	function increment_teamscoachesID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idTeamCoach) FROM teamscoaches';
	$result = $dbh->query($query);
	$r = $result->fetch();
	return $r['max(idTeamCoach)']+1;
}

	function increment_teamsdeleguesID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idTeamDelegue) FROM teamsdelegues';
	$result = $dbh->query($query);
	$r = $result->fetch();
	return $r['max(idTeamDelegue)']+1;
}

	function increment_teamscalendarID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idCalendar) FROM teamscalendar';
	$result = $dbh->query($query);
	$r = $result->fetch();
	return $r['max(idCalendar)']+1;
}

	function increment_teamsrankingID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idRanking) FROM teamsranking';
	$result = $dbh->query($query);
	$r = $result->fetch();
	return $r['max(idRanking)']+1;
}

	function increment_teamsgamesID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idTeamGame) FROM teamsgames';
	$result = $dbh->query($query);
	$r = $result->fetch();
	return $r['max(idTeamGame)']+1;
}

	function increment_teamsplayersID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idTeamPlayer) FROM teamsplayers';
	$result = $dbh->query($query);
	$r = $result->fetch();
	return $r['max(idTeamPlayer)']+1;
	}

	function increment_playersID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idPlayer) FROM players';
	$result = $dbh->query($query);
	$r = $result->fetch();
	$dbh = null;
	return $r['max(idPlayer)']+1;
	}

	function increment_staffsID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idStaff) FROM staffs';
	$result = $dbh->query($query);
	$r = $result->fetch();
	$dbh = null;
	return $r['max(idStaff)']+1;
	}

	function increment_roletypeID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(roleTypeId) FROM roletype';
	$result = $dbh->query($query);
	$r = $result->fetch();
	$dbh = null;
	return $r['max(roleTypeId)']+1;
	}

	function increment_usersID(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT max(idUser) FROM users';
	$result = $dbh->query($query);
	$r = $result->fetch();
	$dbh = null;
	return $r['max(idUser)']+1;
	}



/*
***********************************************************Days of WEEK********************************************************************************
*/

	function daysOfWeek(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT * FROM daysofweek ORDER BY idDay ASC';
	$result = $dbh->query($query);
	$tab = array();
	$i=0;
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$tab[$i]['idDay'] = $row['idDay'];
		$tab[$i]['Label'] = $row['Label'];
		$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function listeIdDaysOfWeek(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT idDay FROM daysofweek ORDER BY idDay ASC';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idDay'] = $row['idDay'];
			$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	
	
	function crud_daysOfWeek(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		switch(isset($_POST)){
			case isset($_POST['ajouterLabelDaysOfWeek']):
				if(empty($_POST['labelDaysOfWeekInput'])){
					echo "Veuillez rentrer une valeur ! Le champ ne doit etre vide.";
					return;
				}else{
					$id = increment_daysOfWeekID();
					$insert = "INSERT INTO daysofweek (idDay, Label) VALUES('$id', '$_POST[labelDaysOfWeekInput]')";
					$dbh->query($insert);
				}
			break;
			
			case isset($_POST['modifieridDayDaysOfWeek']):
					$update = "UPDATE daysofweek SET Label = '$_POST[nouveauLabelDaysOfWeek]' WHERE IdDay = '$_POST[choixIdDay]'";
					$dbh->query($update);
			break;
			
			case isset($_POST['supprimerLabelDaysOfWeek']):
				$delete = "DELETE FROM daysofweek WHERE idDay = '$_POST[idDayDaysOfWeek]'";
				$dbh->prepare($delete)->execute();
			break;
			default:
				echo "J'ai foire un truc dans ce menu, mais quoi @@@...";
		}
		$dbh=null;
	}

/*
***********************************************************PLAYERS*********************************************************************************
*/
	function players(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT * FROM players ORDER BY idPlayer ASC';
	$result = $dbh->query($query);
	$tab = array();
	$i=0;
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$tab[$i]['idPlayer'] = $row['idPlayer'];
		$tab[$i]['name'] = $row['name'];
		$tab[$i]['firstname'] = $row['firstname'];
		$tab[$i]['birthdate'] = $row['birthdate'];
		$tab[$i]['email'] = $row['email'];
		$tab[$i]['active'] = $row['active'];
		$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function listeIdPlayers(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT idPlayer FROM players ORDER BY idPlayer ASC';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idPlayer'] = $row['idPlayer'];
			$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function crud_player(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		switch(isset($_POST)){
			case isset($_POST['ajouterChampsInPlayers']):
				if(empty($_POST['nameInPlayersInput']) or empty($_POST['firstnameInPlayersInput']) or empty($_POST['birthdateInPlayersInput']) or empty($_POST['emailInPlayersInput'])){
					echo "Aucun champ ne doit etre vide !";
					return;
				}else{
					$id = increment_playersID();
					$active = empty($_POST['activeInPlayersInput']) ? 1 : $_POST['activeInPlayersInput'];
					$insert = "INSERT INTO players (idPlayer, name, firstname,  birthdate, email, active) VALUES('$id', '$_POST[nameInPlayersInput]','$_POST[firstnameInPlayersInput]','$_POST[birthdateInPlayersInput]','$_POST[emailInPlayersInput]','$active')";
					$dbh->query($insert);
				}
			break;
			
			case isset($_POST['modifierChampsInPlayers']):
					$id = $_POST['choixIdPlayer'];
					$name = $_POST['newNamePlayers'];
					$firstname = $_POST['newFirstNamePlayers'];
					$birthdate = $_POST['newBirthDatePlayers'];
					$email = $_POST['newEmailPlayers'];
					$active = $_POST['newActivePlayers'];
					if(empty($name) AND empty($name) AND empty($firstname) AND empty($birthdate) AND empty($email) AND empty($active)){
						echo "Aucune modification";
						return;
					}
					if(empty($_POST['newNamePlayers'])){
						$query = "SELECT name FROM players WHERE idPlayer =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$name = $r['name'];
						
					}
					if(empty($_POST['newFirstNamePlayers'])){
						$query = "SELECT firstname FROM players WHERE idPlayer =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$firstname = $r['firstname'];
					}
					if(empty($_POST['newBirthDatePlayers'])){
						$query = "SELECT birthdate FROM players WHERE idPlayer =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$birthdate = $r['birthdate'];
					}
					if(empty($_POST['newEmailPlayers'])){
						$query = "SELECT email FROM players WHERE idPlayer =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$email = $r['email'];
					}
					if(empty($_POST['newActivePlayers'])){
						$query = "SELECT active FROM players WHERE idPlayer =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$active = $r['active'];
					}
					$update = "UPDATE players SET name='$name', firstname='$firstname', birthdate='$birthdate', email='$email', active='$active' WHERE idPlayer='$id'";
					$dbh->query($update);
					
			break;
			
			case isset($_POST['supprimerChampsInPlayers']):
				if($_POST['supprimerChampsInPlayers'] == 'Rendre Inactif'){
					if(!isset($_POST['idPlayerPlayers'])){
						echo "Cocher pour rendre inactif !";
					}else{
						$delete = "UPDATE players set active = '0' WHERE idPlayer='".$_POST["idPlayerPlayers"]."'";
						$dbh->query($delete);
					}
					
				}
				elseif(!isset($_POST['idPlayerPlayers'])){
						echo "Cocher pour rendre actif !";
				}else{
						$delete = "UPDATE players set active = '1' WHERE idPlayer='".$_POST["idPlayerPlayers"]."'";
						$dbh->query($delete);
					}
			
			break;
			
			default:
				echo "J'ai foire un truc dans ce menu, mais quoi @@@...";		
				
		}
				
			
	}
		$dbh=null;
	

	/*
************************************************************RoleType*************************************************************************************************************
*/
	function roletype(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT * FROM roletype ORDER BY roleTypeId ASC';
	$result = $dbh->query($query);
	$tab = array();
	$i=0;
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$tab[$i]['roleTypeId'] = $row['roleTypeId'];
		$tab[$i]['label'] = $row['label'];
		$tab[$i]['ordre'] = $row['ordre'];
		$tab[$i]['active'] = $row['active'];
		$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function listeIdRoleType(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT roleTypeId FROM roletype ORDER BY roleTypeId ASC';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['roleTypeId'] = $row['roleTypeId'];
			$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function crud_roletype(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		switch(isset($_POST)){
			case isset($_POST['ajouterChampsInRoleType']):
				if(empty($_POST['labelInRoleTypeInput']) or empty($_POST['ordreInRoleTypeInput'])){
					echo "Aucun champ ne doit etre vide !";
					return;
				}else{
					$id = increment_roletypeID();
					$insert = "INSERT INTO roletype (roleTypeId, label, ordre, active) VALUES('$id', '$_POST[labelInRoleTypeInput]','$_POST[ordreInRoleTypeInput]','$_POST[activeInRoleTypeInput]')";
					$dbh->query($insert);
				}
			break;
			
			case isset($_POST['modifierChampsInRoleType']):
					$id = $_POST['choixIdRoleType'];
					$label = $_POST['newLabelRoleType'];
					$ordre = $_POST['newOrdreRoleType'];
					$active = $_POST['newActiveRoleType'];
					if(empty($label) AND empty($ordre) AND empty($active)){
						echo "Aucune modification";
						return;
					}
					if(empty($_POST['newLabelRoleType'])){
						$query = "SELECT label FROM roletype WHERE roleTypeId =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$label = $r['label'];
						
					}
					if(empty($_POST['newOrdreRoleType'])){
						$query = "SELECT ordre FROM roletype WHERE roleTypeId =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$ordre = $r['ordre'];
					}
					
					if(empty($_POST['newActiveRoleType'])){
						$query = "SELECT active FROM roletype WHERE roleTypeId =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$active = $r['active'];
					}
					$update = "UPDATE roletype SET label='$label', ordre='$ordre', active='$active' WHERE roleTypeId='$id'";
					$dbh->query($update);
					
			break;
			
			case isset($_POST['supprimerChampsInRoleType']):
				if($_POST['supprimerChampsInRoleType'] == 'Rendre Inactif'){
					if(!isset($_POST['idRoleTypeRoletype'])){
						echo "Cocher pour rendre inactif !";
					}else{
						$delete = "UPDATE roletype set active = '0' WHERE roleTypeId='".$_POST["idRoleTypeRoletype"]."'";
						$dbh->query($delete);
					}
					
				}
				elseif(!isset($_POST['idRoleTypeRoletype'])){
						echo "Cocher pour rendre actif !";
				}else{
						$delete = "UPDATE roletype set active = '1' WHERE roleTypeId='".$_POST["idRoleTypeRoletype"]."'";
						$dbh->query($delete);
					}
			
			break;
			default:
				echo "J'ai foire un truc dans ce menu, mais quoi @@@...";
		}
		$dbh=null;
	}


/*
************************************************************Staffs*************************************************************************************************************
*/	
	function staffs(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT * FROM staffs ORDER BY idStaff ASC';
	$result = $dbh->query($query);
	$tab = array();
	$i=0;
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$tab[$i]['idStaff'] = $row['idStaff'];
		$tab[$i]['label'] = $row['label'];
		$tab[$i]['ordre'] = $row['ordre'];
		$tab[$i]['showInMenu'] = $row['showInMenu'];
		$tab[$i]['active'] = $row['active'];
		$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function listeIdStaffs(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT idStaff FROM staffs ORDER BY idStaff ASC';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idStaff'] = $row['idStaff'];
			$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function crud_staff(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		switch(isset($_POST)){
			case isset($_POST['ajouterChampsInStaffs']):
				if(empty($_POST['labelInStaffsInput']) or empty($_POST['ordreInStaffsInput'])){
					echo "Aucun champ ne doit etre vide !";
					return;
				}else{
					$id = increment_staffsID();
					$insert = "INSERT INTO staffs (idStaff, label, ordre, showInMenu, active) VALUES('$id', '$_POST[labelInStaffsInput]','$_POST[ordreInStaffsInput]', '$_POST[showInMenuInStaffsInput]', '$_POST[activeInStaffsInput]')";
					$dbh->query($insert);
				}
			break;
			
			case isset($_POST['modifierChampsInStaffs']):
					$id = $_POST['choixIdStaffs'];
					$label = $_POST['newLabelStaffs'];
					$showInMenu = $_POST['newShowInMenuStaffs'];
					$ordre = $_POST['newOrdreStaffs'];
					$active = $_POST['newActiveStaffs'];
					if(empty($label) AND empty($ordre) AND empty($active) AND empty($showInMenu)){
						echo "Aucune modification";
						return;
					}
					
					if(empty($_POST['newLabelStaffs'])){
						$query = "SELECT label FROM staffs WHERE idStaff =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$label = $r['label'];
						
					}
					
					if(empty($_POST['newOrdreStaffs'])){
						$query = "SELECT ordre FROM staffs WHERE idStaff =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$ordre = $r['ordre'];
					}
					
					
					if(empty($_POST['newShowInMenuStaffs'])){
						$query = "SELECT showInMenu FROM staffs WHERE idStaff =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$showInMenu = $r['showInMenu'];
					}
					
					if(empty($_POST['newActiveStaffs'])){
						$query = "SELECT active FROM staffs WHERE idStaff =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$active = $r['active'];
					}
					$update = "UPDATE staffs SET label='$label', ordre='$ordre', showInMenu='$showInMenu', active='$active' WHERE idStaff='$id'";
					$dbh->query($update);
					
			break;
			
			case isset($_POST['supprimerChampsInStaffs']):
				if($_POST['supprimerChampsInStaffs'] == 'Rendre Inactif'){
					if(!isset($_POST['idStaffStaffs'])){
						echo "Cocher pour rendre inactif !";
					}else{
						$delete = "UPDATE staffs set active = '0' WHERE idStaff='".$_POST["idStaffStaffs"]."'";
						$dbh->query($delete);
					}
					
				}
				elseif(!isset($_POST['idStaffStaffs'])){
						echo "Cocher pour rendre actif !";
						return;
				}else{
						$delete = "UPDATE staffs set active = '1' WHERE idStaff='".$_POST["idStaffStaffs"]."'";
						$dbh->query($delete);
					}
			
			break;	
			default:
				echo "J'ai foire un truc dans ce menu, mais quoi @@@...";
		}
		$dbh=null;
	}


/***********************************************************Users************************************************************************************************************/

	function users(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT * FROM users ORDER BY idUser ASC';
	$result = $dbh->query($query);
	$tab = array();
	$i=0;
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$tab[$i]['idUser'] = $row['idUser'];
		$tab[$i]['name'] = $row['name'];
		$tab[$i]['firstname'] = $row['firstname'];
		$tab[$i]['mail'] = $row['mail'];
		$tab[$i]['password'] = $row['password'];
		$tab[$i]['active'] = $row['active'];
		$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function listeIdUsers(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT idUser FROM users ORDER BY idUser ASC';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idUser'] = $row['idUser'];
			$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function crud_user(){
	
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		switch(isset($_POST)){
		
			case isset($_POST['ajouterChampsInUsers']):
				if(empty($_POST['nameInUsersInput']) or empty($_POST['firstnameInUsersInput']) or empty($_POST['mailInUsersInput']) or empty($_POST['passwordInUsersInput'])){
					echo "Aucun champ ne doit etre vide !";
					return;
				}else{
					$id = increment_usersID();
					$active = empty($_POST['activeInUsersInput']) ? 1 : $_POST['activeInUsersInput'];
					$insert = "INSERT INTO users (idUser, name, firstname, mail, password, active) VALUES('$id', '$_POST[nameInUsersInput]','$_POST[firstnameInUsersInput]', '$_POST[mailInUsersInput]', '$_POST[passwordInUsersInput]','$active')";
					$dbh->query($insert);
				}
			break;
			
			case isset($_POST['modifierChampsInUsers']):
					$id = $_POST['choixIdUsers'];
					$name = $_POST['newNameUsers'];
					$firstname = $_POST['newFirstNameUsers'];
					$mail = $_POST['newMailUsers'];
					$password = $_POST['newPassWordUsers'];
					$active = $_POST['newActiveUsers'];
					if(empty($name) AND empty($firstname) AND empty($mail) AND empty($mail) AND empty($password) AND empty($active)){
						echo "Aucune modification";
						return;
					}
					
					if(empty($_POST['newNameUsers'])){
						$query = "SELECT name FROM users WHERE idUser =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$name = $r['name'];
						
					}
					
					if(empty($_POST['newFirstNameUsers'])){
						$query = "SELECT firstname FROM users WHERE idUser =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$firstname = $r['firstname'];
					}
					
					
					if(empty($_POST['newMailUsers'])){
						$query = "SELECT mail FROM users WHERE idUser =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$mail = $r['mail'];
					}
					
					if(empty($_POST['newPassWordUsers'])){
						$query = "SELECT password FROM users WHERE idUser =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$password = $r['password'];
					}
					
					if(empty($_POST['newActiveUsers'])){
						$query = "SELECT active FROM users WHERE idUser =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$active = $r['active'];
					}
					$update = "UPDATE users SET name='$name', firstname='$firstname', mail='$mail', password='$password', active='$active' WHERE idUser='$id'";
					$dbh->query($update);
					
			break;
			
			case isset($_POST['supprimerChampsInUsers']):
				if($_POST['supprimerChampsInUsers'] == 'Rendre Inactif'){
					if(!isset($_POST['idUsersUser'])){
						echo "Cocher pour rendre inactif !";
						return;
					}else{
						$delete = "UPDATE users set active = '0' WHERE idUser='".$_POST["idUsersUser"]."'";
						$dbh->query($delete);
					}
					
				}
				elseif(!isset($_POST['idUsersUser'])){
						echo "Cocher pour rendre actif !";
						return;
				}else{
						$delete = "UPDATE users set active = '1' WHERE idUser='".$_POST["idUsersUser"]."'";
						$dbh->query($delete);
					}
			
			break;	
			default:
				echo "J'ai foire un truc dans ce menu, mais quoi @@@...";
		}
		$dbh=null;
	
	}
/***********************************************************************************************************************************************************************/

/***********************************************************Teams************************************************************************************************************/

	function teams(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT * FROM teams ORDER BY idTeam ASC';
	$result = $dbh->query($query);
	$tab = array();
	$i=0;
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$tab[$i]['idTeam'] = $row['idTeam'];
		$tab[$i]['label'] = $row['label'];
		$tab[$i]['ageMin'] = $row['ageMin'];
		$tab[$i]['ageMax'] = $row['ageMax'];
		$tab[$i]['godFather'] = $row['godFather'];
		$tab[$i]['ordre'] = $row['ordre'];
		$tab[$i]['active'] = $row['active'];
		$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function listeIdTeams(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT idTeam FROM teams ORDER BY idTeam ASC';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idTeam'] = $row['idTeam'];
			$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function crud_team(){
	
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		switch(isset($_POST)){
		
			case isset($_POST['ajouterChampsInTeams']):
				if(empty($_POST['labelInTeamsInput']) or empty($_POST['ageMinInTeamsInput']) or empty($_POST['ageMaxInTeamsInput']) or empty($_POST['godFatherInTeamsInput']) or empty($_POST['ordreInTeamsInput'])){
					echo "Aucun champ ne doit etre vide !";
					return;
				}else{
					$id = increment_teamsID();
					$active = empty($_POST['activeInTeamsInput']) ? 1 : $_POST['activeInTeamsInput'];
					$insert = "INSERT INTO teams (Idteam, label, ageMin, ageMax, godFather, ordre, active) VALUES('$id', '$_POST[labelInTeamsInput]','$_POST[ageMinInTeamsInput]', '$_POST[ageMaxInTeamsInput]', '$_POST[godFatherInTeamsInput]', '$_POST[ordreInTeamsInput]', '$active')";
					$dbh->query($insert);
				}
			break;
			
			case isset($_POST['modifierChampsInTeams']):
					$id = $_POST['choixIdTeams'];
					$label = $_POST['newLabelTeams'];
					$ageMin = $_POST['newAgeMinTeams'];
					$ageMax = $_POST['newAgeMaxTeams'];
					$godFather = $_POST['newGodFatherTeams'];
					$ordre = $_POST['newOrdreTeams'];
					$active = $_POST['newActiveTeams'];
					if(empty($label) AND empty($ageMin) AND empty($ageMax) AND empty($godFather) AND empty($ordre) AND empty($active)){
						echo "Aucune modification";
						return;
					}
					
					if(empty($_POST['newLabelTeams'])){
						$query = "SELECT label FROM teams WHERE idTeam =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$label = $r['label'];
						
					}
					
					if(empty($_POST['newAgeMinTeams'])){
						$query = "SELECT ageMin FROM teams WHERE idTeam =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$ageMin = $r['ageMin'];
					}
					
					
					if(empty($_POST['newAgeMaxTeams'])){
						$query = "SELECT ageMax FROM teams WHERE idTeam =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$ageMax = $r['ageMax'];
					}
					
					if(empty($_POST['newGodFatherTeams'])){
						$query = "SELECT godFather FROM teams WHERE idTeam =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$godFather = $r['godFather'];
					}
					
					if(empty($_POST['newOrdreTeams'])){
						$query = "SELECT ordre FROM teams WHERE idTeam =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$ordre = $r['ordre'];
					}
					
					if(empty($_POST['newActiveTeams'])){
						$query = "SELECT active FROM teams WHERE idTeam =$id";
						$result = $dbh->query($query);
						$r = $result->fetch();
						$active = $r['active'];
					}
					$update = "UPDATE teams SET label='$label', ageMin='$ageMin', ageMax='$ageMax', godFather='$godFather', ordre='$ordre', active='$active' WHERE idTeam='$id'";
					$dbh->query($update);
					
			break;
			
			case isset($_POST['supprimerChampsInTeams']):
				if($_POST['supprimerChampsInTeams'] == 'Rendre Inactif'){
					if(!isset($_POST['idTeamTeams'])){
						echo "Cocher pour rendre inactif !";
						return;
					}else{
						$delete = "UPDATE teams set active = '0' WHERE idTeam='".$_POST["idTeamTeams"]."'";
						$dbh->query($delete);
					}
					
				}
				elseif(!isset($_POST['idTeamTeams'])){
						echo "Cocher pour rendre actif !";
						return;
				}else{
						$delete = "UPDATE teams set active = '1' WHERE idTeam='".$_POST["idTeamTeams"]."'";
						$dbh->query($delete);
					}
			
			break;	
			default:
				echo "J'ai foire un truc dans ce menu, mais quoi @@@...";
		}
		$dbh=null;
	
	}
/***********************************************************************************************************************************************************************/

/***********************************************************TypeMatch************************************************************************************************************/

	function typesmatchs(){
	$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
	$query = 'SELECT * FROM typesmatchs ORDER BY idTypeMatch ASC';
	$result = $dbh->query($query);
	$tab = array();
	$i=0;
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$tab[$i]['idTypeMatch'] = $row['idTypeMatch'];
		$tab[$i]['TypeMatch'] = $row['TypeMatch'];
		$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function listeIdTypeMatch(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT idTypeMatch FROM typesmatchs ORDER BY idTypeMatch ASC';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idTypeMatch'] = $row['idTypeMatch'];
			$i++;
	}
	$dbh=null;
	return $tab;
	}
	
	function crud_typematch(){
	
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		switch(isset($_POST)){
		
			case isset($_POST['ajouterChampsInTypeMatchs']):
				if(empty($_POST['TypeMatchInTypeMatchsInput'])){
					echo "Aucun champ ne doit etre vide !";
					return;
				}else{
					$id = $_POST['IDTypeMatchInTypeMatchsInput'];
					$insert = "INSERT INTO typesmatchs (idTypeMatch, TypeMatch) VALUES('$id', '$_POST[TypeMatchInTypeMatchsInput]')";
					$dbh->query($insert);
				}
			break;
			
			case isset($_POST['modifierChampsInTypeMatchs']):
					$id = $_POST['choixIdTypeMatch'];
					$typesmatch = $_POST['newTypeMatchTypeMatchs'];
					if(empty($typesmatch)){
						echo "Aucune modification";
						return;
					}
					$update = "UPDATE typesmatchs SET TypeMatch='$typesmatch' WHERE idTypeMatch='$id'";
					$dbh->query($update);
					
			break;
			
			case isset($_POST['supprimerChampsInTypesMatchs']):
					if(!isset($_POST['idTypeMatchTypeMatchs'])){
						echo "Cocher pour rendre inactif !";
						return;
					}else{
						$delete = "DELETE FROM typesmatchs WHERE idTypeMatch='".$_POST["idTypeMatchTypeMatchs"]."'";
						$dbh->query($delete);
						
					}
				
			break;	
			default:
				echo "J'ai foire un truc dans ce menu, mais quoi @@@...";
		}
		$dbh=null;
	
	}
/***********************************************************************************************************************************************************************/

/*******************************************************TeamsCoaches****************************************************************************************************/
	
	function add_new_coach(){
		if(isset($_POST['addNewCoach'])){
			$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
			$idTeamCoach = increment_teamscoachesID();
			$idTeam = $_POST['nomDeLEquipe'];
			$idCoach  = $_POST['newCoach'];
			$mainCoach = $_POST['newMainCoachTeam'];
			$YearTeam = $_POST['newYearTeamTeam'];
			$query = "INSERT INTO teamscoaches (idTeamCoach, idTeam, idCoach, mainCoach, YearTeam) VALUES('$idTeamCoach', '$idTeam', '$idCoach', '$mainCoach', '$YearTeam')";
			$dbh->query($query);
			$dbh=null;
		}
	}
	
	function delete_coach(){
		if(isset($_POST['delCoach'])){
			$idCoach = $_POST['idCoachToDel'];
			$idTeam = $_POST['nomDeLEquipe'];
			$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
			$query = "DELETE FROM teamscoaches WHERE idTeam = $idTeam and idCoach=$idCoach";
			$dbh->query($query);
			$dbh=null;
		}
	}
	
	function coachs_par_teams(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT tc.idTeamCoach, t.idTeam, t.label as "Nom de l\'equipe", u.idUser as "ID USER", tc.idCoach as "ID COACH", concat(u.name," ", u.firstname) as "COACH",tc.YearTeam as "Annee de l\'equipe", tc.mainCoach as "MAIN COACH STATUS" FROM teamscoaches tc, teams t, users u WHERE t.idTeam = tc.idTeam AND u.idUser = tc.idCoach ORDER BY t.label ASC';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idTeamCoach'] = $row['idTeamCoach'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['Nom de l\'equipe'] = $row['Nom de l\'equipe'];
			$tab[$i]['ID USER'] = $row['ID USER'];
			$tab[$i]['ID COACH'] = $row['ID COACH'];
			$tab[$i]['COACH'] = $row['COACH'];
			$tab[$i]['Annee de l\'equipe'] = $row['Annee de l\'equipe'];
			$tab[$i]['MAIN COACH STATUS'] = $row['MAIN COACH STATUS'];
			$i++;
		}	
		
		$dbh=null;
		return $tab;
	}
	
	function coach_not_in_team(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$idTeam = $_POST['nomDeLEquipe'];
		$query = 'SELECT distinct u.idUser, concat(u.name, " ", u.firstname) AS "Coach"
					FROM teamscoaches tc, users u, roles r, roletype rt, teams t
					WHERE tc.idTeam = t.idTeam AND tc.idCoach = u.idUser AND u.idUser = r.idUser AND r.idRoleType = rt.roleTypeId AND rt.label="Coach" AND u.idUser not in (SELECT u.idUser
					FROM teamscoaches tc, users u, roles r, roletype rt, teams t
					WHERE tc.idTeam = t.idTeam AND tc.idCoach = u.idUser AND u.idUser = r.idUser AND r.idRoleType = rt.roleTypeId AND rt.label="Coach" AND t.idTeam ='.$idTeam.')';
		$result = $dbh->query($query);			
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idUser'] = $row['idUser'];
			$tab[$i]['Coach'] = $row['Coach'];
			$i++;
		}			
		$dbh->query($query);
		$dbh=null;		
		return $tab;	
	}


/**
 * @return array
 */
function coachs_par_teams_SELECT(){
		if(isset($_POST['modifierTeamCoach'])){
			$idTeam = $_POST['nomDeLEquipe'];
			$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
			$query = "SELECT t.idTeam, t.label as 'Teams', tc.idCoach, concat(u.name, ' ', u.firstname) as 'Coach'
					FROM teamscoaches tc, users u, roles r, roletype rt, teams t
					WHERE tc.idTeam = t.idTeam AND tc.idCoach = u.idUser AND u.idUser = r.idUser AND r.idRoleType = rt.roleTypeId AND rt.label='Coach' AND t.idTeam=$idTeam";
			$result = $dbh->query($query);
			$tab = array();
			$i=0;
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$tab[$i]['idTeam'] = $row['idTeam'];
				$tab[$i]['Teams'] = $row['Teams'];
				$tab[$i]['idCoach'] = $row['idCoach'];
				$tab[$i]['Coach'] = $row['Coach'];
				$i++;
			}
			$dbh=null;
			return $tab;
		}
		else{
			return;
		}
		
	}
	
	
	
	
	
	

/***********************************************************************************************************************************************************************/

/*******************************************************TeamsCalendar****************************************************************************************************/
	
	function show_teams_calendars(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'select tcld.idCalendar, tcld.idTeam, tcld.yearTeam as "Year Team",t.label as "TEAM", tcld.inTeam as "IN TEAM", tcld.outTeam as "OUT TEAM", tcld.scoreIn as "SCORE IN", tcld.scoreOut as "SCORE OUT", tcld.TypeMatch, tcld.modified, tcld.matchNumber as "#MATCH", tcld.timeMatch as "TIME MATCH", tcld.dateMatch as "DATE MATCH" from teams t, teamscalendar tcld, typesmatchs tm where t.idTeam = tcld.idTeam and tm.idTypeMatch = tcld.TypeMatch ';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idCalendar'] = $row['idCalendar'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['Year Team'] = $row['Year Team'];
			$tab[$i]['TEAM'] = $row['TEAM'];
			$tab[$i]['IN TEAM'] = $row['IN TEAM'];
			$tab[$i]['OUT TEAM'] = $row['OUT TEAM'];
			$tab[$i]['SCORE IN'] = $row['SCORE IN'];
			$tab[$i]['SCORE OUT'] = $row['SCORE OUT'];
			$tab[$i]['TypeMatch'] = $row['TypeMatch'];
			$tab[$i]['modified'] = $row['modified'];
			$tab[$i]['#MATCH'] = $row['#MATCH'];
			$tab[$i]['TIME MATCH'] = $row['TIME MATCH'];
			$tab[$i]['DATE MATCH'] = $row['DATE MATCH'];
			$i++;
		}	
		
		$dbh=null;
		return $tab;
	}
	
	function selected_team_calendar(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT tcld.idCalendar, tcld.idTeam, tcld.yearTeam AS "Year Team",t.label AS "TEAM", tcld.inTeam AS "IN TEAM", tcld.outTeam AS "OUT TEAM", tcld.scoreIn AS "SCORE IN", tcld.scoreOut AS "SCORE OUT", tcld.TypeMatch, tcld.modified, tcld.matchNumber AS "#MATCH", tcld.timeMatch AS "TIME MATCH", tcld.dateMatch AS "DATE MATCH" FROM teams t, teamscalendar tcld, typesmatchs tm WHERE t.idTeam = tcld.idTeam AND tm.idTypeMatch = tcld.TypeMatch AND idCalendar ='.$_POST['idCalendarCRUD'].'';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idCalendar'] = $row['idCalendar'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['Year Team'] = $row['Year Team'];
			$tab[$i]['TEAM'] = $row['TEAM'];
			$tab[$i]['IN TEAM'] = $row['IN TEAM'];
			$tab[$i]['OUT TEAM'] = $row['OUT TEAM'];
			$tab[$i]['SCORE IN'] = $row['SCORE IN'];
			$tab[$i]['SCORE OUT'] = $row['SCORE OUT'];
			$tab[$i]['TypeMatch'] = $row['TypeMatch'];
			$tab[$i]['modified'] = $row['modified'];
			$tab[$i]['#MATCH'] = $row['#MATCH'];
			$tab[$i]['TIME MATCH'] = $row['TIME MATCH'];
			$tab[$i]['DATE MATCH'] = $row['DATE MATCH'];
			$i++;
		}	
		
		$dbh=null;
		return $tab;
	}
	
	function updateCalendar(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$yearTeam = $_POST['YearTeamInTeamsCalendarUpdate'];
		$idCalendar = $_POST['idCalendarCRUD'];
		$inTeam = $_POST['IndTeamInTeamsCalendarUpdate'];
		$outTeam = $_POST['OutTeamInTeamsCalendarUpdate'];
		$scoreIn = $_POST['ScoreINInTeamsCalendarUpdate'];
		$scoreOut = $_POST['ScoreOUTInTeamsCalendarUpdate'];
		$modified = $_POST['modifiedInTeamsCalendarUpdate'];
		$matchNumber = $_POST['numMatchInTeamsCalendarUpdate'];
		$dateMatch = $_POST['DateMatchInTeamsCalendarUpdate'];
		$timeMatch = $_POST['TimeMatchInTeamsCalendarUpdate'];
		$TypeMatch = $_POST['TypeMatchInTeamsCalendarUpdate'];
		$query = "UPDATE teamscalendar SET  yearTeam = '$yearTeam', inTeam = '$inTeam', outTeam = '$outTeam', scoreIn = '$scoreIn', scoreOut = '$scoreOut', modified = '$modified', matchNumber = '$matchNumber', dateMatch = '$dateMatch', timeMatch = '$timeMatch', TypeMatch = '$TypeMatch' WHERE idCalendar = '$idCalendar'";
		$dbh->query($query);
		$dbh = null;
	}

    function select_team_for_calendar(){
        $dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
        $query = 'SELECT label FROM teams';
        $result = $dbh->query($query);
        $tab = array();
        $i=0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $tab[$i] = $row['label'];
            $i++;
        }
        $dbh=null;
        return $tab;
    }


    function add_new_calendar(){
        $dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');

    }

	
/***********************************************************************************************************************************************************************/

// Fonction qui va afficher (si il y'en a) 
//les joueurs de la table teamsplayers 
//qui ne sont pas dans la table players.
   function joueursInconnues(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT t.idPlayer FROM teamsplayers t WHERE t.idPlayer NOT IN (SELECT idPlayer FROM players)';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		if($result->rowcount() == 0){
			echo 'Tous les joueurs de teamsplayers se trouvent dans players (pas de clANDestins ouff..)';
		}else{
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idPlayer'] = $row['idPlayer'];
			$i++;
			}	
		}
		$dbh=null;
		return $tab;

	}

// Fonction qui va afficher (si il y'en a) 
//les coachs de la table teamscoachs
//qui ne sont pas dans la table users.
	function coachsInconnues(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT idCoach FROM teamsCoaches WHERE idCoach NOT IN (SELECT idUser FROM users)';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		if($result->rowcount() == 0){
			echo 'Tous les coachs de teamscoachs se trouvent dans users (pas de clANDestins ouff..)';
		}else{
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idCoach'] = $row['idCoach'];
			$i++;
			}	
		}
		$dbh=null;
		return $tab;

	}

// Fonction qui va afficher (si il y'en a )
// des types de match inexistants dans la table typesmatchs
	function typeDeMatchInconnue(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT TypeMatch FROM teamscalendar WHERE TypeMatch not in (SELECT idTypeMatch FROM typesmatchs)';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		if($result->rowcount() == 0){
			echo 'Tous les coachs de teamscoachs se trouvent dans users (pas de clANDestins ouff..)';
		}else{
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['TypeMatch'] = $row['TypeMatch'];
			$i++;
			}	
		}
		$dbh=null;
		return $tab;

	}

// Fonction qui va afficher (si il y'en a )
// des idUser de roles n'existant pas dans users
	function roleUserInconnue(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT idUser FROM roles WHERE idUser not in (SELECT idUser FROM users)';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		if($result->rowcount() == 0){
			echo 'Everything is fine :)';
		}else{
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['idUser'] = $row['idUser'];
			$i++;
			}	
		}
		$dbh=null;
		return $tab;

	}

//Fonction qui vérifie si un mail est écrit correctement
	function checkMailUsers(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT * FROM users WHERE mail not regexp "^[[:alpha:]]+(([[:alnum:]]+)|([\-\._]?[[:alnum:]]+)*)*@[[:alpha:]]+(([[:alnum:]]+)|([\-\._]?[[:alnum:]]+)*)*\.[[:alpha:]]{2,8}$"';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		if($result->rowcount() == 0){
			echo 'Mail Valide';
		}else{
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['mail'] = $row['mail'];
			$i++;
			}	
		}
		$dbh=null;
		return $tab;

	}

	function checkMailPlayers(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT * FROM players WHERE email not regexp "^[[:alpha:]]+(([[:alnum:]]+)|([\-\._]?[[:alnum:]]+)*)*@[[:alpha:]]+(([[:alnum:]]+)|([\-\._]?[[:alnum:]]+)*)*\.[[:alpha:]]{2,8}$"';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		if($result->rowcount() == 0){
			echo 'Mail Valide';
		}else{
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i]['email'] = $row['email'];
			$i++;
			}	
		}
		$dbh=null;
		return $tab;

	}

?>