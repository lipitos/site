<h3 class='mb-4'>Criar Novo Usuário</h3>

<form action="" method="POST">
	<div class="form-group">
		<label for="usersLogin">Login</label>
		<input name="login" id="usersLogin" type="text" class="form-control" placeholder="Login">
	</div>
	<div class="form-group">
		<label for="usersEmail">E-mail</label>
		<div class="input-group">
		<input name="email" id="usersEmail" type="email" class="form-control" placeholder="E-mail">
		</div>
	</div>
	<div class="form-group">
		<label for="usersPassword">Senha</label>
		<div class="input-group">
		<input name="password" id="usersPassword" type="password" class="form-control" placeholder="Senha">
		</div>
	</div>
	<button type="submit" class="btn btn-outline-success">Salvar</button>
</form>
<hr>
<a href="/admin/users" class="btn btn-outline-secondary">Voltar</a>