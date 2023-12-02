<?php 
namespace Application\models;
// Model para Usuário
class Usuario {
    private $id;
    private $nome;
    private $senha;
    private $email;

    public function __construct($nome, $senha, $email) {
        $this->nome = $nome;
        $this->senha = $senha;
        $this->email = $email;
    }
	
    public function setId($id) {
        $this->id = $id;
    }
	
    public function getId() {
        return $this->id;
    }
	
    public function getNome() {
        return $this->nome;
    }
	
    public function getSenha() {
        return $this->senha;
    }
	
    public function getEmail() {
        return $this->email;
    }
}
?>