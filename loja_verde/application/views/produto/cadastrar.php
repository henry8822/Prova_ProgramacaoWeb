<?php
	$base = __DIR__;
	include $base .'\..\layout\menu.php'; 
	//debug_print_backtrace();
?>

<head>
	<Title>Cadastrar Produto</Title>
	<style>
		body, h1, form, input, label, button {
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
    margin-bottom: 20px;
}

.form-control {
    margin-bottom: 10px;
    padding: 8px;
    width: 100%;
    box-sizing: border-box;
}

.btn {
    padding: 8px 16px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

/* Modal */
.modal {
    display: none;
    position: fixed;
    top: 50px;
    left: 50%;
    max-width: 400px;
    width: 80%;
    transform: translateX(-50%);
    align-items: center; 
    justify-content: center;
}

.modal-dialog {
    position: relative;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ddd;
}

.modal-title {
    margin: 0;
}

.modal-body {
    padding: 20px;
}

.modal-footer {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
}

.btn-close {
    background-color: transparent;
    border: none;
    cursor: pointer;
    font-size: 18px;
    color: #555;
}
	</style>
</head>
<body>
<?php 
// Imprime uma mensagem "Sucesso" caso o cadastro tenha sido feito sem problemas.
    if(isset($data["msg"])){
?>
<div class="alert alert-success" role="alert"> Sucesso </div>
	<?php } ?>
<h1>Cadastrar Produto</h1>
<!-- Formulário para o cadastro do produto -->
<form action="/produto/salvar" method="POST" class="form-control">
	<label> Nome Produto </label>
	<input type="text" name="nome_produto" class="form-control" />
	
	<label> Marca </label>
	<input type="text" name="marca" class="form-control"/>
	
	<label> Preço </label>
	<input type="text" name="preco" class="form-control"/>
	
	<label> Imagem(coloque a url da imagem): </label>
	<input type="text" name="urlimagem" class="form-control"/>
	<hr>
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		Cadastrar
	</button>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Você deseja mesmo fazer o cadastro? 
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
