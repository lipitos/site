<?php

$login = function() use ($conn){
	$login = $_POST['login'] ?? null;
	$password = $_POST['password'] ?? null;

	if((is_null($login)||($login === '')) || (is_null($password)||($password === ''))){
		return false;	
	} 

	$sql = 'SELECT * FROM users WHERE login = ? or email = ?';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ss', $login, $login);

	$stmt->execute();

	$result = $stmt->get_result();
	$user = $result->fetch_assoc();

	if(!$user){
		return false;
	}

	if(password_verify($password, $user['password'])){
		unset($user['password']);
		$_SESSION['auth'] = $user;
		return true;
	}

	return false;
};