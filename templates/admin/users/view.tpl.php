<h3 class='mb-4'>Detalhes do Usuário</h3>

<dl class="row">
	<dt class="col-sm-3">Login</dt>
	<dd class="col-sm-9"><?php echo $data['user']['login']; ?></dd>

	<dt class="col-sm-3">E-mail</dt>
	<dd class="col-sm-9"><?php echo $data['user']['email']; ?></dd>

	<dt class="col-sm-3">Criado em</dt>
	<dd class="col-sm-9"><?php echo $data['user']['created']; ?></dd>	

	<dt class="col-sm-3">Atualizado em</dt>
	<dd class="col-sm-9"><?php echo $data['user']['updated']; ?></dd>	
</dl>
<p>
	<a href="/admin/users/<?php echo $data['user']['id']; ?>/edit" class="btn btn-outline-primary">Editar</a>
	<a href="/admin/users/<?php echo $data['user']['id']; ?>/delete" class="btn btn-outline-danger confirm">Remover</a>
	<a href="/admin/users" class="btn btn-outline-secondary">Voltar</a>
</p>
