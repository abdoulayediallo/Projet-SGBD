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
			$queryYearTeam = " SELECT YearTeam FROM teamscoaches WHERE idTeam = $idTeam";
			$resultForYearTeam = $dbh->query($queryYearTeam)->fetch();
			$YearTeam = $resultForYearTeam['YearTeam'];
			$idCoach  = $_POST['newCoach'];
			$query = "INSERT INTO teamscoaches (idTeamCoach, idTeam, idCoach, mainCoach, YearTeam) VALUES($idTeamCoach, $idTeam, $idCoach, 0, $YearTeam)";
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
	
	function show_selected_coatch(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$idTeam = $_POST['nomDeLEquipe'];
		$idTeamCoach = $_POST['idTeamCoachCrud'];
		$query = 'SELECT tc.idTeamCoach, t.idTeam, t.label as "Nom de l\'equipe", u.idUser as "ID USER", tc.idCoach as "ID COACH", concat(u.name," ", u.firstname) as "COACH",tc.YearTeam as "Annee de l\'equipe", tc.mainCoach as "MAIN COACH STATUS" FROM teamscoaches tc, teams t, users u WHERE t.idTeam = tc.idTeam AND u.idUser = tc.idCoach AND tc.idTeam='.$idTeam.' AND idTeamCoach='.$idTeamCoach.'';
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
		$query = 'select tcld.idCalendar, tcld.idTeam, tcld.yearTeam as "Year Team",t.label as "TEAM", tcld.inTeam as "IN TEAM", tcld.outTeam as "OUT TEAM", tcld.scoreIn as "SCORE IN", tcld.scoreOut as "SCORE OUT", tcld.TypeMatch, tcld.modified, tcld.matchNumber as "#MATCH", tcld.timeMatch as "TIME MATCH", tcld.dateMatch as "DATE MATCH" from teams t right join teamscalendar tcld on t.idTeam = tcld.idTeam order by tcld.idCalendar asc';
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
		if(isset($_POST['updateDelegue'])){
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
		}
		$dbh = null;
		
	}

    
	function select_day(){
        $dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
        $query = 'SELECT label FROM daysofweek ORDER BY idDay ASC';
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
	
	function select_team(){
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

	function select_typeMatch_for_calendar(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT idTypeMatch FROM typesmatchs';
		$result = $dbh->query($query);
		$tab = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$tab[$i] = $row['idTypeMatch'];
			$i++;
		}
		$dbh=null;
		return $tab;
}

    function add_new_calendar(){
        $dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'select idTeam from teams where label="'.$_POST['teamSelectedForCalendar'].'"';
		$result = $dbh->query($query);
		$r = $result->fetch();
		$idTeam = $r['idTeam'];
		
        $yearTeam = $_POST['newYearTeamInTeamsCalendarUpdate'];
        $idCalendar = increment_teamscalendarID();
        $inTeam = $_POST['newIndTeamInTeamsCalendarUpdate'];
        $outTeam = $_POST['newOutTeamInTeamsCalendarUpdate'];
        $scoreIn = $_POST['newScoreINInTeamsCalendarUpdate'];
        $scoreOut = $_POST['newScoreOUTInTeamsCalendarUpdate'];
        $modified = $_POST['newmodifiedInTeamsCalendarUpdate'];
        $matchNumber = $_POST['newnumMatchInTeamsCalendarUpdate'];
        $dateMatch = $_POST['newDateMatchInTeamsCalendarUpdate'];
        $timeMatch = $_POST['newTimeMatchInTeamsCalendarUpdate'];
        $TypeMatch = $_POST['newTypeMatchInTeamsCalendarUpdate'];
        $query = "INSERT INTO teamscalendar (idCalendar, idTeam, yearTeam, inTeam, outTeam, scoreIn, scoreOut, modified, matchNumber, dateMatch, timeMatch, TypeMatch) VALUES('$idCalendar', '$idTeam','$yearTeam', '$inTeam', '$outTeam', '$scoreIn', '$scoreOut', '$modified', '$matchNumber', '$dateMatch', '$timeMatch', '$TypeMatch')";
        $dbh->query($query);

        $dbh=null;
    }

	
/***********************************************************************************************************************************************************************/

/**************************************************************TeamsDelegues*************************************************************************************************/

	function afficher_delegues_par_teams(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'SELECT t.label AS "Team", concat(u.name," " ,u.firstname) AS "Delegue", td.* from teamsdelegues td, users u, teams t WHERE u.idUser = td.idDelegue AND 	td.idTeam = t.idTeam ORDER BY `t`.`label` ASC, `td`.`yearTeam` ASC ';
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['Team'] = $row['Team'];
			$tab[$i]['Delegue'] = $row['Delegue'];
			$tab[$i]['idTeamDelegue'] = $row['idTeamDelegue'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['idDelegue'] = $row['idDelegue'];
			$tab[$i]['mainDelegue'] = $row['mainDelegue'];
			$tab[$i]['yearTeam'] = $row['yearTeam'];
			$i++;
		}
		$dbh = null;
		return $tab;
	} 
	
	 
	
	function selected_team_delegueAModifier(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		if(!empty($_POST['idTeamDelegueCRUD'])){
			$idTeamDelegue = $_POST['idTeamDelegueCRUD'];
		}else{
			$idTeamDelegue = $_POST['idTeamDelegueUpDate'];
		}
		$query = "SELECT t.label, u.name, u.firstname, td.idTeamDelegue, td.idTeam, td.idDelegue, td.mainDelegue, td.yearTeam from teamsdelegues td, users u, teams t WHERE u.idUser = td.idDelegue AND td.idTeam = t.idTeam and idTeamDelegue = $idTeamDelegue";
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['label'] = $row['label'];
			$tab[$i]['name'] = $row['name'];
			$tab[$i]['firstname'] = $row['firstname'];
			$tab[$i]['idTeamDelegue'] = $row['idTeamDelegue'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['idDelegue'] = $row['idDelegue'];
			$tab[$i]['mainDelegue'] = $row['mainDelegue'];
			$tab[$i]['yearTeam'] = $row['yearTeam'];
			$i++;
		}
		$dbh = null;
		return $tab;
	}
	
	function delegue_to_add(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$idTeamDelegue = $_POST['idTeamDelegueCRUD'];
		$queryIDTeam = "select idTeam from teamsdelegues where idTeamDelegue = $idTeamDelegue";
		$resultForIdTeam = $dbh->query($queryIDTeam)->fetch();
		$idTeam = $resultForIdTeam['idTeam'];
		$query = 'SELECT u.idUser, concat(u.firstname, " " ,u.name) AS "Delegue" FROM users u, roletype rt, roles r WHERE u.idUser = r.idUser AND r.idRoleType = rt.roleTypeId AND rt.label = "Delegue" AND u.idUser NOT IN (select idDelegue FROM teamsdelegues WHERE idTeam ='.$idTeam.')';
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['idUser'] = $row['idUser'];
			$tab[$i]['Delegue'] = $row['Delegue'];
			$i++;
		}
		$dbh = null;
		
		return $tab;
	}
	
	function update_delegue(){
		$idTeamDelegue = $_POST['idTeamDelegueUpDate'];
		$idDelegue = $_POST['IdDelegueInTeamsDelegueUpdate'];
		$mainDelegue = $_POST['MainDelegueInTeamsDelegueUpdate'];
		$yearTeam = $_POST['YearTeamInTeamsDelegueUpdate'];
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root',''); 
		$query = "UPDATE teamsdelegues SET mainDelegue = $mainDelegue, yearTeam = $yearTeam WHERE idTeamDelegue = $idTeamDelegue and idDelegue = $idDelegue";
		$dbh->query($query);
		$dbh = null;
	}
	
	
	
	function add_new_delegue(){
	
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$newIdTeamDelegue = increment_teamsdeleguesID(); 
		$idDelegue = $_POST['idDelegueToADD'];
		$idTeamDelegue = $_POST['ok'];
		$queryIDTeam = "select idTeam from teamsdelegues where idTeamDelegue = $idTeamDelegue";
		$resultForIdTeam = $dbh->query($queryIDTeam)->fetch();
		$idTeam = $resultForIdTeam['idTeam'];
		$yearTeam = $_POST['YearTeamInTeamsDelegueUpdate'];
		$query = "INSERT INTO teamsdelegues (idTeamDelegue, idDelegue, idTeam, yearTeam, mainDelegue) VALUES('$newIdTeamDelegue', '$idDelegue', '$idTeam', '$yearTeam', 0)";
		$dbh->query($query);
		$dbh = null;
	}
