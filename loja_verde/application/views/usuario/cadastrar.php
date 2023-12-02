<?php
	$base = __DIR__;
	include $base .'\..\layout\menu.php'; 
	//debug_print_backtrace();
?>
<head>
	<title>Cadastrar</title>
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
</style>
</head>
<body>
<?php 
// Imprime uma mensagem "Sucesso" caso o cadastro tenha sido feito sem problemas.
    if(isset($data["msg-cadastrado"])){
?>
		<div class="alert alert-success" role="alert"> Cadastrado com Sucesso </div>
	<?php } ?>
<h1>Cadastrar Usuário</h1>
<!-- Formulário para o cadastro do produto -->
<form action="/usuario/salvar" method="POST" class="form-control">
	<label> Nome Usuário </label>
	<input type="text" name="nomeUsuario" class="form-control" required/>
	
	<label> Email </label>
	<input type="text" name="email" class="form-control" required/>
	
	<label> Senha </label>
	<input type="text" name="senha" class="form-control" required/>
	
	<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		Cadastrar
	</button>
</form>
</body>