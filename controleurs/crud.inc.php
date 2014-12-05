<?php
$h2_titre = ":: Create :: Read :: Update :: Delete :: ";
$table_name = '';
$selectionTableEtOperation = choix_tables(show_DB_tables());
$crud = '';
if(isset($_POST['choixTables'])){
	switch ($_POST['choixTables']) {
		case "daysofweek":
			$crud = crud_dayOfWeeks(daysOfWeek());
			$table_name = '::::::::::::::::::::::::::::::::: Days of Week :::::::::::::::::::::::::::::::::';
		break;
		
		case "players":
			$crud = crud_players(players());
			$table_name = '::::::::::::::::::::::::::::::::: Players :::::::::::::::::::::::::::::::::';
		break;
		
		case "roletype":
			$crud = crud_roletypes(roletype());
			$table_name = '::::::::::::::::::::::::::::::::: Role Type :::::::::::::::::::::::::::::::::';
		break;
		
		case "staffs":
			$crud = crud_staffs(staffs());
			$table_name = '::::::::::::::::::::::::::::::::: Staffs :::::::::::::::::::::::::::::::::';
		break;
		
		case "users":
			$crud = crud_users(users());
			$table_name = '::::::::::::::::::::::::::::::::: Users :::::::::::::::::::::::::::::::::';
		break;
		
		case "teams":
			$crud = crud_teams(teams());
			$table_name = '::::::::::::::::::::::::::::::::: Teams :::::::::::::::::::::::::::::::::';
		break;
		
		case "typesmatchs":
			$crud = crud_typematchs(typesmatchs());
			$table_name = '::::::::::::::::::::::::::::::::: Types MATCHS :::::::::::::::::::::::::::::::::';
		break;
		
		case "teamscoaches":
			$crud = afficher_coachs_par_equipes(coachs_par_teams());
			$table_name = '::::::::::::::::::::::::::::::::: Teams COACHES :::::::::::::::::::::::::::::::::';
		break;
		
		case "teamscalendar":
			$crud = show_teams_calendar(show_teams_calendars());
			$table_name = '::::::::::::::::::::::::::::::::: Teams CALENDAR :::::::::::::::::::::::::::::::::';
		break;
		
		default:
			echo "Cette table ne doit pas etre cruder :) ... du moins pas pour l'instant'";
	}
}
if(isset($_POST['ajouterLabelDaysOfWeek']) or isset($_POST['modifieridDayDaysOfWeek']) or isset($_POST['supprimerLabelDaysOfWeek'])){
	crud_daysOfWeek();
	$crud = crud_dayOfWeeks(daysOfWeek());
}	

if(isset($_POST['ajouterChampsInPlayers']) or isset($_POST['modifierChampsInPlayers']) or isset($_POST['supprimerChampsInPlayers'])){
	crud_player();
	$crud = crud_players(players());
}

if(isset($_POST['ajouterChampsInRoleType']) or isset($_POST['modifierChampsInRoleType']) or isset($_POST['supprimerChampsInRoleType'])){
	crud_roletype();
	$crud = crud_roletypes(roletype());
}

if(isset($_POST['ajouterChampsInStaffs']) or isset($_POST['modifierChampsInStaffs']) or isset($_POST['supprimerChampsInStaffs'])){
	crud_staff();
	$crud = crud_staffs(staffs());
}

if(isset($_POST['ajouterChampsInUsers']) or isset($_POST['modifierChampsInUsers']) or isset($_POST['supprimerChampsInUsers'])){
	crud_user();
	$crud = crud_users(users());
}

if(isset($_POST['ajouterChampsInTeams']) or isset($_POST['modifierChampsInTeams']) or isset($_POST['supprimerChampsInTeams'])){
	crud_team();
	$crud = crud_teams(teams());
}

if(isset($_POST['ajouterChampsInTypeMatchs']) or isset($_POST['modifierChampsInTypeMatchs']) or isset($_POST['supprimerChampsInTypesMatchs'])){
	crud_typematch();
	$crud = crud_typematchs(typesmatchs());
}

if(isset($_POST['modifierTeamCoach'])){
	$crud =  show_coaches_per_team(coachs_par_teams_select());
	$crud .= afficher_coachs_par_equipes(coachs_par_teams());
		
}

if(isset($_POST['addNewCoach'])){
	add_new_coach();
	$crud =  show_coaches_per_team(coachs_par_teams_select());
	$crud .= afficher_coachs_par_equipes(coachs_par_teams());	
}

if(isset($_POST['delCoach'])){
	delete_coach();
	$crud =  show_coaches_per_team(coachs_par_teams_select());
	$crud .= afficher_coachs_par_equipes(coachs_par_teams());	
}

if(isset($_POST['modifierTeamCalendar']) ){
	$crud = show_selected_team_calendar(selected_team_calendar());
	$crud .= show_teams_calendar(show_teams_calendars());
}

if(isset($_POST['updateCalendar']) ){
	updateCalendar();
	$crud = show_selected_team_calendar(selected_team_calendar());
	$crud .= show_teams_calendar(show_teams_calendars());
}
require('vues/crud.inc.php');
?>