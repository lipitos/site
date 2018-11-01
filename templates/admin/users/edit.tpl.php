<h3 class='mb-4'>Editar Usuário</h3>

<form action="" method="POST">
	<div class="form-group">
		<label for="usersLogin">Login</label>
		<input name="login" id="usersLogin" type="text" class="form-control" value="<?php echo $data['user']['login']; ?>">
	</div>
	<div class="form-group">
		<label for="usersEmail">E-mail</label>
		<div class="input-group">
		<input name="email" id="usersEmail" type="email" class="form-control" value="<?php echo $data['user']['email']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="usersPassword">Senha</label>
		<div class="input-group">
		<input name="password" id="usersPassword" type="password" class="form-control" value="">
		</div>
	</div>
	<button type="submit" class="btn btn-outline-success">Salvar</button>
</form>
<hr>
<a href="/admin/users/<?php echo $data['user']['id']; ?>" class="btn btn-outline-secondary">Voltar</a>