<?php
$base = __DIR__;
include $base .'\..\layout\menu.php'; 
 $produto = $data['produto'];
?>
<head>
	<Title>Editar</Title>
	<style>
		body, h1, form, input, label, button {
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
}

h1 {
  color: #333;
}

.form-control {
  margin-bottom: 10px;
  padding: 8px;
  width: 100%;
  box-sizing: border-box;
}

.label {
  display: block;
  margin-bottom: 5px;
  color: #555;
}

.row {
  margin-top: 5px;
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
  transform: translateX(-50%); /* Centralizando horizontalmente */
  align-items: center; 
  justify-content: center;
}

.modal-dialog {
  position: relative;
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: none; /* Remover a sombra */
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
<h1>Alterar Produto</h1>
<?php 
        if(isset($data["msg-editarProduto"])){
    ?>
    	<div class="alert alert-success" role="alert">editado com sucesso</div>
    <?php } ?>
<form class="form-control" method="POST" action="/produto/atualizar">
	<input type="hidden" value="<?= $produto->getCodigo() ?>" name="codigo"/>
	
	<label class="label"> Nome </label>
	<input type="text" value="<?= $produto->getNome() ?>" name="nome" class="form-control"/>
	
	<label class="label"> Marca </label>
	<input type="text" value="<?= $produto->getMarca() ?>" name="marca" class="form-control" />
	
	<label class="label"> Preço </label>
	<input type="text" value="<?= $produto->getPreco() ?>" name="preco" class="form-control" />

	<label class="label"> Imagem URL </label>
	<input type="text" value="<?= $produto->getCaminhoImagem() ?>" name="url_imagem" class="form-control" />
	
	<div class="row" style="margin-top: 5px">
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
					Você deseja mesmo alterar o produto? 
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