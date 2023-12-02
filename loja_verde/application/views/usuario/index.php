<?php
	$base = __DIR__;
	include $base . '\..\layout\menu.php';
	session_start();
?>
<html>

<head>
	<title>Usuários</title>
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

        .alert {
            padding: 15px;
            margin-top: 20px;
            border: 1px solid #007bff;
            border-radius: 5px;
            background-color: #cce5ff;
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
		<h1> Usuários cadastrados no sistema </h1>
		<hr/>
		<?php if( isset($data['msg'])){ ?> 
			<div class="alert alert-success" role="alert"> Sucesso </div>
		<?php } ?>
		<p> <a href="/usuario/cadastrar"> Adicionar Usuario </a> </p>
		<table class="table">
			<thead>
				<th>Id</th>
				<th>Nome</th>
				<th>Senha</th>
				<th>Email</th>
				<th>Ações</th>
			</thead>
			<tbody>
			<?php foreach ($data['usuarios'] as $usuario) { ?>
				<tr>
					<td><?= $usuario->getId() ?> </td>
					<td><?= $usuario->getNome() ?> </td>
					<td><?= $usuario->getSenha() ?> </td>
					<td><?= $usuario->getEmail() ?> </td>
					<td>
                        <a href="/usuario/iniciarEditar/<?= $usuario->getId() ?>" class="acao-botao-azul">Editar</a>
                        <form action="/usuario/deletar" method="post" style="display: inline;">
                            <input type="hidden" value="<?= $usuario->getId() ?>" name="id" />
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $usuario->getId() ?>">
                                Excluir
                            </button>
                            <div class="modal fade" id="exampleModal<?= $usuario->getId() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Exclusão</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Você deseja mesmo excluir o usuário?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                            <button type="submit" class="btn btn-primary">Sim</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</form> 
					</span>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	<?php }else{
		?><hr><h2> Faça login clicando <span><a href="/login/">aqui</a></span> para acessar usuarios</h2><?php
	}  ?>
</body>
</html>

</html>