/****************************************************************************************************************************************************************************/

/***********************************************************TeamsRanking*****************************************************************************************************/
	function afficher_classement_teamsRanking(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = " SELECT * FROM teamsranking ";
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['idRanking'] = $row['idRanking'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['myYear'] = $row['myYear'];
			$tab[$i]['name'] = $row['name'];
			$tab[$i]['played'] = $row['played'];
			$tab[$i]['win'] = $row['win'];
			$tab[$i]['lost'] = $row['lost'];
			$tab[$i]['deuce'] = $row['deuce'];
			$tab[$i]['points'] = $row['points'];
			$tab[$i]['dateRanking'] = $row['dateRanking'];
			$i++;
		}
		$dbh = null;
		return $tab;
	}
	
	function add_new_ranking(){
        $dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = 'select idTeam from teams where label="'.$_POST['teamSelectedForRanking'].'"';
		$result = $dbh->query($query);
		$r = $result->fetch();
		$idRanking = increment_teamsrankingID();
		$idTeam = $r['idTeam'];
		$name = $_POST['teamSelectedForRanking'];
        $myYear = $_POST['NEWyearInRankingUpdate'];
        $played = $_POST['NEWplayedInRankingUpdate'];
        $win = $_POST['NEWwinInRankingUpdate'];
        $lost = $_POST['NEWlostInRankingUpdate'];
        $deuce = $_POST['NEWdeuceInRankingUpdate'];
        $points = $_POST['NEWpointsInRankingUpdate'];
        $dateRanking = $_POST['NEWdateRankingUpdate'];
        $query = "INSERT INTO teamsranking (idRanking, idTeam, myYear, name, played, win, lost, deuce, points, dateRanking) VALUES('$idRanking', '$idTeam', '$myYear', '$name', '$played', '$win', '$lost', '$deuce', '$points', '$dateRanking')";
        $dbh->query($query);

        $dbh=null;
    }
	
	function selected_classement_teamsRanking(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		if(!empty($_POST['idRanking'])){
			$idRanking = $_POST['idRanking'];
		}else{
			$idRanking = $_POST['idRankingUpdateCRUD'];
		}
		$query = " SELECT * FROM teamsranking WHERE idRanking = $idRanking";
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['idRanking'] = $row['idRanking'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['myYear'] = $row['myYear'];
			$tab[$i]['name'] = $row['name'];
			$tab[$i]['played'] = $row['played'];
			$tab[$i]['win'] = $row['win'];
			$tab[$i]['lost'] = $row['lost'];
			$tab[$i]['deuce'] = $row['deuce'];
			$tab[$i]['points'] = $row['points'];
			$tab[$i]['dateRanking'] = $row['dateRanking'];
			$i++;
		}
		$dbh = null;
		return $tab;
	}
	
	function update_ranking(){
		$idRanking = $_POST['idRankingUpdateCRUD'];
		$idTeam = $_POST['idTeamInRankingUpdateCRUD'];
		$myYear = $_POST['yearInRankingUpdate'];
		$played = $_POST['playedInRankingUpdate'];
		$win = $_POST['winInRankingUpdate'];
		$lost = $_POST['lostInRankingUpdate'];
		$deuce = $_POST['deuceInRankingUpdate'];
		$points = $_POST['pointsInRankingUpdate'];
		$dateRanking = $_POST['dateRankingUpdate'];
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root',''); 
		$query = "UPDATE teamsranking SET myYear = $myYear, played = $played, win = $win, lost = $lost, deuce = $deuce, points = $points, dateRanking = $dateRanking WHERE idRanking = $idRanking and idTeam = $idTeam";
		$dbh->query($query);
		$dbh = null;
	}
	
	
