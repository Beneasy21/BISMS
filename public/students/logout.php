<?php
	  require_once('../../private/initialize.php');

	  $session->logoutStudent();
	  redirect_to(urlFor('students/login.php'));
?>