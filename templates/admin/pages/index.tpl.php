<h3 class='mb-4'>Administração de Páginas</h3>

<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Título</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data['pages'] as $page) : ?>
		<tr>
			<td><?php echo $page['id']; ?></td>
			<td><a href="/admin/pages/<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a></td>
			<td class="text-right">
			<a href="/admin/pages/<?php echo $page['id']; ?>" class="btn btn-outline-primary btn-sm">Ver</a>
			<a href="/admin/pages/<?php echo $page['id']; ?>/edit" class="btn btn-outline-info btn-sm">Editar</a>
			<a href="/admin/pages/<?php echo $page['id']; ?>/delete" class="btn btn-outline-danger btn-sm confirm">Deletar</a>
			</td>			
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<a href="/admin/pages/create" class="btn btn-outline-success">Novo</a>