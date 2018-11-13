<?php

require __DIR__ . '/../admin/pages/bd.php';

if(resolve('/')){
	$pages = $pages_all();
	render('site/home', 'site', compact('pages'));
}else if(resolve('/contato')){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$from = $_POST['from'] ?? null;
		$subject = $_POST['subject'] ?? null;
		$message = $_POST['message'] ?? null;
		$headers = 'From: ' . $from . "\r\n" . 
					'Reply-To: ' . $from . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

		if(mail('fneves.si@gmail.com', $subject, $message)){
			flash('E-mail enviado com sucesso!', 'success');
		}else{
			flash('Erro, e-mail não enviado!', 'error');
		}
		return header('location: /contato');
	}
	$pages = $pages_all();
	render('site/contato', 'site', compact('pages'));
}else if($params = resolve('/(.*)')){
	$pages = $pages_all();
	foreach ($pages as $page){
		if($page['url'] == $params[1]){
			break;
		}
	}
	render('site/page', 'site', compact('pages', 'page'));
}