/****************************************************************************************************************************************************************************/

/****************************************************************************TEAMSTRAINING***********************************************************************************/
	function afficher_training(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = " SELECT tt.idTraining, tt.idTeam, t.label as 'Team', tt.currentYear, tt.dayOfWeek, d.label, tt.startTime, tt.endTime, tt.room FROM teamstraining tt, teams t, daysofweek d WHERE d.idDay = tt.dayOfWeek AND t.idTeam = tt.idTeam";
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['idTraining'] = $row['idTraining'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['Team'] = $row['Team'];
			$tab[$i]['currentYear'] = $row['currentYear'];
			$tab[$i]['dayOfWeek'] = $row['dayOfWeek'];
			$tab[$i]['label'] = $row['label'];
			$tab[$i]['startTime'] = $row['startTime'];
			$tab[$i]['endTime'] = $row['endTime'];
			$tab[$i]['room'] = $row['room'];
			$i++;
		}
		$dbh = null;
		return $tab;
	}
	
	function add_new_training(){
        $dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		
		$queryIdTeam = 'select idTeam from teams where label="'.$_POST['teamSelectedForTraining'].'"';
		$resultIdTeam = $dbh->query($queryIdTeam);
		$rIdTeam = $resultIdTeam->fetch();
		
		$queryIdTDay = 'select idDay from daysofweek where label="'.$_POST['daySelectedForTraining'].'"';
		$resultIdDay = $dbh->query($queryIdTDay);
		$rIdDay = $resultIdDay->fetch();
		
		$idTraining = increment_teamsTrainingID();
		$idTeam = $rIdTeam['idTeam'];
		$dayOfWeek = $rIdDay['idDay'];
        $currentYear = $_POST['NEWyearInTrainingUpdate'];
        $startTime = $_POST['NEWstartInTrainingUpdate'];
        $endTime = $_POST['NEWendInTrainingUpdate'];
        $room = $_POST['NEWroomInTrainingUpdate'];
        $query = "INSERT INTO teamstraining (idTraining, idTeam, dayOfWeek, currentYear, startTime, endTime, room) VALUES('$idTraining', '$idTeam', '$dayOfWeek', '$currentYear', '$startTime', '$endTime', '$room')";
        $dbh->query($query);

        $dbh=null;
    }
	
	function selected_team_training(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		if(!empty($_POST['idTrainingTeamsTraining'])){
			$idTraining = $_POST['idTrainingTeamsTraining'];
		}else{
			$idTraining = $_POST['idTrainingUpdateCRUD'];
		}
		$query = " SELECT tt.idTraining, tt.idTeam, t.label as 'Team', tt.currentYear, tt.dayOfWeek, d.label, tt.startTime, tt.endTime, tt.room FROM teamstraining tt, teams t, daysofweek d WHERE d.idDay = tt.dayOfWeek AND t.idTeam = tt.idTeam AND tt.idTraining = $idTraining";
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['idTraining'] = $row['idTraining'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['Team'] = $row['Team'];
			$tab[$i]['currentYear'] = $row['currentYear'];
			$tab[$i]['dayOfWeek'] = $row['dayOfWeek'];
			$tab[$i]['label'] = $row['label'];
			$tab[$i]['startTime'] = $row['startTime'];
			$tab[$i]['endTime'] = $row['endTime'];
			$tab[$i]['room'] = $row['room'];
			$i++;
		}
		$dbh = null;
		return $tab;
	}
	
	function update_training(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root',''); 
		$idTraining = $_POST['idTrainingUpdateCRUD'];
		$idTeam = $_POST['idTeamInTrainingUpdateCRUD'];
		$startTime = $_POST['startTimeTrainingUpdate'];
		$endTime = $_POST['endTimeTrainingUpdate'];
		$room = $_POST['roomTrainingUpdate'];
		$query = "UPDATE `teamstraining` SET `startTime`='$startTime',`endTime`='$endTime',`room`='$room' WHERE `idTraining`=$idTraining AND `idTeam`=$idTeam";
		// $query = "UPDATE teamstraining SET startTime = $startTime, endTime = $endTime, room = $room WHERE idTraining = $idTraining AND idTeam = $idTeam ";
		$dbh->query($query);
		// echo "$idTraining -- $idTeam -- $startTime -- $endTime -- $room ";
		$dbh = null;
	}
	
	
