<?php

include __DIR__ . '/bd.php';

if(resolve('/admin/pages')){
	//visualização de todas as páginas
	$pages = $pages_all();
	render('admin/pages/index', 'admin', ['pages' => $pages]);

}else if(resolve('/admin/pages/create')){
	//criação de uma página
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$pages_create();
		return header('location: /admin/pages');
	}
	render('admin/pages/create', 'admin');

}else if($params = resolve('/admin/pages/(\d+)')){
	//visualizar uma página específica
	$page = $pages_one($params[1]);
	render('admin/pages/view', 'admin', ['page' => $page]);

}else if($params = resolve('/admin/pages/(\d+)/edit')){
	//editar uma página	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$pages_edit($params[1]);
		return header('location: /admin/pages/' . $params[1]);
	}
	$page = $pages_one($params[1]);
	render('admin/pages/edit', 'admin', ['page' => $page]);

}else if($params = resolve('/admin/pages/(\d+)/delete')){
	//deletar uma página
	$pages_delete($params[1]);
	return header('location: /admin/pages');
}

