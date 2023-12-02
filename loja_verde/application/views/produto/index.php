<?php
	$base = __DIR__;
	include $base . '\..\layout\menu.php';
	session_start();
?>
<html>

<head>
	<title>Produtos</title>
	<style>
		body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

hr {
    border-color: #007bff;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-success {
    background-color: #dff0d8;
    border-color: #d6e9c6;
    color: #3c763d;
}

p {
    margin-bottom: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th,
.table td {
    border: 1px solid #dee2e6;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #007bff;
    color: #ffffff;
}

.acao-botao-azul {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid #007bff;
    border-radius: 4px;
    color: #fff;
    background-color: #007bff;
    text-decoration: none;
}

.acao-botao-azul:hover {
    background-color: #0056b3;
    border-color: #004d99;
}

.modal-content {
    width: 100%;
}

.modal-title {
    color: #007bff;
}

.modal-body {
    font-size: 16px;
}

.modal-footer {
    display: flex;
    justify-content: space-between;
}
	</style>
</head>

<body>
	<?php
    if(isset($_SESSION['logado']) && $_SESSION['logado'] === 'true'){
	?>
    <h1> Listar Produtos </h1>
	<hr />
	<?php if(isset($data['msg'])){ ?>
		<div class="alert alert-success" role="alert"> Sucesso </div>
	<?php } ?>
	<p> <a href="/produto/cadastrar"> Adicionar Produto </a> </p>
	<table class="table">
		<thead>
			<th>Código</th>
			<th>Nome</th>
			<th>Marca</th>
			<th>Preço</th>
			<th>Imagem</th>
			<th>Ações</th>
		</thead>
		<tbody>
		<?php foreach ($data['produtos'] as $produto) { ?>
			<tr>
				<td><?= $produto->getCodigo() ?> </td>
				<td><?= $produto->getNome() ?> </td>
				<td><?= $produto->getMarca() ?> </td>
				<td><?= $produto->getPreco() ?> </td>
				<td><img style="width: 100px; " src="<?= $produto->getCaminhoImagem() ?>" alt="<?= $produto->getNome() ?>"></img></td>
				<td>
                        <a href="/produto/iniciarEditar/<?= $produto->getCodigo() ?>" class="acao-botao-azul">Editar</a>
                        <form action="/produto/deletar" method="POST" style="display: inline;">
                            <input type="hidden" value="<?= $produto->getCodigo() ?>" name="codigo" />
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $produto->getCodigo() ?>">
                                Excluir
                            </button>
                            <div class="modal fade" id="exampleModal<?= $produto->getCodigo() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Exclusão</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Você deseja mesmo excluir o produto? 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                            <button type="submit" class="btn btn-primary">Sim</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<?php
    }else{
		
        ?><hr><h2> Faça login clicando <span><a href="/login/">aqui</a></span> para acessar produtos</h2><?php
    }
?>
</body>

</html>