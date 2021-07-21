<?php 
	require_once('../../private/initialize.php');

	if($Term == '1' || $Term =='2'){
		$nextTerm = NextTerm::NextTermBegins($Session, $Term);	
	}
		$nextTerm = NextTerm::NewSessionBegins($Session, $Term);
	echo $nextTerm->explanation;	
?>
