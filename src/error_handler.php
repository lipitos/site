<?php

function setInternalServerError($errno, $errstr, $errfile, $errline){

	if(!DEBUG){
		exit;
	}

	echo '<h1>Error:</h1>';
	echo '<span style="font-weight:bold; color: red">';
	switch($errno){
		case E_USER_ERROR:
			echo '<strong>ERROR</strong> ['. $errno .'] ' . $errstr . "<br>\n";
			echo 'Fatal error on line ' . $errline . ' in file ' . $errfile;
			break;
		case E_USER_WARNING:
			echo '<strong>WARNING</strong> ['. $errno .'] ' . $errstr . "<br>\n";
			break;
		case E_USER_NOTICE:
			echo '<strong>NOTICE</strong> ['. $errno .'] ' . $errstr . "<br>\n";
			break;							
		default:
			echo '<strong>Unknow error type</strong> ['. $errno .'] ' . $errstr . "<br>\n";
			break;
	}
	echo '</span>';
	exit;
}

set_error_handler('setInternalServerError');
set_exception_handler('setInternalServerError');