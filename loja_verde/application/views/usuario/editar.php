<?php
$base = __DIR__;
include $base .'\..\layout\menu.php'; 
 $usuario = $data['usuario'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar.css">
    <title>Editar</title>
	<style>
		body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 0 auto;
}

h1 {
    color: #007bff;
}

.alert {
    padding: 15px;
    margin-top: 20px;
    border: 1px solid #28a745;
    border-radius: 5px;
    background-color: #d4edda;
    color: #155724;
}

.form-control {
    margin-bottom: 15px;
}

.row {
    display: flex;
    justify-content: flex-end;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
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
<h1>Alterar Usuário</h1>
    <?php 
        if(isset($data["msg-editarUsuario"])){
    ?>
    	<div class="alert alert-success" role="alert">editado com sucesso</div>
    <?php } ?>


<form class="form-control" method="POST" action="/usuario/atualizar">
	<input type="hidden" value="<?= $usuario->getId() ?>" name="id"/>
	
	<label class="label"> Nome do Usuário </label>
	<input type="text" value="<?= $usuario->getNome() ?>" name="nomeUsuario" class="form-control"/>
	
	<label class="label"> Senha </label>
	<input type="text" value="<?= $usuario->getSenha() ?>" name="senha" class="form-control" />
	
	<label class="label"> Email </label>
	<input type="text" value="<?= $usuario->getEmail() ?>" name="email" class="form-control" />
	
	<div class="row" style="margin-top: 5px">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Alterar
		</button>
	</div>
	
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Alterar</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Você deseja mesmo alterar o usuario? 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
					<button type="submit" class="btn btn-primary">Sim</button>
				</div>
			</div>
		</div>
	</div>							
</form>
</body>