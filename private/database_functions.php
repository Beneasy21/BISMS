<?php

function db_connect(){
	$connection = new mysqli(DB_SERVER, DB_USER,DB_PASS, DB_NAME);
	confirm_db_connect($connection);
	return $connection;
}

function confirm_db_connect(){
	if($connection ->connect_errno){
	$message = "Database connection failed ";
	$message .= $connection->error;
	$message .= " (" .$connection->connect_errno . ")";
	exit($message);
	}
}

function db_disconnect(){
	if(isset($connection)){
		$connection->close();
	}
}
?>