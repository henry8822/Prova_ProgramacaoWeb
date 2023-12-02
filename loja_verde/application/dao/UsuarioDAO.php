<?php
namespace Application\dao;

use Application\models\Usuario;

class UsuarioDAO {
    // cadastrarUsuario() é equivalente ao salvar() do produto
    public function cadastrarUsuario($usuario) {
        $conexao = new Conexao(); // Instancia o objeto da classe do arquivo 'Conexao.php' na pasta dao
        $conn = $conexao->getConexao(); // Recebe a conexão
        
        $nome =  $usuario->getNome();
        $senha = $usuario->getSenha();
        $email = $usuario->getEmail();
        
        // Usar PreparedStatement para evitar SQL Injection
        $SQL = "INSERT INTO usuarios(nome, senha, email) VALUES (?, ?, ?)";
        
        // Preparar e executar a declaração
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("sss", $nome, $senha, $email);

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
        $SQL = "SELECT * FROM usuarios";
        $result = $conn->query($SQL);
        $usuarios = [];
        while($row = $result->fetch_assoc()){
            $usuario = new Usuario($row["nome"], $row["senha"], $row["email"]);
            $usuario->setId($row["codigo"]);
            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }
    
    // Retrieve (R)
    public function findById($id){
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT * FROM usuarios WHERE codigo = ?";
        
        // Preparar e executar a declaração
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $usuario = new Usuario($row["nome"], $row["senha"], $row["email"]);
        $usuario->setId($row["codigo"]);
        return $usuario;
    }

    // Update (U)
    public function atualizar($usuario){
        // Criar o conexao
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        // pega os dados
        $id = $usuario->getId();
        $nome = $usuario->getNome();
        $senha = $usuario->getSenha();
        $email = $usuario->getEmail();
        
        // Usar PreparedStatement para evitar SQL Injection
        $SQL = "UPDATE usuarios SET nome = ?, senha = ?, email = ? WHERE codigo = ?";
        
        // Preparar e executar a declaração
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("sssi", $nome, $senha, $email, $id);

        if ($stmt->execute()) {  
            return $this->findById($id);
        }

        print_r("Error: " . $SQL . "<br />" . $conn->error);
        return $usuario;
    }
    
    // Delete (D)
    public function deletar($id){
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $SQL = "DELETE FROM usuarios WHERE codigo = ?";
        
        // Preparar e executar a declaração
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function pesquisar($email) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
    
        $email = $conn->real_escape_string($email); // Prevenir SQL injection
    
        $SQL = "SELECT * FROM usuarios WHERE email like ?";
        
        // Preparar e executar a declaração
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $usuario = new Usuario($row["nome"], $row["senha"], $row["email"]);
            $usuario->setId($row["codigo"]);
            return $usuario;
        }
    
        return null; // Retorna null se nenhum usuário for encontrado
    }

    public function verifica(){
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $email = $conn->real_escape_string($_POST['email']); // Prevenir SQL injection
        $senha = $conn->real_escape_string($_POST['senha']);
        
        // Usar PreparedStatement para evitar SQL Injection
        $SQL = "SELECT COUNT(*) as count FROM usuarios WHERE email = ? AND senha = ?";
        
        // Preparar e executar a declaração
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result) {
            $row = $result->fetch_assoc();
            $count = $row['count'];
            session_start();

            if ($count == 1) {
                // Senha e e-mail correspondem
                $_SESSION['logado'] = 'true';
                $msg = "Logado com sucesso";
                return $msg;
                
            } else {
                // E-mail ou senha incorretos
                $_SESSION['logado'] = 'false';
                
                $msg = "E-mail ou senha incorretos";
                return $msg;
            }
        } else {
            $msg = "Erro na consulta: " . $conn->error;
            return $msg;
        }
    }
}
?>