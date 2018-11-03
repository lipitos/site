<?php

function users_get_data($redirectOnError){
	$login = $_POST['login'] ?? null;
	$email = $_POST['email'] ?? null;
	$password = $_POST['password'] ?? null;

	/* $login = filter_input(INPUT_POST, 'login');
	$email = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password'); */

	if((is_null($email)||($email === '')) || (is_null($login)||($login === ''))){
		flash('Informe os campos de e-mail e login', 'error');
		header('location:' . $redirectOnError);
		die();		
	} 

	return compact('login', 'email', 'password');
}

$users_all = function() use ($conn){
	$result = $conn->query('SELECT * from users');
	return $result->fetch_all(MYSQLI_ASSOC);
};

$users_view = function($id) use ($conn){
	$sql = 'SELECT * FROM users WHERE id = ?';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();

	$result = $stmt->get_result();
	return $result->fetch_assoc();
};

$users_create = function() use ($conn){
	$data = users_get_data('/admin/users/create');
	$sql = 'INSERT into users (login, email, password, created, updated) values (?, ?, ?, NOW(), NOW())';

	if(is_null($data['password'])||($data['password'] === '' )){
		flash('Informe a senha', 'error');
		header('location: /admin/users/create');
		die();	
	}else{
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
	}
	
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sss', $data['login'], $data['email'], $data['password']);
	
	flash('Usuário inserido com sucesso', 'success');

	return $stmt->execute();

};

$users_edit = function($id) use ($conn){
	$data = users_get_data('/admin/users/'.$id.'/edit');

	if($data['password']){
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
		$sql = 'UPDATE users SET login=?, email=?, password=?, updated=NOW() where id = ?';
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sssi', $data['login'], $data['email'], $data['password'], $id);
	}else{
		$sql = 'UPDATE users SET login=?, email=?, updated=NOW() where id = ?';
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('ssi', $data['login'], $data['email'], $id);
	}

	flash('Usuário atualizado', 'success');

	return $stmt->execute();
};

$users_delete = function($id) use ($conn){

	$sql = 'DELETE FROM users where id = ?';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $id);

	flash('Usuário removido com sucesso', 'success');

	return $stmt->execute();
};