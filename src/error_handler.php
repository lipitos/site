<?php

function setInternalServerError($errno = null, $errstr = null, $errfile = null, $errline = null){

	if(!DEBUG){
		exit;
	}

	if(is_object($errno)){
		$err = $errno;
		$errno = $err->getCode();
		$errstr = $err->getMessage();
		$errfile = $err->getFile();
		$errline = $err->getLine();
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
			echo 'On line ' . $errline . ' in file ' . $errfile;				
			break;
		case E_USER_NOTICE:
			echo '<strong>NOTICE</strong> ['. $errno .'] ' . $errstr . "<br>\n";
			echo 'On line ' . $errline . ' in file ' . $errfile;				
			break;							
		default:
			echo '<strong>Unknow error type</strong> ['. $errno .'] ' . $errstr . "<br>\n";
			echo 'Error on line ' . $errline . ' in file ' . $errfile;			
			break;
	}
	echo '</span>';
	exit;
}

set_error_handler('setInternalServerError');
set_exception_handler('setInternalServerError');