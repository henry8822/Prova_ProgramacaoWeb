<?php

use Application\core\Controller;
use Application\dao\ProdutoDAO;
use Application\models\Produto;

class ProdutoController extends Controller{
	public function index(){
		$produtoDAO = new ProdutoDAO();
		$produtos = $produtoDAO->findAll();
		$this->view('produto/index', ['produtos' => $produtos]);
	}

	public function cadastrar(){
		$this->view('produto/cadastrar');
	}

	public function salvar(){
		$nome = $_POST['nome_produto'];
		$marca = $_POST['marca'];
		$preco = $_POST['preco'];
		$url = $_POST['urlimagem'];
		
		$produto = new Produto($nome, $marca, $preco, $url);

		$produtoDAO = new ProdutoDAO();
		$produtoDAO->salvar($produto);

		$this->view('produto/cadastrar', ["msg" => "Produto inserido com Sucesso"]);
	}

	public function iniciarEditar($codigo){
		// 1 - Buscar os dados 
		$produtoDAO = new ProdutoDAO();
		$produto = $produtoDAO->findById($codigo);
		// 2 - Mostrar na view
		$this->view('produto/editar', ["produto" => $produto]);
	}

	public function atualizar(){
		
		$codigo = filter_input(INPUT_POST, "codigo");
		$nome = filter_input(INPUT_POST, "nome");
		$marca = filter_input(INPUT_POST, "marca");
		$preco = filter_input(INPUT_POST, "preco");
		$caminhoImagem = filter_input(INPUT_POST, "url_imagem");

		
		$produto = new Produto($nome, $marca, $preco,$caminhoImagem);
		$produto->setCodigo($codigo);

		
		$produtoDAO = new ProdutoDAO();
		$produtoAtualizado = $produtoDAO->atualizar($produto);
		
		if($produtoAtualizado){
			$msg = "Sucesso";
		}else{
			$msg = "Erro ao editar";
		}
		
		$this->view("produto/editar", ["msg" => $msg, "produto" => $produtoAtualizado]);
	}

	public function deletar(){
		$codigo = filter_input(INPUT_POST, "codigo");
		$produtoDAO = new ProdutoDAO();
		
		if($produtoDAO->deletar($codigo)){
			$msg = "Sucesso";
		}else{
			$msg = "Deu erro";
		}
		$produtos = $produtoDAO->findAll();
		$this->view("produto/index", ["msg" => $msg, "produtos" => $produtos]);
	}
}

?>