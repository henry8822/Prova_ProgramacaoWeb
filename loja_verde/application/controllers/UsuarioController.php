<?php

use Application\core\Controller;
use Application\dao\UsuarioDAO;
use Application\models\Usuario;
use Application\dao\Conexao;

class UsuarioController extends Controller{
	public function index(){
		$usuarioDAO = new UsuarioDAO();
		$usuarios = $usuarioDAO->findAll();
		
		$this->view('usuario/index', ['usuarios' => $usuarios]);
	}
	
	// Essa função redireciona para o arquivo php em usuario/cadastrar.php
	public function cadastrar(){
		$this->view('usuario/cadastrar');
	}   	
	
	// Equivalente ao salvar() do produto
	public function salvar(){
		$nomeUsuario = $_POST['nomeUsuario'];
		$senha = $_POST['senha'];
		$email = $_POST['email'];

		$usuario = new Usuario($nomeUsuario, $senha, $email);

		// Sendo jogado para o MySQL a partir daqui
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->cadastrarUsuario($usuario);
		
		$this->view('usuario/cadastrar', ["msg-cadastrado" => "Usuário cadastrado com Sucesso!"]);
	}
	
	
	public function iniciarEditar($id){
		// 1 - Buscar os dados 
		$usuarioDAO = new UsuarioDAO();
		$usuario = $usuarioDAO->findById($id);
		// 2 - Mostrar na view
		$this->view('usuario/editar', ["usuario" => $usuario]);
	}

	public function atualizar(){
		
		$id = filter_input(INPUT_POST, "id");
		$nomeUsuario = filter_input(INPUT_POST, "nomeUsuario");
		$senha = filter_input(INPUT_POST, "senha");
		$email = filter_input(INPUT_POST, "email");

		
		$usuario = new Usuario($nomeUsuario, $senha, $email);
		$usuario->setId($id);

		
		$usuarioDAO = new UsuarioDAO();
		$usuarioAtualizado = $usuarioDAO->atualizar($usuario);
		
		if($usuarioAtualizado){
			$msg = "Sucesso";
		}else{
			$msg = "Erro ao editar";
		}
		
		$this->view("usuario/editar", ["msg-editarUsuario" => $msg, "usuario" => $usuarioAtualizado]);
	}

	public function deletar(){
		$id = filter_input(INPUT_POST, "id");
		$usuarioDAO = new UsuarioDAO();
		if($usuarioDAO->deletar($id)){
			$msg = "Sucesso";
		}else{
			$msg = "Deu erro ";
		}
		$usuarios = $usuarioDAO->findAll();
		$this->view("usuario/index", ["msg" => $msg, "usuarios" => $usuarios]);
	}
	
	public function pesquisarUsuario() {
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        
        $usuarioDAO = new UsuarioDAO();
        $usuarioEncontrado = $usuarioDAO->pesquisar($email);
    
        // Enviar o resultado para a view
        $this->view('usuario/buscar', ['usuarioEncontrado' => $usuarioEncontrado]);
    }

}
?>