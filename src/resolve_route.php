<?php

function resolve($route){
	$path = $_SERVER['PATH_INFO'] ?? '/';

	/* 	/^ marca o ínicio da expressão
		/([a-z]) sequencia de a-z minúscula
		+ indica que deve ser 1 ou mais caracteres
		$ fim da string
	 */
	$route = '/^' . str_replace('/','\/', $route) . '$/';

	if(preg_match($route, $path, $params)){
		return $params;
	}
	return false;
}