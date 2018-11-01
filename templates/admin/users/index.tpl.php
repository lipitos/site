<h3 class="mb-4">Administração de Usuários</h3>

<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>login</th>
			<th>e-mail</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data['users'] as $user): ?> 
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['login']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><a href="#"></a></td>
			<td class="text-right">
			<a href="/admin/users/<?php echo $user['id']; ?>" class="btn btn-outline-primary btn-sm">Ver</a>
			<a href="/admin/users/<?php echo $user['id']; ?>/edit" class="btn btn-outline-info btn-sm">Editar</a>
			<a href="/admin/users/<?php echo $user['id']; ?>/delete" class="btn btn-outline-danger btn-sm confirm">Deletar</a></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<a href="/admin/users/create" class="btn btn-outline-success">Novo</a>