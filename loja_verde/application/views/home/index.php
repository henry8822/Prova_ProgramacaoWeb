<?php
$base = __DIR__;
include $base .'\..\layout\menu.php'; 
//debug_print_backtrace();
 ?>
<html>
<head>
	<title>Inicio</title>
	<style>
		body, h1, table {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

h1 {
    color: #333;
}

hr {
    margin: 20px 0;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #007bff;
    color: #fff;
}

.table img {
    max-width: 100%;
    height: auto;
}

/* Style para hover nas linhas da tabela */
.table tbody tr:hover {
    background-color: #f9f9f9;
}

	</style>
</head>
<body>
<h1> Inicio </h1>
	<hr />
	<table class="table">
		<thead>
			<th>Nome</th>
			<th>Marca</th>
			<th>Preço</th>
			<th>Imagem</th>
		</thead>
		<tbody>
		<?php foreach ($data['produtos'] as $produto) { ?>
			<tr>
				<td><?= $produto->getNome() ?> </td>
				<td><?= $produto->getMarca() ?> </td>
				<td><?= $produto->getPreco() ?> </td>
				<td><img style="width: 100px; " src="<?= $produto->getCaminhoImagem() ?>" alt="<?= $produto->getNome() ?>"></img></td>
			</tr>
		<?php } ?>	
		</tbody>
	</table>
</body>
</html>
