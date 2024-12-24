<?php
require './api/fornecedor.php';
require 'db/connection.php';

header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
    
// $method = $_SERVER['REQUEST_METHOD'];

// switch ($method) {
//     case 'POST':
//         $data = json_decode(file_get_contents("php://input"), true);

//         if (!isset($data['nome'], $data['cnpj'])) {
//             http_response_code(400);
//             echo json_encode(['error' => 'Nome e CNPJ são obrigatórios']);
//             exit;
//         }
    
//         $nome = $data['nome'];
//         $cnpj = $data['cnpj'];
//         $endereco = $data['endereco'] ?? null;
//         $telefone = $data['telefone'] ?? null;
//         $email = $data['email'] ?? null;
        
//         try {
//             $stmt = $pdo->prepare("INSERT INTO fornecedor (nome, cnpj, endereco, telefone, email) VALUES (:nome, :cnpj, :endereco, :telefone, :email)");
//             $stmt->bindParam(':nome', $nome);
//             $stmt->bindParam(':cnpj', $cnpj);
//             $stmt->bindParam(':endereco', $endereco);
//             $stmt->bindParam(':telefone', $telefone);
//             $stmt->bindParam(':email', $email);
//             $stmt->execute();
    
//             http_response_code(201);
//             echo json_encode(['message' => 'Fornecedor cadastrado com sucesso']);
//         } catch (PDOException $e) {
//             http_response_code(500);
//             echo json_encode(['error' => 'Erro ao cadastrar fornecedor: ' . $e->getMessage()]);
//         }
//         break;

//     default:
//         echo json_encode(["message" => "Invalid request method"]);
//         break;
// }
