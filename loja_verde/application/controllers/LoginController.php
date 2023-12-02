<?php
use Application\dao\UsuarioDAO;
use Application\core\Controller;
use Application\dao\Conexao;

class LoginController extends Controller{

    public function index(){
		$usuarioDAO = new UsuarioDAO();
		$usuarios = $usuarioDAO->findAll();
		$this->view('login/index', ['usuarios' => $usuarios]);
	}

    public function verifica(){
        $usuarioDAO = new UsuarioDAO();
        $msg = $usuarioDAO->verifica();

        $this->view('login/index', ["msg" => $msg]);
    }
    
    public function logout() {
        $this->view('login/logout');
    }

}
?>