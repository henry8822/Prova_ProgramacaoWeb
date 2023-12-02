<?php 
namespace Application\models;
// Model para Produto
class Produto{
    private $codigo;
    private $nome;
    private $marca;
    private $preco;
	private $caminhoImagem;

	public function __construct($nome, $marca,$preco, $caminhoImagem){
		$this->nome = $nome;
		$this->marca = $marca;
		$this->preco = $preco;
		$this->caminhoImagem = $caminhoImagem;
	}
	
	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}
	
	public function getCodigo(){
		return $this->codigo;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function getMarca(){
		return $this->marca;
	}
	
	public function getPreco(){
		return $this->preco;
	}

	public function getCaminhoImagem() {
        return $this->caminhoImagem;
    }
}
?>