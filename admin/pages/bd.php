<?php


function pages_get_data($redirectOnError){
	$title = $_POST['title'];
	$url = $_POST['url'];
	$body = $_POST['body'];

	/*$title = filter_input(INPUT_POST, 'title');
	$url = filter_input(INPUT_POST, 'url');
	$body = filter_input(INPUT_POST, 'body');*/

	if((is_null($title)) || ($title === '')){
		flash('Informe o título', 'error');
		header('location:' . $redirectOnError);
		die();
	}

	return compact('title', 'url', 'body');
}

$pages_all = function() use ($conn){
	$res = $conn->query('SELECT * from pages;');
	return $res->fetch_all(MYSQLI_ASSOC);
};

$pages_one = function($id) use ($conn){
	$sql = 'SELECT * FROM pages WHERE id = ?';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();

	$result = $stmt->get_result();
	return $result->fetch_assoc();
};

$pages_create = function() use ($conn){
	$data = pages_get_data('/admin/pages/create');

	$sql = 'INSERT INTO pages (title, url, body, created, updated) values (?, ?, ?, NOW(), NOW())';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sss', $data['title'], $data['url'], $data['body']);

	flash('Página criada com sucesso', 'success');

	return $stmt->execute();
};

$pages_edit = function($id) use ($conn){
	$data = pages_get_data('/admin/pages/'.$id.'/edit');

	$sql = 'UPDATE pages SET title=?, url=?, body=?, updated=NOW() where id = ?';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sssi', $data['title'], $data['url'], $data['body'], $id);

	flash('Página atualizada com sucesso', 'success');

	return $stmt->execute();
};

$pages_delete = function($id) use ($conn){

	$sql = 'DELETE FROM pages where id = ?';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $id);

	flash('Página removida com sucesso', 'success');

	return $stmt->execute();
};