<?php
require '../db/connection.php';

function authenticate($headers) {
    global $pdo;
    if (!isset($headers['Authorization'])) {
        http_response_code(401);
        echo json_encode(['error' => 'Token não fornecido']);
        exit;
    }

    $token = $headers['Authorization'];
    $stmt = $pdo->prepare("SELECT id FROM users WHERE token = :token");
    $stmt->bindParam(':token', $token);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        http_response_code(401);
        echo json_encode(['error' => 'Token inválido']);
        exit;
    }

    return true;
}
