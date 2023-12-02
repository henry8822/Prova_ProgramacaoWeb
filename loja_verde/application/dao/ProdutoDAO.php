<?php
namespace Application\dao;

use Application\models\Produto;

class ProdutoDAO{
	// Create (C)
	public function salvar($produto){ 
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $nome =  $produto->getNome();
        $marca = $produto->getMarca();
        $preco = $produto->getPreco();
        $url_imagem = $produto->getCaminhoImagem();

        $SQL = "INSERT INTO produtos (nome, marca, preco, url_imagem) VALUES (?, ?, ?, ?)";
        
        // Preparar e executar a declaração
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ssds", $nome, $marca, $preco, $url_imagem);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $SQL . "<br />" . $conn->error;
            return false;
        }
    }
	
    public function findAll(){
		// 1 - Instancia
		$conexao = new Conexao();
		// 2 - Recebe 
		$conn = $conexao->getConexao();
		$SQL = "SELECT * FROM produtos";
		$result = $conn->query($SQL);
		$produtos = [];
		while($row = $result->fetch_assoc()){
			$produto = new Produto($row["nome"], $row["marca"], $row["preco"], $row["url_imagem"]);
			$produto->setCodigo($row["codigo"]);
			array_push($produtos, $produto);
		}
		return $produtos;
    }
	
	// Retrieve (R)
	public function findById($codigo){
		$conexao = new Conexao();
		$conn = $conexao->getConexao();
		$SQL = "SELECT * FROM produtos WHERE codigo = ?";
        
        // Preparar e executar a declaração
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $codigo);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $produto = new Produto($row["nome"], $row["marca"], $row["preco"], $row["url_imagem"]);
        $produto->setCodigo($row["codigo"]);
        return $produto;
	}

	// Update (U)
    public function atualizar($produto){
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $codigo = $produto->getCodigo();
        $nome = $produto->getNome();
        $marca = $produto->getMarca();
        $preco = $produto->getPreco();
        $url_imagem = $produto->getCaminhoImagem();

        $SQL = "UPDATE produtos SET nome = ?, marca = ?, preco = ?, url_imagem = ? WHERE codigo = ?";

        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ssdsi", $nome, $marca, $preco, $url_imagem, $codigo);

        if ($stmt->execute()) {  
            return $this->findById($codigo);
        }

        print_r("Error: " . $SQL . "<br />" . $conn->error);
        return $produto;
    }
	
	// Delete (D)
	public function deletar($codigo){
		$conexao = new Conexao();
		$conn = $conexao->getConexao();

		$SQL = "DELETE FROM produtos WHERE codigo = ?";
        
        // Preparar e executar a declaração
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $codigo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
	}
}
?>