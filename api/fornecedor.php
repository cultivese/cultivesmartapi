<?php
require 'db/connection.php';
// require 'authenticate.php';

// Autentica o usuário
$headers = getallheaders();
//authenticate($headers);

// Processa a requisição POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode(["message" => "POST"]);
         
    $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['nome'], $data['cnpj'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Nome e CNPJ são obrigatórios']);
            exit;
        }
    
        $nome = $data['nome'];
        $cnpj = $data['cnpj'];
        $endereco = $data['endereco'] ?? null;
        $telefone = $data['telefone'] ?? null;
        $email = $data['email'] ?? null;
        
        try {
            $stmt = $pdo->prepare("INSERT INTO fornecedor (nome, cnpj, endereco, telefone, email) VALUES (:nome, :cnpj, :endereco, :telefone, :email)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            http_response_code(201);
            echo json_encode(['message' => 'Fornecedor cadastrado com sucesso']);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao cadastrar fornecedor: ' . $e->getMessage()]);
        }
  } 
  else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Consulta SQL
    $sql = "SELECT * FROM fornecedor";
    $stmt = $pdo->query($sql);

    if (!$stmt) {
        // Tratar caso a consulta falhe
        echo "Erro na consulta: " . $pdo->errorInfo()[2];
        exit;
    }

    // Obter os resultados
    $fornecedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($fornecedores)) {
        echo json_encode(['message' => 'Nenhum fornecedor encontrado']);
    } else {
        echo json_encode($fornecedores);
    }
    }
  else {
      http_response_code(405);
      echo json_encode(['error' => 'Método não permitido']);
  }