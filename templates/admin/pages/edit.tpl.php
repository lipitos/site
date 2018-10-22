<h3 class="mb-4">Editar Página</h3>

<form action="" method="POST">
	<div class="form-group">
		<label for="pagesTitle">Título</label>
		<input name="title" id="pagesTitle" type="text" class="form-control" placeholder="Título da Página" value="Página Inicial">
	</div>
	<div class="form-group">
		<label for="pagesURL">URL</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">/</span>
			</div>
		<input name="url" id="pagesURL" type="text" class="form-control" placeholder="URL da Página">
		</div>
	</div>
	<div class="form-group">
		<input id="pagesBody" type="hidden" name="body" value="Página Inicial">
		<trix-editor input="pagesBody"></trix-editor>
	</div>
	<button type="submit" class="btn btn-outline-success">Salvar</button>
</form>
<hr>
<a href="/admin/pages" class="btn btn-outline-secondary">Voltar</a>