/****************************************************************************************************************************************************************************/

/****************************************************************************TEAMSGAMES***********************************************************************************/
	function afficher_games(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = " SELECT idTeamGame, tg.idTeam, t.label as 'Team', currentYear, gameDay, d.label, gameTime FROM `teamsgames` tg, teams t, daysofweek d WHERE d.idDay = tg.gameDay AND t.idTeam = tg.idTeam";
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['idTeamGame'] = $row['idTeamGame'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['Team'] = $row['Team'];
			$tab[$i]['currentYear'] = $row['currentYear'];
			$tab[$i]['gameDay'] = $row['gameDay'];
			$tab[$i]['label'] = $row['label'];
			$tab[$i]['gameTime'] = $row['gameTime'];
			$i++;
		}
		$dbh = null;
		return $tab;
	}
	
	function add_new_games(){
        $dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		
		$queryIdTeam = 'SELECT idTeam FROM teams WHERE label="'.$_POST['teamSelectedForGames'].'"';
		$resultIdTeam = $dbh->query($queryIdTeam);
		$rIdTeam = $resultIdTeam->fetch();
		
		$queryIdTDay = 'SELECT idDay FROM daysofweek WHERE label="'.$_POST['daySelectedForGames'].'"';
		$resultIdDay = $dbh->query($queryIdTDay);
		$rIdDay = $resultIdDay->fetch();
		
		$idTeamGame = increment_teamsgamesID();
		$idTeam = $rIdTeam['idTeam'];
		$gameDay = $rIdDay['idDay'];
        $currentYear = $_POST['NEWyearInGamesUpdate'];
        $gameTime = $_POST['NEWgameTimeInGamesUpdate'];
        $query = "INSERT INTO teamsgames (idTeamGame, idTeam, gameDay, currentYear, gameTime) VALUES('$idTeamGame', '$idTeam', '$gameDay', '$currentYear', '$gameTime')";
        $dbh->query($query);

        $dbh=null;
    }
	
	function selected_team_games(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		if(!empty($_POST['idTeamGameTeamsGames'])){
			$idTeamGame = $_POST['idTeamGameTeamsGames'];
		}else{
			$idTeamGame = $_POST['idTeamGameUpdateCRUD'];
		}
		$query = " SELECT idTeamGame, tg.idTeam, t.label as 'Team', currentYear, gameDay, d.label, gameTime FROM `teamsgames` tg, teams t, daysofweek d WHERE d.idDay = tg.gameDay AND t.idTeam = tg.idTeam and tg.idTeamGame = $idTeamGame";
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['idTeamGame'] = $row['idTeamGame'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['Team'] = $row['Team'];
			$tab[$i]['currentYear'] = $row['currentYear'];
			$tab[$i]['gameDay'] = $row['gameDay'];
			$tab[$i]['label'] = $row['label'];
			$tab[$i]['gameTime'] = $row['gameTime'];
			$i++;
		}
		$dbh = null;
		return $tab;
	}
	
	function update_games(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root',''); 
		$idTeamGame = $_POST['idTeamGameUpdateCRUD'];
		$idTeam = $_POST['idTeamInGamesUpdateCRUD'];
		$gameTime = $_POST['gameTimeGamesUpdate'];
		$currentYear = $_POST['currentYearInGamesUpdate'];
		$query = "UPDATE `teamsgames` SET `gameTime`='$gameTime',`currentYear`='$currentYear' WHERE `idTeamGame`=$idTeamGame AND `idTeam`=$idTeam";
		// $query = "UPDATE teamstraining SET startTime = $startTime, endTime = $endTime, room = $room WHERE idTraining = $idTraining AND idTeam = $idTeam ";
		$dbh->query($query);
		// echo "$idTraining -- $idTeam -- $startTime -- $endTime -- $room ";
		$dbh = null;
	}
	
	
