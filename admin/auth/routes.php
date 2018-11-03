<?php

	include __DIR__ . '/bd.php';

if(resolve('/admin/auth/login')){
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		if($login()){
			flash('Autenticado com sucesso', 'success');
			return header('location: /admin');
		}
		flash('Dados inválidos', 'danger');
	}		
	render('admin/auth/login', 'admin/login');

}else if(resolve('/admin/auth/logout')){
	logout();
}