<?php 
namespace Application\dao;
class Conexao{
	private $dbName = "loja";
	private $usuario = "root";
	private $senha = "coloque sua senha do banco de dados aqui";
	private $host = "localhost";
	
	// carrega a conexão realizada com banco
	private $conn;
	public function __construct(){
		$this->conn = new \mysqli($this->host, $this->usuario, $this->senha, $this->dbName);        
	}
	public function getConexao(){
		if($this->conn->connect_error){
			die("A conexão falhou. ". $this->conn->connect_error);
		}
		return $this->conn;
	}
	
	public function desconectar(){
		$this->conn->close();
	}
}

/*
CRIAÇÃO DO BANCO DE DADOS AQUI

CREATE DATABASE IF NOT EXISTS loja;
USE loja;

CREATE TABLE IF NOT EXISTS produtos (
    codigo INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    marca VARCHAR(255) NOT NULL,
    preco VARCHAR(255) NOT NULL
);

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nomeUsuario VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
);

Por questão de segurança o primeiro usuário é obrigatoriamente o admin
Quanto aos usuários: Ver todos os usuários e suas informações, editar e deletar os mesmos
Aos produtos: o mesmo de acima, com a opção de adicionar também
 
INSERT INTO usuarios (id, nomeUsuario, senha, email) VALUES (1, "admin", "admnin123", "admin@email.com");

SELECT * FROM produtos;
SELECT * FROM usuarios;

*/
?>