/****************************************************************************************************************************************************************************/

/*****************************************************************************TeamsPlayers*********************************************************************************/
	function afficher_teamsplayers(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$query = " SELECT tp.idTeamPlayer, tp.idTeam, t.label, tp.idPlayer, concat(p.name, ' ' , p.firstname) as 'Player', tp.number, tp.position, tp.yearTeam FROM `teamsplayers` tp, teams t, players p WHERE tp.idPlayer = p.idPlayer AND tp.idTeam = t.idTeam ORDER BY `tp`.`idTeam` ASC";
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['idTeamPlayer'] = $row['idTeamPlayer'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['label'] = $row['label'];
			$tab[$i]['idPlayer'] = $row['idPlayer'];
			$tab[$i]['Player'] = $row['Player'];
			$tab[$i]['number'] = $row['number'];
			$tab[$i]['position'] = $row['position'];
			$tab[$i]['yearTeam'] = $row['yearTeam'];
			$i++;
		}
		$dbh = null;
		return $tab;
	}
	
	function players_to_add(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$idTeamPlayer = $_POST['idTeamPlayerCRUD'];
		$queryIDTeam = "SELECT idTeam FROM teamsplayers WHERE idTeamPlayer = $idTeamPlayer";
		$resultForIdTeam = $dbh->query($queryIDTeam)->fetch();
		$idTeam = $resultForIdTeam['idTeam'];
		$query = "SELECT p.idPlayer, concat(p.name, ' ' , p.firstname) as 'Player' 
						FROM players p 
							WHERE p.idPlayer NOT IN (SELECT idPlayer FROM teamsplayers WHERE idTeam = $idTeam)";
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['idPlayer'] = $row['idPlayer'];
			$tab[$i]['Player'] = $row['Player'];
			$i++;
		}
		$dbh = null;
		
		return $tab;
	}
	
	
	function selected_team_players(){
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		if(!empty($_POST['idTeamPlayerCRUD'])){
			$idTeamPlayer = $_POST['idTeamPlayerCRUD'];
		}else{
			$idTeamPlayer = $_POST['idTeamPlayerUpDate'];
		}
		$query = " SELECT tp.idTeamPlayer, tp.idTeam, t.label, tp.idPlayer, concat(p.name, ' ' , p.firstname) as 'Player', tp.number, tp.position, tp.yearTeam FROM `teamsplayers` tp, teams t, players p WHERE tp.idPlayer = p.idPlayer AND tp.idTeam = t.idTeam AND tp.idTeamPlayer = $idTeamPlayer";
		$result = $dbh->query($query);
		$tab = array();
		$i = 0;
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$tab[$i]['idTeamPlayer'] = $row['idTeamPlayer'];
			$tab[$i]['idTeam'] = $row['idTeam'];
			$tab[$i]['label'] = $row['label'];
			$tab[$i]['idPlayer'] = $row['idPlayer'];
			$tab[$i]['Player'] = $row['Player'];
			$tab[$i]['number'] = $row['number'];
			$tab[$i]['position'] = $row['position'];
			$tab[$i]['yearTeam'] = $row['yearTeam'];
			$i++;
		}
		$dbh = null;
		return $tab;
	}
	
	function update_teamsplayers(){
		$idTeamPlayer = $_POST['idTeamPlayerUpDate'];
		$idPlayer = $_POST['IdPlayerInTeamsPlayerUpdate'];
		$number = $_POST['numberInTeamsPlayerUpdate'];
		$position = $_POST['positionInTeamsPlayerUpdate'];
		$yearTeam = $_POST['YearTeamInTeamsPlayerUpdate'];
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root',''); 
		$query = "UPDATE teamsplayers SET number = $number, position = '$position', yearTeam = $yearTeam WHERE idTeamPlayer = $idTeamPlayer AND idPlayer = $idPlayer";
		$dbh->query($query);
		$dbh = null;
	}
	
	
	
	function add_new_player(){
	
		$dbh = new PDO('mysql:host=localhost;dbname=basketproject','root','');
		$newIdTeamPlayer = increment_teamsplayersID(); 
		$idPlayer = $_POST['idPlayereToADD'];
		$idTeamPlayer = $_POST['idTeamPlayerCRUDD'];
		$queryIDTeam = "SELECT idTeam FROM teamsplayers WHERE idTeamPlayer = $idTeamPlayer";
		$resultForIdTeam = $dbh->query($queryIDTeam)->fetch();
		$idTeam = $resultForIdTeam['idTeam'];
		$yearTeam = $_POST['YearTeamInTeamsPlayerUpdate'];
		$position = $_POST['positionInTeamsPlayerUpdate'];
		$number = $_POST['numberInTeamsPlayerUpdate'];
		$query = "INSERT INTO teamsplayers (idTeamPlayer, idTeam, idPlayer, number, position, yearTeam) VALUES('$newIdTeamPlayer', '$idTeam', '$idPlayer', '$number', '$position', '$yearTeam')";
		$dbh->query($query);
		$dbh = null;
	}
	
/****************************************************************************************************************************************************************************/


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