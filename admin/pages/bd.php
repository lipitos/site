<?php

$pages_all = function(){
	//exibe todas as páginas
};

$pages_one = function($id){
	//exibe uma página
};

$pages_create = function(){
	//cria uma página
	flash('Página criada com sucesso', 'success');
};

$pages_edit = function($id){
	//edita uma página
	flash('Página atualizada com sucesso', 'success');
};

$pages_delete = function($id){
	//deleta uma página
	flash('Página removida com sucesso', 'success');
};