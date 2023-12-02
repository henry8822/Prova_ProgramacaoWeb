<!-- Página de Login -->
<?php
	$base = __DIR__;
	include $base .'\..\layout\menu.php'; 
	//debug_print_backtrace();
?>
<head>
	<Title>Login</Title>
	<style>
		body, h1, form, input, label, button, p {
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

.container {
    margin-bottom: 20px;
}

.alert {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.form-horizontal {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.control-label {
    font-weight: bold;
}

.form-control {
    width: 100%;
    padding: 8px;
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

hr {
    margin: 20px 0;
}

p {
    margin-top: 20px;
}

a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

	</style>
</head>
<body>
<h1>Login</h1>
<hr/>
<div class="container"><?php if( isset($data['msg'])){ ?>
	<div class="alert alert-alert" role="alert" style="background-color: yellow"> <?php echo $data['msg'] ?> </div>
<?php } ?>
	
<div class="container">
	<form class="form-horizontal" action="/login/verifica" method="POST">
		<!-- Nome do Usuário -->
		<div class="form-group">
			<label class="control-label col-sm-2" for="email">E-mail:</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="email" name="email" required>
			</div>
		</div>
		
		<!-- Senha -->
		<div class="form-group">
			<label class="control-label col-sm-2" for="senha">Senha:</label>
			<div class="col-sm-5">          
				<input type="password" class="form-control" id="senha" name="senha" required>
			</div>
		</div>
		<br>
		<div class="form-group">        
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</div>
	</form>
</div>

<hr>

<!-- Cadastro -->
<p>Caso não tenha um login, se <a href='/usuario/cadastrar/'><b>Cadastre aqui</b></a></p>
</body>
</html>