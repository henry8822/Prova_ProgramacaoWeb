<?php
    $base = __DIR__;
    include $base .'\..\layout\menu.php'; 
    //debug_print_backtrace();
    session_start();
 ?>
<html>
<head>
    <title>Pesquisar</title>
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

form {
    margin-top: 20px;
}

label {
    margin-bottom: 5px;
    display: block;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004d99;
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

    </style>
</head>
<body>
<?php
if(isset($_SESSION['logado']) && $_SESSION['logado'] === 'true'){
?>
<h1>Pesquisar Usuário</h1>
    <hr>
<form action="/usuario/pesquisarUsuario" method="POST">
    <label for="email">Pesquisar usuário por e-mail:</label>
    <input type="text" name="email" placeholder="Digite o e-mail" id="email" required>
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Pesquisar
	</button>
</form>

<!-- Exibir o resultado -->
<?php
if (isset($data['usuarioEncontrado'])) {
    $usuarioEncontrado = $data['usuarioEncontrado'];
    if ($usuarioEncontrado) {?>
        <div>
            <table class="table">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th>Email</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <tr>
                    <td><?=$usuarioEncontrado->getId()?> </td>
                    <td><?=$usuarioEncontrado->getNome()?> </td>
                    <td><?=$usuarioEncontrado->getSenha()?> </td>
                    <td><?=$usuarioEncontrado->getEmail() ?></td>
                    <td>
                    <a href="/usuario/iniciarEditar/<?= $usuarioEncontrado->getId() ?> " class="acao-botao-azul">Editar</a>
                    <span>
						<form action="/usuario/deletar/<?= $usuarioEncontrado->getId()?>" method="POST">
							<input type="hidden" value="<?= $usuarioEncontrado->getId() ?>" name="id"/>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            	Excluir
							</button>
								<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <p>Nenhum usuário encontrado</p>
    <?php } 
}
?>
<?php }else{
    ?><hr><h2> Faça login clicando <span><a href="/login/">aqui</a></span> para acessar pesquisar usuarios</h2><?php
}  ?>
</body>
</html>
